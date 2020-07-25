<?php

use yii\db\Migration;

/**
 * Class m200721_035428_create_table_news_images
 */
class m200721_035428_create_table_news_images extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        /* check table exists */
        $check_table = Yii::$app->db->getTableSchema('news_images');
        if ($check_table === null) {
            $tableOptions = null;
            if ($this->db->driverName === 'mysql') {
                // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
                $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE=InnoDB';
            }
            $this->createTable('news_images', [
                'id' => $this->primaryKey(),
                'news_id' => $this->integer(11)->notNull(),
                'image' => $this->string(255)->null(),
                'type' => $this->integer(11)->null()->defaultValue(0)->comment('Loại hình ảnh')
            ], $tableOptions);
            $this->addForeignKey('news_images-news_id-news-id', 'news_images', 'news_id', 'news', 'id', 'CASCADE', 'CASCADE');
        }
        if (!is_dir(Yii::getAlias('@frontend/web/uploads'))) {
            @mkdir(Yii::getAlias('@frontend/web/uploads'));
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m200721_035428_create_table_news_images cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200721_035428_create_table_news_images cannot be reverted.\n";

        return false;
    }
    */
}
