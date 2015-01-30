<?php
use yii\helpers\VarDumper;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;

//VarDumper::dump(Yii::$app->cart, 10, TRUE); ?>

<?php
$dataProvider = new ArrayDataProvider(['allModels' => Yii::$app->cart->positions]);
// @TODO: The cart should be able to update position of each elements...
echo GridView::widget([
 		'dataProvider' => $dataProvider,
		'columns' => [
				['class' => 'yii\grid\SerialColumn'],
				'title',
				'price',
				'quantity',
		]
]);

// @TODO: Checkout form goes here...