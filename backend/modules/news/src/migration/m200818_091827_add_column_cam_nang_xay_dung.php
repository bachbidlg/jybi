<?php

use yii\db\Migration;

/**
 * Class m200818_091827_add_column_cam_nang_xay_dung
 */
class m200818_091827_add_column_cam_nang_xay_dung extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check column exists */
        $check_column = Yii::$app->db->getTableSchema('news')->columns;
        if (!array_key_exists('cam_nang_xay_dung', $check_column)) {
            $this->addColumn('news', 'cam_nang_xay_dung', $this->tinyInteger(1)->null()->defaultValue(0)->comment('Cẩm nang xây dựng'));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200818_091827_add_column_cam_nang_xay_dung cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200818_091827_add_column_cam_nang_xay_dung cannot be reverted.\n";

        return false;
    }
    */
}
