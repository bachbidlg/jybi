<?php

use yii\db\Migration;

/**
 * Class m200721_034531_add_column_menu_footer
 */
class m200721_034531_add_column_menu_footer extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $columns = $check_table = Yii::$app->db->getTableSchema('news_category')->columns;
        if (!array_key_exists('menu_footer', $columns)) {
            $this->addColumn('news_category', 'menu_footer', $this->tinyInteger(1)->null()->defaultValue(0)->after('status')->comment('Menu footer'));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200721_034531_add_column_menu_footer cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200721_034531_add_column_menu_footer cannot be reverted.\n";

        return false;
    }
    */
}
