<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%social}}`.
 */
class m240129_095159_create_social_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%social}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->null(),
            'status' => $this->tinyInteger()->defaultValue(1),
            'icon' => $this->string()->notNull(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%social}}');
    }
}
