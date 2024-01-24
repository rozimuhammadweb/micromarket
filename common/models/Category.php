<?php

namespace common\models;


use gofuroov\multilingual\behaviors\MultilingualBehavior;
use gofuroov\multilingual\db\MultilingualLabelsTrait;
use gofuroov\multilingual\db\MultilingualQuery;
use mohorev\file\UploadImageBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int|null $sort_order
 * @property int|null $is_popular
 * @property int|null $status
 * @property string|null $imageFile
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 */
class Category extends \yii\db\ActiveRecord
{
    use MultilingualLabelsTrait;

    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @return array|ActiveRecord[]
     */
    public static function getCategories()
    {
        return self::find()->andWhere(['status' => Category::STATUS_ACTIVE])->orderBy(['id' => SORT_DESC])->all();
    }

    public static function find()
    {
        $query = new MultilingualQuery(get_called_class());
        return $query->multilingual();
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            BlameableBehavior::class,
            [
                'class' => UploadImageBehavior::class,
                'attribute' => 'imageFile',
                'scenarios' => ['default'],
                'path' => '@frontend/web/uploads/category/{id}',
                'url' => '/uploads/category/{id}',
                'thumbs' => [
                    'thumb' => ['width' => 570, 'height' => 590],
                ],
            ],
            'multilingual' => [
                'class' => MultilingualBehavior::className(),
                'languages' => [
                    'uz' => 'Uzbek',
                    'en' => 'English',
                ],
                'attributes' => [
                    'title',
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
            ['title', 'safe'],
            [['sort_order', 'is_popular', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['imageFile'], 'file',],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sort_order' => 'Sort Order',
            'is_popular' => 'Is Popular',
            'imageFile' => 'Image',
            'status' => 'Status',
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

}
