<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tags}}`.
 */
class m240126_053325_create_tags_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tags}}', [
            'id' => $this->primaryKey(),
            'status' => $this->tinyInteger()->defaultValue(1),
        ]);

        $this->createTable('{{%tags_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer()->notNull(),
            'title' => $this->string(),
            'language' => $this->string(6)->notNull(),
        ]);

        $this->addForeignKey('fk_tags_lang-relation', '{{%tags_lang}}', 'owner_id', '{{%tags}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_tags_lang-relation', '{{%tags_lang}}');
        $this->dropTable('{{%tags_lang}}');
        $this->dropTable('{{%tags}}');
    }
}
