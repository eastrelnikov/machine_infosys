<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title></title>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900|Quicksand:400,700|Questrial" rel="stylesheet" />

</head>
<body>
<?php $this->beginBody() ?>
<div id="header-wrapper">
    <div id="header" class="container">
        <div id="logo">
            <span class="icon icon-cog"></span>
            <h1><a href="#">Accounting of equipment</a></h1>
        </div>
        <div id="menu">
            <?php
            NavBar::begin([
                'options' => [
                    // 'class' => 'navbar-inverse navbar-fixed-top',
                    'id' => 'navbar-menu'
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right', 'id' => 'navbarmenu'],
                'items' => [
                    ['label' => 'Главная', 'url' => ['/']],
                    ['label' => 'Cтанки', 'url' => ['/machines/index/']],
                    ['label' => 'График загруженности станков', 'url' => ['/loading/charts/']],
                    Yii::$app->user->isGuest ? (
                    ['label' => 'Войти', 'url' => ['/site/login']]
                    ) : (
                        '<li>'
                        . Html::beginForm(['/site/logout'], 'post')
                        . Html::submitButton(
                            'ВЫЙТИ (' . Yii::$app->user->identity->email . ')',
                            ['class' => 'btn btn-link logout']
                        )
                        . Html::endForm()
                        . '</li>'
                    )
                ],
            ]);
            NavBar::end();
            ?>
        </div>
    </div>
</div>
<div class="wrapper">
    <div class="container">
        <br><br>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
    </div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
