<?php

use yii\db\Migration;

/**
 * Class m200713_125635_create_table_label
 */
class m200713_125635_create_table_label extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check table exists */
        $check_table = Yii::$app->db->getTableSchema('label');
        if ($check_table === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('label', [
                'label' => $this->string(255)->notNull(),
                'language_id' => $this->integer(11)->notNull(),
                'text' => $this->string(500)->null()
            ], $tableOptions);
            $this->addPrimaryKey('label-label-language_id', 'label', ['label', 'language_id']);
            $this->addForeignKey('label-language_id-language-id', 'label', 'language_id', 'language', 'id', 'RESTRICT', 'CASCADE');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200713_125635_create_table_label cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200713_125635_create_table_label cannot be reverted.\n";

        return false;
    }
    */
}
