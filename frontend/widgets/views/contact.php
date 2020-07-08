<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/8/2020
 * Time: 13:58
 */
?>
<div class="widget form-contact">
    <div class="sidebar-title">
        <h4><?= Yii::t('frontend', 'Yêu cầu gọi lại') ?></h4>
        <div class="separator"></div>
    </div>
    <div class="sidebar-content">
        <form action="#">
            <div class="form-title">Báo giá sau 10 phút</div>
            <div class="form-group">
                <input type="text" name="full_name" class="form-control" placeholder="Họ và tên">
            </div>
            <div class="form-group">
                <input type="text" name="phone" class="form-control" placeholder="Số điện thoại">
            </div>
            <div class="form-group">
                <textarea name="message" class="form-control" rows="5" placeholder="Yêu cầu nhận tư vấn"></textarea>
            </div>
            <div class="form-group text-center">
                <button type="submit" class="btn btn-contact-wg">Gửi yêu cầu</button>
            </div>
        </form>
    </div>
</div>
