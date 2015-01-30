<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use istt\shop\models\Product;

/* @var $this yii\web\View */
/* @var $model vendor\istt\shop\models\Product */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('shop', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('shop', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('shop', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('shop', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a(Yii::t('shop', 'Add To Cart'), ['cart/add', 'id' => $model->id], [
            'class' => 'btn btn-warning',
            'data' => [
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= Html::img("@web/" . Product::REPOSITORY. $model->image, ['class' => 'thumbnail', 'alt' => $model->image]); ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//             'id',
            'title',
            'description:ntext',
            'price',
            'image',
            'category_id',
            'shop_name',
            'created_at:datetime',
            'created_by',
            'updated_at:datetime',
            'updated_by',
        ],
    ]) ?>

</div>
