<?php

use yii\db\Migration;

/**
 * Class m200708_042859_create_table_news_news_tags_hasmany
 */
class m200708_042859_create_table_news_news_tags_hasmany extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check table exists */
        $check_table = Yii::$app->db->getTableSchema('news_news_tags');
        if ($check_table === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('news_news_tags', [
                'news_id' => $this->integer(11)->notNull(),
                'tags_id' => $this->string(255)->notNull()->unique(),
            ], $tableOptions);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200708_042859_create_table_news_news_tags_hasmany cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200708_042859_create_table_news_news_tags_hasmany cannot be reverted.\n";

        return false;
    }
    */
}
