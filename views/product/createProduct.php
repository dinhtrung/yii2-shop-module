<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model vendor\istt\shop\models\Product */

$this->title = Yii::t('shop', 'Create {modelClass}', [
    'modelClass' => 'Product',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('shop', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formProduct', [
        'model' => $model,
    ]) ?>

</div>
