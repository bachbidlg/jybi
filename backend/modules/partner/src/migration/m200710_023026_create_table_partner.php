<?php

use yii\db\Migration;

/**
 * Class m200710_023026_create_table_partner
 */
class m200710_023026_create_table_partner extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check table exists */
        $check_table = Yii::$app->db->getTableSchema('partner');
        if($check_table === null){
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('partner', [
                'id' => $this->primaryKey(),
                'name' => $this->string(255)->notNull(),
                'image' => $this->string(255)->null(),
                'url' => $this->string(255)->null(),
                'status' => $this->tinyInteger(1)->null()->defaultValue(1),
                'created_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null()->defaultValue(1),
                'updated_at' => $this->integer(11)->null(),
                'updated_by' => $this->integer(11)->null()->defaultValue(1)
            ], $tableOptions);
            $this->addForeignKey('partner-created_by-user-id', 'partner', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('partner-updated_by-user-id', 'partner', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200710_023026_create_table_partner cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200710_023026_create_table_partner cannot be reverted.\n";

        return false;
    }
    */
}
