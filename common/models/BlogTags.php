<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "blog_tags".
 *
 * @property int $id
 * @property int|null $blog_id
 * @property int|null $tag_id
 *
 * @property Blog $blog
 * @property Tags $tag
 */
class BlogTags extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'blog_tags';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['blog_id', 'tag_id'], 'integer'],
            [['blog_id'], 'exist', 'skipOnError' => true, 'targetClass' => Blog::class, 'targetAttribute' => ['blog_id' => 'id']],
            [['tag_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tags::class, 'targetAttribute' => ['tag_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'blog_id' => 'Blog ID',
            'tag_id' => 'Tag ID',
        ];
    }

    /**
     * Gets query for [[Blog]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBlog()
    {
        return $this->hasOne(Blog::class, ['id' => 'blog_id']);
    }

    /**
     * Gets query for [[Tag]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTag()
    {
        return $this->hasOne(Tags::class, ['id' => 'tag_id']);
    }
}
