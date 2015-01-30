<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model vendor\istt\shop\models\Shop */

$this->title = Yii::t('shop', 'Create {modelClass}', [
    'modelClass' => 'Shop',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('shop', 'Shops'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formShop', [
        'model' => $model,
    ]) ?>

</div>
