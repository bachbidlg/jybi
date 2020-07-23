<?php

use yii\db\Migration;

/**
 * Class m200722_032824_create_table_shop_language
 */
class m200722_032824_create_table_shop_language extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check table exists */
        $check_table = Yii::$app->db->getTableSchema('shop_language');
        if ($check_table === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('shop_language', [
                'shop_id' => $this->integer(11)->notNull(),
                'language_id' => $this->integer(11)->notNull(),
                'metadata' => $this->json()
            ], $tableOptions);
            $this->addPrimaryKey('shop_language-shop_id-language_id', 'shop_language', ['shop_id', 'language_id']);
            $this->addForeignKey('shop_language-shop_id-shop-id', 'shop_language', 'shop_id', 'shop', 'id', 'CASCADE', 'CASCADE');
            $this->addForeignKey('shop_language-language_id-language-id', 'shop_language', 'language_id', 'language', 'id', 'CASCADE', 'CASCADE');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200722_032824_create_table_shop_language cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200722_032824_create_table_shop_language cannot be reverted.\n";

        return false;
    }
    */
}
