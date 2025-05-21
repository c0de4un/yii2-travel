<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;
use kartik\select2\Select2;

/** @var yii\web\View $this */
/** @var app\models\BusinessTrip $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="business-trip-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'userIds')->widget(Select2::class, [
        'data' => User::getList(),
        'options' => ['placeholder' => 'Выберите участников...', 'multiple' => true],
        'pluginOptions' => [
            'allowClear' => true,
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>