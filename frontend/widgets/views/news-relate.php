<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/8/2020
 * Time: 15:55
 */
?>

<div class="widget blog-post-related px-0 pb-0">
    <div class="sidebar-title">
        <h4><?= Yii::t('frontend', 'Bài viết liên quan') ?></h4>
        <div class="separator"></div>
    </div>
    <div class="sidebar-content">
        <ul>
            <?php for ($i = 1; $i <= 5; $i++) { ?>
            <li>
                <i class="fas fa-angle-double-right"></i>
                <a href="<?= \yii\helpers\Url::toRoute(['/du-an/chi-tiet']) ?>">Xây biệt thự có hồ bơi sang trọng tự nhiên</a>
            </li>
            <?php } ?>
        </ul>
    </div>
</div>
