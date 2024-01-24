<?php

namespace backend\models;
class GalleryImage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'gallery_image';
    }
}