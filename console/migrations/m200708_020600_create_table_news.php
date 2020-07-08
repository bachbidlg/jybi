<?php

use yii\db\Migration;

/**
 * Class m200708_020600_create_table_news
 */
class m200708_020600_create_table_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200708_020600_create_table_news cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200708_020600_create_table_news cannot be reverted.\n";

        return false;
    }
    */
}
