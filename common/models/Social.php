<?php

namespace common\models;

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
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'social';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['icon'], 'required'],
            [['name', 'icon'], 'string', 'max' => 255],
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
