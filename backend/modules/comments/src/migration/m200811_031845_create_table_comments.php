<?php

use yii\db\Migration;

/**
 * Class m200811_031845_create_table_comments
 */
class m200811_031845_create_table_comments extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check table exists */
        $check_table = Yii::$app->db->getTableSchema('comments');
        if ($check_table === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('comments', [
                'id' => $this->primaryKey(),
                'comment' => $this->text()->notNull(),
                'comment_table' => $this->string(255)->notNull(),
                'comment_id' => $this->integer(11)->notNull(),
                'status' => $this->tinyInteger(1)->null()->defaultValue(1)->comment('0: Disabled, 1: Published'),
                'created_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null(),
                'updated_at' => $this->integer(11)->null(),
                'updated_by' => $this->integer(11)->null(),
                'metadata' => $this->json()->null()->comment('Other info, ex: name, phone, address,...')
            ], $tableOptions);
            $this->addForeignKey('comments-created_by-user-id', 'comments', 'created_by', 'user', 'id', 'CASCADE', 'RESTRICT');
            $this->addForeignKey('comments-updated_by-user-id', 'comments', 'updated_by', 'user', 'id', 'CASCADE', 'RESTRICT');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200811_031845_create_table_comments cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200811_031845_create_table_comments cannot be reverted.\n";

        return false;
    }
    */
}
