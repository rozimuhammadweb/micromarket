<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m240123_062248_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'sort_order' => $this->integer()->defaultValue(1),
            'is_popular' => $this->boolean(),
            'status' => $this->tinyInteger()->defaultValue(1),
            'imageFile' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);
        $this->createTable('{{%category_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'title' => $this->string(),
            'language' => $this->string(6)->notNull(),
        ]);
        $this->addForeignKey('fk_category_lang-relation', '{{%category_lang}}', 'owner_id', '{{%category}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_category_lang-relation', '{{%category_lang}}');
        $this->dropTable('{{%category_lang}}');
        $this->dropTable('{{%category}}');
    }
}
