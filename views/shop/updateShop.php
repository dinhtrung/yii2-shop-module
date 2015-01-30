<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model vendor\istt\shop\models\Shop */

$this->title = Yii::t('shop', 'Update {modelClass}: ', [
    'modelClass' => 'Shop',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('shop', 'Shops'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->name]];
$this->params['breadcrumbs'][] = Yii::t('shop', 'Update');
?>
<div class="shop-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formShop', [
        'model' => $model,
    ]) ?>

</div>
