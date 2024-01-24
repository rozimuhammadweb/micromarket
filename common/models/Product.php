<?php

namespace common\models;

use common\modules\galleryManager\GalleryBehavior;
use backend\models\GalleryImage;
use gofuroov\multilingual\behaviors\MultilingualBehavior;
use Imagine\Image\Box;
use Imagine\Image\ImageInterface;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

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

    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;


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

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class,
            'galleryBehavior' => [
                'class' => GalleryBehavior::className(),
                'type' => 'product',
                'extension' => 'jpg',
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
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shipping',], 'safe'],
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
        return $images[0 ?? '';
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



}
