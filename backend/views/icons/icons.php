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
<?php
$script = <<< JS
$('.icon-content ul.font-icons-wrap > li > a').on('click', function(){
    var el = $(this),
        has_popover = el.attr('aria-describedby') || null;
    if(has_popover != null){
        el.popover('hide');
    } else {
        var content = el.children('i').attr('class');
        $('.icon-content ul.font-icons-wrap > li > a').not(el).popover('hide');
        el.popover({
            trigger : "click",
            content: content,
            placement: "top"
        }).popover('show');
    }
});
JS;
$this->registerJs($script);