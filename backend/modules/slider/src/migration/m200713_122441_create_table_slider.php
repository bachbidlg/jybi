<?php

use yii\db\Migration;

/**
 * Class m200713_122441_create_table_slider
 */
class m200713_122441_create_table_slider extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check table exists */
        $check_table = Yii::$app->db->getTableSchema('slider');
        if ($check_table === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('slider', [
                'id' => $this->primaryKey(),
                'name' => $this->string(255)->notNull(),
                'image' => $this->string(255)->null(),
                'url' => $this->string(255)->null(),
                'type' => $this->integer(11)->null()->defaultValue(0)->comment('Slider chính, Slider phụ, Partner...'),
                'status' => $this->tinyInteger(1)->null()->defaultValue(1),
                'sort' => $this->integer(11)->null()->defaultValue(0),
                'created_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null()->defaultValue(1),
                'updated_at' => $this->integer(11)->null(),
                'updated_by' => $this->integer(11)->null()->defaultValue(1)
            ], $tableOptions);
            $this->addForeignKey('slider-created_by-user-id', 'slider', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('slider-updated_by-user-id', 'slider', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        }
        if (!is_dir(Yii::getAlias('@frontend/web/uploads/sliders'))) {
            @mkdir(Yii::getAlias('@frontend/web/uploads/sliders'), 775, true);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200713_122441_create_table_slider cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200713_122441_create_table_slider cannot be reverted.\n";

        return false;
    }
    */
}
