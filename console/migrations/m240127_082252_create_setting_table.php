<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%setting}}`.
 */
class m240127_082252_create_setting_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%setting}}', [
            'id' => $this->primaryKey(),
            'number' => $this->string(20),
            'email' => $this->string(),
            'map' => $this->text(),
            'imageFile' => $this->string(),
            'status' => $this->boolean()->defaultValue(true),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createTable('{{%setting_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer(),
            'working_time' => $this->string(),
            'shipping_order' => $this->string(),
            'address' => $this->text(),
            'language' => $this->string(6),
        ]);

        $this->addForeignKey('fk-setting_lang-relation', '{{%setting_lang}}', 'owner_id',
            '{{%setting}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-setting_lang-relation', '{{%setting_lang}}');
        $this->dropTable('{{%setting_lang}}');
        $this->dropTable('{{%setting}}');
    }
}
