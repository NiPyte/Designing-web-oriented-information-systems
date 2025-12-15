<?php
use yii\helpers\Html;
?>
<div class="alert alert-success">
    <p>Ви успішно вказали наступну інформацію:</p>

    <ul>
        <li><label>Ім’я</label>: <?= Html::encode($model->name) ?></li>
        <li><label>Адреса електронної пошти</label>: <?= Html::encode($model->email) ?></li>
    </ul>

    <a href="index.php?r=site/entry" class="btn btn-primary">Спробувати ще раз</a>
</div>