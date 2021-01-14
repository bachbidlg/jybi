<?php

use yii\db\Migration;

/**
 * Class m210111_075353_create_table_user_manual
 */
class m210111_075353_create_table_user_manual extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $table_name = 'user_manual';
        $check_table = Yii::$app->db->getTableSchema($table_name);
        if ($check_table === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable($table_name, [
                'id' => $this->primaryKey(),
                'title' => $this->string(255)->notNull()->comment('Tiêu đề'),
                'for_permission' => $this->integer(11)->notNull(),
                'description' => $this->string(255)->null()->comment('Mô tả'),
                'content' => $this->text()->null()->comment('Hướng dẫn sử dụng'),
                'status' => $this->tinyInteger(2)->null()->defaultValue(1)->comment('Trạng thái: 0 - disalbed, 1 - published'),
                'sort' => $this->integer(11)->null()->defaultValue(0)->comment('Thứ tự'),
                'created_at' => $this->integer(11)->null()->comment('Ngày tạo'),
                'created_by' => $this->integer(11)->null()->comment('Người tạo'),
                'updated_at' => $this->integer(11)->null()->comment('Ngày cập nhật'),
                'updated_by' => $this->integer(11)->null()->comment('Người cập nhật'),
            ], $tableOptions);
            $this->addForeignKey('fk-user_manual-for_permission-permission_manual-id', 'user_manual', 'for_permission', 'permission_manual', 'id', 'RESTRICT', 'CASCADE');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210111_075353_create_table_user_manual cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210111_075353_create_table_user_manual cannot be reverted.\n";

        return false;
    }
    */
}
