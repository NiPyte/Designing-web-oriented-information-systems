<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Вхідні дані';
?>

<div class="site-entry" style="border: 1px solid #ccc; padding: 20px; border-radius: 10px; background-color: #f9f9f9;">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Будь ласка, введіть свої дані:</p>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->label('Ваше Ім\'я') ?>

    <?= $form->field($model, 'email')->label('Ваш Email') ?>

    <div class="form-group">
        <?= Html::submitButton('Надіслати', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>