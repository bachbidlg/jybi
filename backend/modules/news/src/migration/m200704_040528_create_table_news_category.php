<?php

use yii\db\Migration;

/**
 * Class m200704_040528_create_table_news_category
 */
class m200704_040528_create_table_news_category extends Migration
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
        $check_table = Yii::$app->db->getTableSchema('news_category');
        if ($check_table === null) {
            $this->createTable('news_category', [
                'id' => $this->primaryKey(),
                'category' => $this->integer(11)->null()->defaultValue(0),
                'slug' => $this->string(255)->notNull(),
                'image' => $this->string(255)->null(),
                'type' => $this->integer(11)->null()->defaultValue(0)->comment('0: Tin tức, 1: Dự án,...'),
                'status' => $this->tinyInteger(1)->null()->defaultValue(1),
                'sort' => $this->integer(11)->null()->defaultValue(1)->comment('Thứ tự'),
                'created_at' => $this->integer(11)->null(),
                'created_by' => $this->integer(11)->null()->defaultValue(1),
                'updated_at' => $this->integer(11)->null(),
                'updated_by' => $this->integer(11)->null()->defaultValue(1),
                'alias' => $this->string(500)->null(),
            ], $tableOptions);
            $this->addForeignKey('news_category-category-news_category-id', 'news_category', 'category', 'news_category', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('news_category-created_by-user-id', 'news_category', 'created_by', 'user', 'id', 'RESTRICT', 'CASCADE');
            $this->addForeignKey('news_category-updated_by-user-id', 'news_category', 'updated_by', 'user', 'id', 'RESTRICT', 'CASCADE');
        }
        if (!is_dir(Yii::getAlias('@frontend/web/uploads/news-category'))) {
            @mkdir(Yii::getAlias('@frontend/web/uploads/news-category'), 0775, true);
        }
        $check_table_language = Yii::$app->db->getTableSchema('news_category_language');
        if ($check_table_language === null) {
            $this->createTable('news_category_language', [
                'news_category_id' => $this->integer(11)->notNull(),
                'language_id' => $this->integer(11)->notNull(),
                'name' => $this->string(255)->notNull(),
                'slug' => $this->string(255)->notNull(),
                'description' => $this->text()->null(),
                'metadata' => $this->json()->null()
            ], $tableOptions);
            $this->addPrimaryKey('news_category_language-category_id-language_id', 'news_category_language', ['news_category_id', 'language_id']);
            $this->addForeignKey('news_category_language-news_category_id-news_category-id', 'news_category_language', 'news_category_id', 'news_category', 'id', 'CASCADE', 'CASCADE');
            $this->addForeignKey('news_category_language-language_id-language-id', 'news_category_language', 'language_id', 'language', 'id', 'CASCADE', 'CASCADE');
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200704_040528_create_table_news_category cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200704_040528_create_table_news_category cannot be reverted.\n";

        return false;
    }
    */
}
