<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/8/2020
 * Time: 14:09
 */
?>
<div class="widget news-relative">
    <div class="sidebar-title">
        <h4><?= Yii::t('frontend', 'Có thể bạn quan tâm') ?></h4>
        <div class="separator"></div>
    </div>
    <div class="sidebar-content">
        <?php for ($i = 1; $i <= 3; $i++) { ?>
            <div class="media">
                <div class="media-left">
                    <img src="<?= Yii::$app->assetManager->publish('@frontendWeb/images/sub-properties-' . $i . '.jpg')[1] ?>"
                         alt="img" class="media-object">
                </div>
                <div class="media-body">
                    <h3 class="media-heading">
                        <a href="<?= \yii\helpers\Url::toRoute(['/du-an/chi-tiet']) ?>">Những nguy cơ tiềm ẩn sau "Đơn vị thi công xây dựng nghiệp dư"</a>
                    </h3>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
