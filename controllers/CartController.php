<?php
namespace istt\shop\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use istt\shop\models\Product;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class CartController extends Controller
{
	public function behaviors()
	{
		return [
				'verbs' => [
						'class' => VerbFilter::className(),
						'actions' => [
								'add' => ['post'],
						],
				],
		];
	}

	/**
	 * Add a product into the Cart
	 * @param integer $id The product ID
	 * @throws NotFoundHttpException
	 * @return \yii\web\Response
	 */
	public function actionAdd($id, $quantity = 1)
	{
		$model = Product::findOne($id);
		if ($model) {
			Yii::$app->cart->put($model, $quantity);
			Yii::$app->session->addFlash('success', "Successfully update your cart!");
			return $this->redirect(Yii::$app->user->returnUrl?Yii::$app->user->returnUrl:['view']);
		}
		throw new NotFoundHttpException();
	}
	/**
	 * Display the cart
	 * @return string The html of the page
	 */
	public function actionView(){
		return $this->render('cart');
	}
	/**
	 * Reset the cart
	 * @return \yii\web\Response
	 */
	public function actionReset(){
		Yii::$app->cart->removeAll();
		return $this->redirect(['view']);
	}

}