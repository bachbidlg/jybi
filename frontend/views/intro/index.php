<?php
/**
 * Created by PhpStorm.
 * User: luken
 * Date: 7/7/2020
 * Time: 01:13
 */
/* @var $intro frontend\models\News */
/* @var $team_categories array */
/* @var $team_category frontend\models\TeamCategory */
/* @var $team frontend\models\Team */

$default_language = $this->params['default_language'];
$this->title = $intro != null ? $intro->newsLanguage[$default_language]->name : Yii::t('frontend', 'Về chúng tôi');

$css = <<< CSS
.page-department * {
    line-height: initial;
}
.page-department .page-wrapp {
    background-color: #fff;
    padding: 20px;
}
.page-title {
    display: -webkit-box;
    display: flex;
    -webkit-box-pack: center;
    justify-content: center;
    -webkit-box-align: center;
    align-items: center;
    padding: 30px 15px 50px;
    background-size: 300px;
    text-align: center;
    font-size: 36px;
}
.bios, .department {
    margin-bottom: 50px;
}
.department-name {
    color: #663526;
    margin-bottom: 20px;
    font-size: 50px;
}
.bios {
    display: -webkit-box;
    display: flex;
    flex-wrap: wrap;
    margin-left: -12px;
    margin-right: -12px;
}
.bios .bio {
    -webkit-box-flex: 0;
    flex: 0 0 33.3333%;
    max-width: 33.3333%;
    position: relative;
    padding: 0 12px 70px;
    margin-bottom: 33px;
}
.bios .bio .outer {
    height: 0;
    padding-top: 100%;
    position: relative;
}
.bios .bio .outer .inner {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
}
.bio-img {
    height: 100%;
}
.picture {
    position: relative;
}
figure.image {
    height: 100%;
    display: block;
    position: relative;
    margin: 0;
}
.bios .bio .outer .inner .bio-img img {
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%,-50%);
    transform: translate(-50%,-50%);
    -o-object-fit: cover;
    object-fit: cover;
    width: 100%;
    height: 100%;
    display: block;
}
.bio-subtitle {
    position: absolute;
    top: 100%;
    text-align: center;
    left: 0;
    width: 100%;
}
.bio-name {
    font-weight: 500;
    font-size: 28px;
}
.job-title {
    font-weight: 300;
    font-size: 20px;
}
CSS;
$this->registerCss($css);
?>
    <section class="page-about-us">
        <div class="container">
            <div class="page-wrapp">
                <?= $intro != null ? $intro->newsLanguage[$default_language]->content : '' ?>
            </div>
        </div>
    </section>
<?php
if (count($team_categories) > 0) {
    ?>
    <div id="main">
        <section id="about-us">
            <div class="container">
                <div class="section-title center mb-3">
                    <span>Đội ngũ</span>
                </div>
                <?php
                foreach ($team_categories as $team_category) {
                    if (!is_array($team_category->teamHasMany) || count($team_category->teamHasMany) <= 0) continue;
                    ?>
                    <div class="section-title center mb-3">
                        <div class="h3 mb-0"><?= $team_category->name ?></div>
                    </div>
                    <div class="section-content mb-4">
                        <div class="row row-cols-1 row-cols-md-3">
                            <?php foreach ($team_category->teamHasMany as $team) { ?>
                                <div class="col mb-1 mb-md-0 p-2">
                                    <div class="box-about">
                                        <div class="box-icon mb-2">
                                            <img class="img-fluid" src="<?= $team->getImage() ?>"
                                                 alt="<?= $team->name ?>" title="<?= $team->name ?>">
                                        </div>
                                        <div class="box-title"><?= $team->name ?></div>
                                        <div class="box-desc"><?= $team->position ?></div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </section>
    </div>
<?php } ?>