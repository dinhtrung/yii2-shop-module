<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use istt\bizgod\models\Category;

/* @var $this yii\web\View */
/* @var $model vendor\istt\shop\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('shop', 'Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

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
    </p>

    <?= Html::img("@web/" . Category::REPOSITORY. $model->image, ['class' => 'thumbnail', 'alt' => $model->image]); ?>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description:ntext',
            'image',
            'status',
            'depth',
            'lft',
            'rgt',
            'root',
        ],
    ]) ?>

</div>
