<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%blog}}`.
 */
class m240125_110858_create_blog_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%blog}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'slug' => $this->string(),
            'status' => $this->tinyInteger()->defaultValue(1),
            'imageFile' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);
        $this->createTable('{{%blog_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'title' => $this->string(),
            'short_description' => $this->string(),
            'description' => $this->text(),
            'language' => $this->string(6)->notNull(),
        ]);
        $this->addForeignKey('fk_blog_lang-relation', '{{%blog_lang}}', 'owner_id', '{{%blog}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_blog_lang-relation', '{{%blog_lang}}');
        $this->dropTable('{{%blog_lang}}');
        $this->dropTable('{{%blog}}');
    }
}
