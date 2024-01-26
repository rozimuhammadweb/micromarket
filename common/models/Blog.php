<?php

namespace common\models;

use gofuroov\multilingual\behaviors\MultilingualBehavior;
use gofuroov\multilingual\db\MultilingualLabelsTrait;
use mohorev\file\UploadImageBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "blog".
 *
 * @property int $id
 * @property int|null $category_id
 * @property int|null $status
 * @property string|null $imageFile
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 */
class Blog extends \yii\db\ActiveRecord
{
    use MultilingualLabelsTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog';
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
                'path' => '@frontend/web/uploads/blog/{id}',
                'url' => '/uploads/blog/{id}',
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
                    'title', 'short_description', 'description'
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
            [['title', 'short_description', 'description'], 'safe'],
            [['category_id', 'status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
            [['imageFile'], 'file'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'imageFile' => 'Image File',
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

    public function getCategory()
    {
        return $this->hasOne(CategoryBlog::class, ['id' => 'category_id']);
    }

}
