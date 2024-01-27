<?php

namespace common\models;

use gofuroov\multilingual\behaviors\MultilingualBehavior;
use gofuroov\multilingual\db\MultilingualQuery;
use mohorev\file\UploadImageBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "setting".
 *
 * @property int $id
 * @property string|null $number
 * @property string|null $email
 * @property string|null $imageFile
 * @property int|null $status
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property SettingLang[] $settingLangs
 */
class Setting extends \yii\db\ActiveRecord
{

    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'setting';
    }

    /**
     * @return array|ActiveRecord|null
     */
    public static function getSetting()
    {
        return self::find()->andWhere(['status' => Setting::STATUS_ACTIVE])->orderBy(['id' => SORT_DESC])->one();
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
                'path' => '@frontend/web/uploads/setting/{id}',
                'url' => '/uploads/setting/{id}',
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
                    'address', 'shipping_order', 'working_time'
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
            [['number', 'email'], 'required'],
            [['number', 'email', 'address', 'shipping_order', 'working_time'], 'safe'],
            [['status', 'created_by', 'updated_by', 'created_at', 'updated_at'], 'integer'],
            ['number', 'match', 'pattern' => '/\+[9][9][8] [389][013789] [0-9][0-9][0-9] [0-9][0-9] [0-9][0-9]/'],
            [['email'], 'string', 'max' => 255],
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
            'number' => 'Number',
            'address' => 'Address',
            'email' => 'Email',
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

}
