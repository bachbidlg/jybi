<?php

use yii\db\Migration;

/**
 * Class m200709_024559_create_table_contact
 */
class m200709_024559_create_table_contact extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        $check_tbl_contact = Yii::$app->db->getTableSchema('contact');
        if ($check_tbl_contact === null) {
            $this->createTable('contact', [
                'id' => $this->primaryKey(),
                'full_name' => $this->string(255)->notNull(),
                'phone' => $this->string(255)->notNull(),
                'email' => $this->string(255)->null(),
                'subject' => $this->string(255)->null(),
                'message' => $this->text()->null(),
                'created_at' => $this->integer(11)->null(),
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200709_024559_create_table_contact cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200709_024559_create_table_contact cannot be reverted.\n";

        return false;
    }
    */
}
