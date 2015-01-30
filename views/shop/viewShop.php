<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use istt\shop\models\Shop;

/* @var $this yii\web\View */
/* @var $model vendor\istt\shop\models\Shop */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('shop', 'Shops'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('shop', 'Update'), ['update', 'id' => $model->name], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('shop', 'Delete'), ['delete', 'id' => $model->name], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('shop', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= Html::img("@web/" . Shop::REPOSITORY. $model->image, ['class' => 'thumbnail', 'alt' => $model->image]); ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'description:ntext',
            'tags',
            'owner_id',
            'created_at:datetime',
            'updated_at:datetime',
            'created_by',
            'updated_by',
        ],
    ]) ?>

</div>
