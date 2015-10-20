<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="background">
    <?php
    NavBar::begin([
        'brandLabel' => ' ',
        'brandOptions' => [
            'class' => 'logo',
        ],
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navRow',//navbar-inverse navbar-fixed-top
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navButton navbar-right'],
        'items' => [
            ['label' => 'Happy TESTERS', 'url' => [Url::toRoute('/site/index')]],
            ['label' => 'Status', 'url' => [Url::toRoute('/site/index')]],
            ['label' => 'Invite Friends', 'url' => [Url::toRoute('/site/index')]],
            ['label' => 'Today`s Survey', 'url' => [Url::toRoute('/site/index')]],
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<?php $this->endBody() ?>
<footer class="TFfooter">
    <div class="TFfooter">
        <span>
            &copy;  Copyright Fancy Survey 2013.
        </span>
    </div>
</footer>
</body>
</html>
<?php $this->endPage() ?>
