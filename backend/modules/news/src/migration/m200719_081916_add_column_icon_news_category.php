<?php

use yii\db\Migration;

/**
 * Class m200719_081916_add_column_icon_news_category
 */
class m200719_081916_add_column_icon_news_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $columns = $check_table = Yii::$app->db->getTableSchema('news_category')->columns;
        if (!array_key_exists('icon', $columns)) {
            $this->addColumn('news_category', 'icon', $this->string(255)->null()->after('status')->comment('Icon menu mobile'));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200719_081916_add_column_icon_news_category cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200719_081916_add_column_icon_news_category cannot be reverted.\n";

        return false;
    }
    */
}
