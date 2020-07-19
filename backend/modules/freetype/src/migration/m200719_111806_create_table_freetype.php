<?php

use yii\db\Migration;

/**
 * Class m200719_111806_create_table_freetype
 */
class m200719_111806_create_table_freetype extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check table exists */
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
        }
        $check_table = Yii::$app->db->getTableSchema('freetype');
        if ($check_table === null) {
            $this->createTable('freetype', [
                'id' => $this->primaryKey(),
                'image' => $this->string(255)->null(),
                'status' => $this->tinyInteger(1)->null()->defaultValue(1),
                'sort' => $this->integer(11)->null()->defaultValue(1)->comment('Thứ tự'),
                'type' => $this->integer(11)->null()->defaultValue(0)->comment('0: Tự soạn thảo, 1: Thông tin footer, ...'),
                'created_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null()->defaultValue(1),
                'updated_at' => $this->integer(11)->null(),
                'updated_by' => $this->integer(11)->null()->defaultValue(1),
            ], $tableOptions);
            $this->addForeignKey('freetype-created_by-user-id', 'freetype', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('freetype-updated_by-user-id', 'freetype', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        }
        if (!is_dir(Yii::getAlias('@frontend/web/uploads/freetype'))) {
            @mkdir(Yii::getAlias('@frontend/web/uploads/freetype'), 0775, true);
        }
        $check_table_language = Yii::$app->db->getTableSchema('freetype_language');
        if ($check_table_language === null) {
            $this->createTable('freetype_language', [
                'freetype_id' => $this->integer(11)->notNull(),
                'language_id' => $this->integer(11)->notNull(),
                'name' => $this->string(255)->notNull(),
                'content' => $this->text()->null(),
                'metadata' => $this->json()->null()
            ], $tableOptions);
            $this->addPrimaryKey('freetype_language-freetype_id-language_id', 'freetype_language', ['freetype_id', 'language_id']);
            $this->addForeignKey('freetype_language-freetype_id-freetype-id', 'freetype_language', 'freetype_id', 'freetype', 'id', 'CASCADE', 'CASCADE');
            $this->addForeignKey('freetype_language-language_id-language-id', 'freetype_language', 'language_id', 'language', 'id', 'CASCADE', 'CASCADE');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200719_111806_create_table_freetype cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200719_111806_create_table_freetype cannot be reverted.\n";

        return false;
    }
    */
}
