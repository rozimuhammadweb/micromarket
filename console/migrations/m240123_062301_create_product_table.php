<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m240123_062301_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'price' => $this->float(),
            'discount_percent' => $this->integer(),
            'availability' => $this->integer(),
            'slug' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);

        $this->createTable('{{%product_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer(),
            'title' => $this->string(),
            'short_description' => $this->string(),
            'description' => $this->string(),
            'shipping' => $this->string(),
            'language' => $this->string(6)->notNull(),
        ]);

        $this->addForeignKey(
            'fk-product_lang-owner_id-product-id',
            '{{%product_lang}}',
            'owner_id',
            '{{%product}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-product_lang-owner_id-product-id', '{{%product_lang}}');
        $this->dropTable('{{%product_lang}}');
        $this->dropTable('{{%product}}');
    }
}

