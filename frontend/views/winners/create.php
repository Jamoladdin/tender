<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Winners */

$this->title = 'Create Winners';
$this->params['breadcrumbs'][] = ['label' => 'Winners', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="winners-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
