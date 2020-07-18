<?php

use yii\db\Migration;

/**
 * Class m200715_104612_add_column_hot_table_project
 */
class m200715_104612_add_column_hot_table_project extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('news', 'hot', $this->integer(11)->null()->after('status')->comment('hiển thị dự án trang chủ. 0: disabled, 1: activation'));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200715_104612_add_column_hot_table_project cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200715_104612_add_column_hot_table_project cannot be reverted.\n";

        return false;
    }
    */
}
