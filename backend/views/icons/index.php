<div class="container-fluid px-xxl-25 px-xl-10 pt-xxl-25 pt-xl-10">
    <!-- Title -->
    <div class="hk-pg-header">
        <h4 class="hk-pg-title">
            <span class="pg-title-icon">
                <span class="ion ion-md-apps"></span>
            </span> Icons
        </h4>
    </div>
    <!-- Row -->
    <div class="row">
        <div class="col-xl-12 icon-content">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="fontawesome-tab" data-toggle="tab" href="#fontawesome" role="tab"
                       aria-controls="fontawesome" aria-selected="true">Fontawesome</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="simple-line-tab" data-toggle="tab" href="#simple-line" role="tab"
                       aria-controls="simple-line" aria-selected="false">Simple Line Icons</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="themify-tab" data-toggle="tab" href="#themify" role="tab"
                       aria-controls="themify" aria-selected="false">Themify Icons</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="fontawesome" role="tabpanel"
                     aria-labelledby="fontawesome-tab">
                    <?= $this->render('_fontawesome', []) ?>
                </div>
                <div class="tab-pane fade" id="simple-line" role="tabpanel" aria-labelledby="simple-line-tab">
                    <?= $this->render('_simple-line', []) ?>
                </div>
                <div class="tab-pane fade" id="themify" role="tabpanel" aria-labelledby="themify-tab">
                    <?= $this->render('_themify', []) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$script = <<< JS
copyToClipboard = str => {
    const el = document.createElement('textarea');
    el.value = str;
    document.body.appendChild(el);
    el.select();
    document.execCommand('copy');
    document.body.removeChild(el);
};
$('.icon-content').on('click', 'ul.font-icons-wrap > li > a', function(e){
    var icon = $(this).find('i').attr('class');
    copyToClipboard(icon);
    $(this).tooltip({title: 'Copied'});
});
JS;
$this->registerJs($script, \yii\web\View::POS_END);