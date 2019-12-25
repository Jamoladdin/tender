<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\WinnersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Winners';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="winners-index">
    <?php foreach ($model as $item) {?>
        <h3>Tender nomi: <?= $item->tender->name?></h3>
        <p>Matni: <?= $item->tender->text?></p>
        <p>Summa: <?= $item->sum?></p>
        <hr>
    <?php }?>
</div>
