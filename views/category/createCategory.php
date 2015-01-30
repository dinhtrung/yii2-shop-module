<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model vendor\istt\shop\models\Category */

$this->title = Yii::t('shop', 'Create {modelClass}', [
    'modelClass' => 'Category',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('shop', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formCategory', [
        'model' => $model,
    ]) ?>

</div>
