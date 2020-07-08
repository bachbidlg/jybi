<?php

use yii\db\Migration;

/**
 * Class m200708_020618_create_table_news
 */
class m200708_020618_create_table_news extends Migration
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
        $check_table = Yii::$app->db->getTableSchema('news');
        if ($check_table === null) {
            $this->createTable('news', [
                'id' => $this->primaryKey(),
                'slug' => $this->string(255)->notNull(),
                'category' => $this->integer(11)->null()->defaultValue(0),
                'type' => $this->integer(11)->null()->defaultValue(0)->comment('0: Tin tức, 1: Dự án,...'),
                'image' => $this->string(255)->null(),
                'status' => $this->tinyInteger(1)->null()->defaultValue(1),
                'sort' => $this->integer(11)->null()->defaultValue(1)->comment('Thứ tự'),
                'created_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null()->defaultValue(1),
                'updated_at' => $this->integer(11)->null(),
                'updated_by' => $this->integer(11)->null()->defaultValue(1),
                'alias' => $this->string(500)->null(),
            ], $tableOptions);
            $this->addForeignKey('news-category-news_category-id', 'news', 'category', 'news_category', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('news-created_by-user-id', 'news', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('news-updated_by-user-id', 'news', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        }
        if (!is_dir(Yii::getAlias('@frontend/web/uploads/news'))) {
            @mkdir(Yii::getAlias('@frontend/web/uploads/news'), 0775, true);
        }
        $check_table_language = Yii::$app->db->getTableSchema('news_language');
        if ($check_table_language === null) {
            $this->createTable('news_language', [
                'news_id' => $this->integer(11)->notNull(),
                'language_id' => $this->integer(11)->notNull(),
                'name' => $this->string(255)->notNull(),
                'slug' => $this->string(255)->notNull(),
                'description' => $this->text()->null(),
                'content' => $this->text()->null(),
                'metadata' => $this->json()->null()
            ], $tableOptions);
            $this->addPrimaryKey('news_language-news_id-language_id', 'news_language', ['news_id', 'language_id']);
            $this->addForeignKey('news_language-news_id-news-id', 'news_language', 'news_id', 'news', 'id', 'CASCADE', 'CASCADE');
            $this->addForeignKey('news_language-language_id-language-id', 'news_language', 'language_id', 'language', 'id', 'CASCADE', 'CASCADE');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200708_020618_create_table_news cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200708_020618_create_table_news cannot be reverted.\n";

        return false;
    }
    */
}
