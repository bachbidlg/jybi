<?php

use yii\db\Migration;

/**
 * Class m200824_022421_add_column_news_category_type_du_an
 */
class m200824_022421_add_column_news_category_type_du_an extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check column exists */
        $check_column = Yii::$app->db->getTableSchema('news_category')->columns;
        if (!array_key_exists('type_du_an', $check_column)) {
            $this->addColumn('news_category', 'type_du_an', $this->tinyInteger(1)->null()->after('type')->comment('Loại dự án'));
        }
        if (!array_key_exists('hot', $check_column)) {
            $this->addColumn('news_category', 'hot', $this->tinyInteger(1)->null()->defaultValue(0)->after('type')->comment('Danh mục nổi bật'));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200824_022421_add_column_news_category_type_du_an cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200824_022421_add_column_news_category_type_du_an cannot be reverted.\n";

        return false;
    }
    */
}
