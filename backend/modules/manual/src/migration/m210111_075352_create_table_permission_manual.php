<?php

use yii\db\Migration;

/**
 * Class m210111_075352_create_table_permission_manual
 */
class m210111_075352_create_table_permission_manual extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table_name = 'permission_manual';
        $check_table = Yii::$app->db->getTableSchema($table_name);
        if ($check_table === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable($table_name, [
                'id' => $this->primaryKey(),
                'title' => $this->string(255)->notNull(),
                'parent' => $this->integer(11)->null(),
                'for_permission' => $this->string(255)->notNull()->comment('Áp dụng cho modules-controller-action nào, định dạng theo permission của auth'),
                'status' => $this->tinyInteger(2)->null()->defaultValue(1),
                'sort' => $this->integer(11)->null()->defaultValue(0)->comment('Thứ tự'),
                'created_at' => $this->integer(11)->null()->comment('Ngày tạo'),
                'created_by' => $this->integer(11)->null()->comment('Người tạo'),
                'updated_at' => $this->integer(11)->null()->comment('Ngày cập nhật'),
                'updated_by' => $this->integer(11)->null()->comment('Người cập nhật'),
                'alias' => $this->string(500)->null(),
                'level' => $this->integer(11)->null()->defaultValue(0),
            ], $tableOptions);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210111_075352_create_table_permission_manual cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210111_075352_create_table_permission_manual cannot be reverted.\n";

        return false;
    }
    */
}
