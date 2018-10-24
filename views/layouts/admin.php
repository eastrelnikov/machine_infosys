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
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrapper">
    <?php
    NavBar::begin([
        'brandLabel' => 'Админ-панель',
        'brandUrl' => ['/rbac/default/index/'],
        'options' => [
            // 'class' => 'navbar-inverse navbar-fixed-top',
            'id' => 'navbarmenu'
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
                ['label' => 'Пользователи','url' => ['/rbac/default/index']],
                ['label' => 'Станки', 'items' => [
                    ['label' => 'Добавить станок', 'url' => ['/admin/machines/create']],
                ['label' => 'Просмотр станков', 'url' => ['/admin/machines/']],
                    ['label' => 'Загрузить станок', 'url' => ['/admin/loading/create']],
            ]],
            ['label' => 'Заказы', 'items' => [
                ['label' => 'Добавить заказ', 'url' => ['/admin/orders/create']],
                ['label' => 'Просмотр заказов', 'url' => ['/admin/detailsorders']],
            ]],
            ['label' => 'График загруженности','url' => ['/admin/loading/charts']],
            ['label' => 'Отчёты','url' => ['/admin/loading/reports']],
            Yii::$app->user->isGuest ? (
            ['label' => 'Войти', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post')
                . Html::submitButton(
                    'Выйти (' . Yii::$app->user->identity->email . ')',
                    ['class' => 'btn btn-link logout']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>


<?php $this->endBody() ?>
</body>
<div class="wrapper"></div>
<div class="wrapper"></div>
<div class="wrapper"></div>

</html>
<?php $this->endPage() ?>
