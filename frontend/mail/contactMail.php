<?php

use yii\helpers\Url;

/* @var $subject string */
/* @var $message string */
/* @var $full_name string */
/* @var $email string */
/* @var $phone string */
?>
<div style="max-width: 100%;">
    <p>Chào bạn, Bạn vừa nhận được một tin nhắn từ khách truy cập. Tin nhắn được gửi từ website <a
                href="<?= Url::home(true) ?>"
                target="_blank"><?= str_replace(['http://', 'https://'], '', FRONTEND_HOST_INFO) ?></a></p>
    <p>Tiêu đề: <?= $subject ?></p>
    <p>Nội dung tin nhắn</p>
    <p>----</p>
    <p><?= $message ?></p>
    <p>----</p>
    <p>Tên: <?= $full_name ?></p>
    <p>Email: <a href="mailto:<?= $email ?>" target="_blank"><?= $email ?></a></p>
    <p>Điện thoại: <?= $phone ?></p>
</div>