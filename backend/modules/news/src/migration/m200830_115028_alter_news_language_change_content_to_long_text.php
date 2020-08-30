<?php

use yii\db\Migration;

/**
 * Class m200830_115028_alter_news_language_change_content_to_long_text
 */
class m200830_115028_alter_news_language_change_content_to_long_text extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check column exists */
        $check_column = Yii::$app->db->getTableSchema('news_language')->columns;
        if (array_key_exists('content', $check_column)) {
            $this->execute('ALTER TABLE `news_language` CHANGE `content` `content` LONGTEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL');
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200830_115028_alter_news_language_change_content_to_long_text cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200830_115028_alter_news_language_change_content_to_long_text cannot be reverted.\n";

        return false;
    }
    */
}
