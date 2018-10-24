<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\Login */

$this->title = 'Войти';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div align="center" class="well"> <h1><?= Html::encode($this->title) ?></h1></div>

    <div align="center" class="row">
        <div class="col-lg-12 well">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
            <?= $form->field($model, 'username')->label('Логин')?>
            <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>
            <?= $form->field($model, 'rememberMe')->checkbox()->label('Запомнить') ?>
            <div style="color:#999;margin:1em 0">
               Ещё не зарегистрированы? <?= Html::a('Регистрация', ['site/signup']) ?>.
            </div>
            <div  class="form-group">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
