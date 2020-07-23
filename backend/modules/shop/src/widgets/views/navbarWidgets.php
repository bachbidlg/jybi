<?php

use yii\helpers\Url;
use milkyway\shop\ShopModule;
use modava\auth\models\User;

?>
<ul class="nav nav-tabs nav-sm nav-light mb-25">
    <?php if (Yii::$app->user->can(User::DEV) ||
        Yii::$app->user->can('shop') ||
        Yii::$app->user->can('shopShop') ||
        Yii::$app->user->can('shopShopIndex')) { ?>
        <li class="nav-item mb-5">
            <a class="nav-link link-icon-left<?php if (Yii::$app->controller->id == 'shop') echo ' active' ?>"
               href="<?= Url::toRoute(['/shop/shop']); ?>">
                <i class="ion ion-ios-locate"></i><?= ShopModule::t('shop', 'Shop'); ?>
            </a>
        </li>
    <?php } ?>
</ul>
