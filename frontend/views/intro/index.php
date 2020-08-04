<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/7/2020
 * Time: 01:13
 */
/* @var $intro frontend\models\News */

$default_language = $this->params['default_language'];
$this->title = $intro->newsLanguage[$default_language]->name;
?>

<section class="page-about-us">
    <div class="container">
        <div class="page-wrapp">
            <?= $intro->newsLanguage[$default_language]->content ?>
        </div>
    </div>
</section>