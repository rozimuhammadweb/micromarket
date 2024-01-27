<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post_tags}}`.
 */
class m240126_054855_create_post_tags_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%blog_tags}}', [
            'id' => $this->primaryKey(),
            'blog_id' => $this->integer(),
            'tag_id' => $this->integer(),
        ]);

        // Add foreign key for blog_id
        $this->addForeignKey(
            'fk_blog_tags_blog_id',
            '{{%blog_tags}}',
            'blog_id',
            '{{%blog}}',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk_blog_tags_tag_id',
            '{{%blog_tags}}',
            'tag_id',
            '{{%tags}}',
            'id',
            'CASCADE'
        );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-blog_tags-blog_id', '{{%blog_tags}}');
        $this->dropForeignKey('fk-blog_tags-tag_id', '{{%blog_tags}}');
        $this->dropTable('{{%blog_tags}}');
    }
}
