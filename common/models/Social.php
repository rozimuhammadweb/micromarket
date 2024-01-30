<?php

namespace common\models;

use mohorev\file\UploadImageBehavior;

/**
 * This is the model class for table "social".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $status
 * @property string $icon
 */
class Social extends \yii\db\ActiveRecord
{

    public const STATUS_ACTIVE = 1;
    public const STATUS_INACTIVE = 0;

    public static function tableName()
    {
        return 'social';
    }

    /**
     * {@inheritdoc}
     */

    public function behaviors()
    {
        return [
            [
                'class' => UploadImageBehavior::class,
                'attribute' => 'icon',
                'scenarios' => ['default'],
                'path' => '@frontend/web/uploads/icon/{id}',
                'url' => '/uploads/icon/{id}',
                'thumbs' => [
                    'thumb' => ['width' => 570, 'height' => 590],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'safe'],
            [['status'], 'integer'],
            [['icon', 'name'], 'required'],
            [['icon'], 'file'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Link',
            'status' => 'Status',
            'icon' => 'Icon',
        ];
    }
}
