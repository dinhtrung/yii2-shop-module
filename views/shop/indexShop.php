<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\VarDumper;
use istt\shop\models\Category;

/* @var $this yii\web\View */
/* @var $searchModel vendor\istt\shop\models\ShopSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('shop', 'Shops');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('shop', 'Create {modelClass}', [
    'modelClass' => 'Shop',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'description:ntext',
            'tags',
            'owner_id',
            'created_at:datetime',
            'updated_at:datetime',
            // 'created_by',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
<?php VarDumper::dump(Yii::$aliases, 1, true); ?>