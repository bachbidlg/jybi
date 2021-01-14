<?php

use milkyway\manual\widgets\NavbarWidgets;
use milkyway\manual\ManualModule;
use milkyway\manual\models\PermissionManual;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $permission_manual PermissionManual */
/* @var $user_manual milkyway\manual\models\UserManual */

$this->title = ManualModule::t('manual', 'User Manuals');
$this->params['breadcrumbs'][] = $this->title;

function renderMenu(array $menu = []): string
{
    if (count($menu) == 0) return '';
    $html = '';
    foreach ($menu as $row) {
        $has_child = is_array($row['data']->userManuals) && count($row['data']->userManuals) > 0;
        $html .= Html::a($row['data']->title, ($has_child ? Url::toRoute(['index', 'id' => $row['data']->primaryKey]) : 'javascript:;'), [
            'class' => 'list-group-item' . ($row['data']->primaryKey == Yii::$app->request->get('id') ? ' active' : '') . ($has_child ? '' : ' disabled'),
        ]);
        if (count($row['child']) > 0) $html .= renderMenu($row['child']);
    }
    return $html;
}

?>
<div class="container-fluid px-xxl-25 px-xl-10">
    <?php
    if (Yii::$app->user->can('develop') ||
        Yii::$app->user->can('user_develop')) {
        echo NavbarWidgets::widget();
    }
    ?>
    <div class="row">
        <div class="col-md-3 col-menu">
            <div id="navigation" class="list-group">
                <?= renderMenu(PermissionManual::getMenu()) ?>
            </div>
        </div>
        <div class="col-md-9 col-content">
            <h1 style="font-size: 36px"><?= $this->title ?></h1>
            <div class="manual-content">
                <?php
                $content = 'Hướng dẫn sử dụng';
                if ($permission_manual != null) {
                    if ($user_manual != null) $content = $user_manual->content;
                    else $content = 'Không tìm thấy hướng dẫn sự dụng "' . $permission_manual->title . '"';
                }
                echo $content;
                ?>
            </div>
        </div>
    </div>
</div>
