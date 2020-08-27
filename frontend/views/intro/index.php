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
if ($intro != null) {
    ?>
    <section class="page-about-us">
        <div class="container">
            <div class="page-wrapp">
                <?= $intro->newsLanguage[$default_language]->content ?>
            </div>
        </div>
    </section>
    <?php
}
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