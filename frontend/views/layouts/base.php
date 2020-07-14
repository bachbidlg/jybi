<?php

use yii\helpers\Html;
use frontend\assets\AppAsset;

$bundle = AppAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html class="no-js" lang="<?php echo Yii::$app->language ?>">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <head>
        <meta charset="<?php echo Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width,initial-scale=1, user-scalable=no"/>
        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <link rel="icon" type="image/png" href="<?= Yii::$app->assetManager->publish('@frontendWeb/ico/favicon.ico')[1]; ?>"/>

        <title><?php echo Html::encode($this->title) ?></title>
        <link rel="canonical" href="<?= \Yii::$app->request->absoluteUrl; ?>"/>
        <?= Html::csrfMetaTags(); ?>

        <link rel="apple-touch-icon" sizes="57x57" href="<?= Yii::$app->assetManager->publish('@frontendWeb/ico/apple-icon-57x57.png')[1]; ?>">
        <link rel="apple-touch-icon" sizes="60x60" href="<?= Yii::$app->assetManager->publish('@frontendWeb/ico/apple-icon-60x60.png')[1]; ?>">
        <link rel="apple-touch-icon" sizes="72x72" href="<?= Yii::$app->assetManager->publish('@frontendWeb/ico/apple-icon-72x72.png')[1]; ?>">
        <link rel="apple-touch-icon" sizes="76x76" href="<?= Yii::$app->assetManager->publish('@frontendWeb/ico/apple-icon-76x76.png')[1]; ?>">
        <link rel="apple-touch-icon" sizes="114x114" href="<?= Yii::$app->assetManager->publish('@frontendWeb/ico/apple-icon-114x114.png')[1]; ?>">
        <link rel="apple-touch-icon" sizes="120x120" href="<?= Yii::$app->assetManager->publish('@frontendWeb/ico/apple-icon-120x120.png')[1]; ?>">
        <link rel="apple-touch-icon" sizes="144x144" href="<?= Yii::$app->assetManager->publish('@frontendWeb/ico/apple-icon-144x144.png')[1]; ?>">
        <link rel="apple-touch-icon" sizes="152x152" href="<?= Yii::$app->assetManager->publish('@frontendWeb/ico/apple-icon-152x152.png')[1]; ?>">
        <link rel="apple-touch-icon" sizes="180x180" href="<?= Yii::$app->assetManager->publish('@frontendWeb/ico/apple-icon-180x180.png')[1]; ?>">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?= Yii::$app->assetManager->publish('@frontendWeb/ico/android-icon-192x192.png')[1]; ?>">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= Yii::$app->assetManager->publish('@frontendWeb/ico/favicon-32x32.png')[1]; ?>">
        <link rel="icon" type="image/png" sizes="96x96" href="<?= Yii::$app->assetManager->publish('@frontendWeb/ico/favicon-96x96.png')[1]; ?>">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= Yii::$app->assetManager->publish('@frontendWeb/ico/favicon-16x16.png')[1]; ?>">
        <link rel="manifest" href="<?= Yii::$app->assetManager->publish('@frontendWeb/ico/manifest.json')[1]; ?>">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?= Yii::$app->assetManager->publish('@frontendWeb/ico/ms-icon-144x144.png')[1]; ?>">
        <meta name="theme-color" content="#ffffff">

        <meta content="INDEX,FOLLOW" name="robots"/>
        <meta name="resource-type" content="Document"/>
        <meta name="distribution" content="Global"/>
        <meta name="revisit-after" content="1 days"/>

        <meta property="og:site_name" content="<?= FRONTEND_HOST_INFO; ?>"/>
        <meta property="og:type" content="website"/>
        <meta property="og:locale" content="vi_VN"/>
        <?php $this->head() ?>

    </head>
    <body>
    <?php $this->beginBody() ?>
    <?= $content ?>
    <div id="gotop"><i class="fas fa fa-angle-double-up"></i></div>
    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>