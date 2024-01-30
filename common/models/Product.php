<?php

namespace common\models;

use backend\models\GalleryImage;
use common\components\CyrillicSlugBehavior;
use common\modules\galleryManager\GalleryBehavior;
use gofuroov\multilingual\behaviors\MultilingualBehavior;
use gofuroov\multilingual\db\MultilingualLabelsTrait;
use Imagine\Image\Box;
use Imagine\Image\ImageInterface;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int|null $category_id
 * @property float|null $price
 * @property int|null $discount_percent
 * @property int|null $availability
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 */
class Product extends \yii\db\ActiveRecord
{
    use MultilingualLabelsTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @return array|ActiveRecord[]
     */
    public static function getProducts()
    {
        return self::find()->orderBy(['id' => SORT_DESC])->all();
    }

    /**
     * @return array|ActiveRecord[]
     */
    public static function getLatest()
    {
        return self::find()->orderBy(['id' => SORT_DESC])->limit(3)->all();
    }

    /**
     * @return array|ActiveRecord[]
     */
    public static function getRandProducts()
    {
        return self::find()->orderBy(new Expression('rand()'))->limit(3)->all();
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class,
            'galleryBehavior' => [
                'class' => GalleryBehavior::className(),
                'type' => 'product',
                'extension' => 'png',
                'directory' => Yii::getAlias('@frontend/web') . '/uploads/products/',
                'url' => '/uploads/products/',
                'versions' => [
                    'small' => function ($img) {
                        /** @var ImageInterface $img */
                        return $img
                            ->copy()
                            ->thumbnail(new Box(70, 70));
                    },
                    'medium' => function ($img) {
                        /** @var ImageInterface $img */
                        $dstSize = $img->getSize();
                        $maxWidth = 800;
                        if ($dstSize->getWidth() > $maxWidth) {
                            $dstSize = $dstSize->widen($maxWidth);
                        }
                        return $img
                            ->copy()
                            ->resize($dstSize);
                    },
                ]
            ],
            'multilingual' => [
                'class' => MultilingualBehavior::className(),
                'languages' => [
                    'uz' => 'Uzbek',
                    'en' => 'English',
                ],
                'attributes' => [
                    'title', 'short_description', 'description', 'shipping'
                ]
            ],
            'slug' => [
                'class' => CyrillicSlugBehavior::class,
                'attribute' => 'title',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'short_description', 'description'], 'required'],
            [['title', 'shipping', 'short_description',], 'safe'],
            [['description'], 'string'],
            [['category_id', 'discount_percent', 'availability', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['price'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'category_id' => 'Kategoriya',
            'price' => 'Narxi',
            'discount_percent' => 'Chegirma %',
            'availability' => 'Miqdori',
            'shipping' => 'Yetkazib berish',
            'created_by' => 'Yaratdi',
            'updated_by' => 'Tahrirladi',
            'created_at' => 'Yaratilgan',
            'updated_at' => 'Yangilangan',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getCreatedByUser()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * @return ActiveQuery
     */
    public function getUpdatedByUser()
    {
        return $this->hasOne(User::class, ['id' => 'updated_by']);
    }

    /**
     * @return ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getGalleryImagesAsArray()
    {

        return $this->getGalleryImages()->asArray();
    }

    /**
     * @return ActiveQuery
     */
    public function getGalleryImages()
    {
        return $this->hasMany(GalleryImage::class, ['ownerId' => 'id'])
            ->andWhere(['type' => 'product'])
            ->orderBy('rank ASC');
    }

    /**
     * Main image of the product
     * @return string
     */
    public function getImage($type = 'preview')
    {
        $images = $this->getImages($type);
        if (empty($images)) {
            return "/images/no-image-png";
        }
        return $images[0] ?? '';
    }

    /**
     * All images of the product
     * @return array
     */
    public function getImages($type = 'preview')
    {
        $images = $this->galleryImagesAsArray;
        $result = [];
        foreach ($images as $image) {
            $result[] = "/uploads/products/$this->id/" . $image['id'] . "/$type.png";
        }
        return $result;
    }

    public function getRelatedProducts()
    {
        if ($this->category) {
            return Product::find()
                ->where(['category_id' => $this->category->id])
                ->andWhere(['not', ['id' => $this->id]]) // Exclude the current product
                ->limit(4) // Adjust the limit as needed
                ->all();
        }

        // Return an empty array if the product doesn't have a category
        return [];
    }

}
