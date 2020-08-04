<?php
\milkyway\socials\assets\SocialsAsset::register($this);
?>
<?php $this->beginContent('@backend/views/layouts/main.php'); ?>
<?php echo $content ?>
<div class="modal fade in" id="modal-load" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
        </div>
    </div>
</div>
<?php $this->endContent(); ?>
