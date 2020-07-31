<?php

use yii\db\Migration;

/**
 * Class m200731_102052_create_table_socials
 */
class m200731_102052_create_table_socials extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check table exists */
        $check_table = Yii::$app->db->getTableSchema('socials');
        if ($check_table === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('socials', [
                'id' => $this->primaryKey(),
                'name' => $this->string(255)->notNull(),
                'type' => $this->tinyInteger(1)->null()->defaultValue(0),
                'image' => $this->string(255)->null(),
                'url' => $this->string(255)->null(),
                'status' => $this->tinyInteger(1)->null()->defaultValue(1),
                'created_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null()->defaultValue(1),
                'updated_at' => $this->integer(11)->null(),
                'updated_by' => $this->integer(11)->null()->defaultValue(1),
            ], $tableOptions);
            $this->addForeignKey('socials-created_by-user-id', 'socials', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('socials-updated_by-user-id', 'socials', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            if(!is_dir(Yii::getAlias('@frontend/web/uploads/socials'))){
                @mkdir(Yii::getAlias('@frontend/web/uploads/socials'), 0775, true);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200731_102052_create_table_socials cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200731_102052_create_table_socials cannot be reverted.\n";

        return false;
    }
    */
}
