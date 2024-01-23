<?php

namespace common\models;


use gofuroov\multilingual\behaviors\MultilingualBehavior;
use gofuroov\multilingual\db\MultilingualLabelsTrait;
use gofuroov\multilingual\db\MultilingualQuery;
use mohorev\file\UploadImageBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

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

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
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
            'blameable' => [
                'class' => BlameableBehavior::class,
            ],
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
            'status' => 'Status',
            'imageFile' => 'Image File',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
        ];
    }
}
