<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\models\Workers;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \mdm\admin\models\form\Signup */

$this->title =  'Регистрация';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <div align="center" class="well"> <h1><?= Html::encode($this->title) ?></h1></div>

    <div align="center" class="row">
        <div class="col-lg-12 well">
            <p>Все поля обязательны к заполнению:</p>
            <?= Html::errorSummary($model)?>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
            <?= $form->field($model, 'workersid')->dropDownList(ArrayHelper::map(Workers::find()->all(), 'id', 'tabnom')) ->label("Табельный номер");?>
            <?= $form->field($model, 'username')->label('Логин')?>
            <?= $form->field($model, 'email')->label('Email') ?>
            <?= $form->field($model, 'password')->passwordInput()->label('Пароль') ?>
            <div class="form-group">
                <?= Html::submitButton('ОК', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
