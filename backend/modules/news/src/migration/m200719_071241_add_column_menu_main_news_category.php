<?php

use yii\db\Migration;

/**
 * Class m200719_071241_add_column_menu_main_news_category
 */
class m200719_071241_add_column_menu_main_news_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $columns = $check_table = Yii::$app->db->getTableSchema('news_category')->columns;
        if (!array_key_exists('menu_main', $columns)) {
            $this->addColumn('news_category', 'menu_main', $this->tinyInteger(1)->null()->after('status')->comment('Hiển thị trên menu main'));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200719_071241_add_column_menu_main_news_category cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200719_071241_add_column_menu_main_news_category cannot be reverted.\n";

        return false;
    }
    */
}
