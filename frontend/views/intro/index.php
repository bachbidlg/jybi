<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/7/2020
 * Time: 01:13
 */
/* @var $intro frontend\models\News */

$default_language = $this->params['default_language'];
$this->title = $intro != null ? $intro->newsLanguage[$default_language]->name : Yii::t('frontend', 'Về chúng tôi');
?>

<section class="page-about-us">
    <div class="container">
        <div class="page-wrapp">
            <?= $intro != null ? $intro->newsLanguage[$default_language]->content : '' ?>
        </div>
    </div>
</section>