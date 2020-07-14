<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/7/2020
 * Time: 02:42
 */

$this->title = Yii::t('frontend', 'Liên hệ');

if (Yii::$app->session->hasFlash('alert')) {
    $alert = Yii::$app->session->getFlash('alert');
    echo '<script>alert("' . $alert['msg'] . '");</script>';
}
?>

<section class="page-contact">
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col">
                <div class="contact-info">
                    <div class="h4 info-title">Thông tin công ty</div>
                    <ul>
                        <li><i class="fas fa-map-signs"></i> 123/456 Abc, Xyz</li>
                        <li><i class="fas fa-phone-volume"></i> 0123456789 (Mrs. X)</li>
                        <li><i class="fas fa-phone-square"></i> 0123456789 (Ms. Y)</li>
                        <li><i class="fas fa-envelope-open"></i> khiem.huynhtrong@gmail.com</li>
                        <li><i class="fas fa-globe"></i> www.acidesign.vn</li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <?= \frontend\widgets\ContactWidget::widget() ?>
            </div>
        </div>
    </div>
</section>

<section class="maps pt-0">
    <div class="container">
        <div class="maps-container">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1093514824393!2d106.63415431528404!3d10.802936161656675!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752950a2da354d%3A0x5a23a2baeab789a1!2zNDkxLCAzIFRyxrDhu51uZyBDaGluaCwgcGjGsOG7nW5nIDEzLCBUw6JuIELDrG5oLCBI4buTIENow60gTWluaCwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1590077418796!5m2!1svi!2s"
                    width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                    aria-hidden="false" tabindex="0"></iframe>
        </div>
    </div>
</section>
