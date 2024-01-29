<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "translation".
 *
 * @property int $id
 * @property string|null $value
 * @property string|null $key
 * @property string|null $category
 */
class Translation extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'translation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['value'], 'safe'],
            [['key', 'category'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'value' => 'Value',
            'key' => 'Key',
            'category' => 'Category',
        ];
    }
}
