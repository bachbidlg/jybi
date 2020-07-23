<?php

use yii\db\Migration;

/**
 * Class m200722_032747_create_table_shop
 */
class m200722_032747_create_table_shop extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check table exists */
        $check_table = Yii::$app->db->getTableSchema('shop');
        if ($check_table === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('shop', [
                'id' => $this->primaryKey(),
                'metadata' => $this->json(),
                'created_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null()->defaultValue(1),
                'updated_at' => $this->integer(11)->null(),
                'updated_by' => $this->integer(11)->null()->defaultValue(1),
            ], $tableOptions);
            $this->addForeignKey('shop-created_by-user-id', 'shop', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('shop-updated_by-user-id', 'shop', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        }
        if (!is_dir(Yii::getAlias('@frontend/web/shop/logo'))) {
            @mkdir(Yii::getAlias('@frontend/web/uploads/shop/logo'), 0775, true);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200722_032747_create_table_shop cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200722_032747_create_table_shop cannot be reverted.\n";

        return false;
    }
    */
}
