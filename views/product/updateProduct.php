<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model vendor\istt\shop\models\Product */

$this->title = Yii::t('shop', 'Update {modelClass}: ', [
    'modelClass' => 'Product',
]) . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('shop', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('shop', 'Update');
?>
<div class="product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formProduct', [
        'model' => $model,
    ]) ?>

</div>
