<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/8/2020
 * Time: 15:00
 */
?>
<div class="widget news-featured">
    <div class="sidebar-title">
        <h4><?= Yii::t('frontend', 'Cẩm nang xây dựng') ?></h4>
        <div class="separator"></div>
    </div>
    <div class="sidebar-content">
        <ul>
            <?php for ($i = 1; $i <= 5; $i++) { ?>
            <li>
                <a href="<?= \yii\helpers\Url::toRoute(['/du-an/chi-tiet']) ?>">8 phong cách nhà phố mới lạ đáng xây nhất năm 2020</a>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>
