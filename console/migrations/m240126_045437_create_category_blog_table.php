<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category_blog}}`.
 */
class m240126_045437_create_category_blog_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category_blog}}', [
            'id' => $this->primaryKey(),
            'status' => $this->tinyInteger()->defaultValue(1),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);
        $this->createTable('{{%category_blog_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'title' => $this->string(),
            'language' => $this->string(6)->notNull(),
        ]);
        $this->addForeignKey('fk_category_blog_lang-relation', '{{%category_blog_lang}}', 'owner_id', '{{%category_blog}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_category_blog_lang-relation', '{{%category_blog_lang}}');
        $this->dropTable('{{%category_blog_lang}}');
        $this->dropTable('{{%category_blog}}');
    }
}
