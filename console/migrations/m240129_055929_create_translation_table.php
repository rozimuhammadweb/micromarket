<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%translation}}`.
 */
class m240129_055929_create_translation_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%translation}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%translation}}');
    }
}
