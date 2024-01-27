<?php

namespace common\models;

use gofuroov\multilingual\behaviors\MultilingualBehavior;
use gofuroov\multilingual\db\MultilingualLabelsTrait;
use gofuroov\multilingual\db\MultilingualQuery;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "category_blog".
 *
 * @property int $id
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 * @property int|null $updated_by
 *
 */
class CategoryBlog extends \yii\db\ActiveRecord
{
    use MultilingualLabelsTrait;

    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category_blog';
    }

    public static function getCategoriesBlog()
    {
        return self::find()->andWhere(['status' => CategoryBlog::STATUS_ACTIVE])->orderBy(['id' => SORT_DESC])->all();
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
            [['title'], 'safe'],
            [['title'], 'required'],
            [['status', 'created_at', 'updated_at', 'created_by', 'updated_by'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'status' => 'Status',
            'created_by' => 'Yaratdi',
            'updated_by' => 'Tahrirladi',
            'created_at' => 'Yaratilgan',
            'updated_at' => 'Yangilangan',
        ];
    }

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
