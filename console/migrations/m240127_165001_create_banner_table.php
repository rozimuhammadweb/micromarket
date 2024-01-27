<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%banner}}`.
 */
class m240127_165001_create_banner_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%banner}}', [
            'id' => $this->primaryKey(),
            'imageFile' => $this->string(),
            'status' => $this->boolean()->defaultValue(true),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createTable('{{%banner_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'name' => $this->string(),
            'title' => $this->string(),
            'subtitle' => $this->string(),
            'language' => $this->string(6)
        ]);
        $this->addForeignKey('fk-banner_lang-relation', '{{%banner_lang}}', 'owner_id', '{{%banner}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-banner_lang-relation', '{{%banner_lang}}');
        $this->dropTable('{{%banner_lang}}');
        $this->dropTable('{{%banner}}');
    }
}
