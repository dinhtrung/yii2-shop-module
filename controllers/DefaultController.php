<?php
namespace istt\shop\controllers;

use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\VarDumper;
use istt\shop\models\Product;
use yii\web\HttpException;
use istt\shop\models\Category;
use istt\shop\models\ProductSearch;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class DefaultController extends Controller {

	/**
	 * Display the shop home page of a shop.
	 * 		- Components inside a home page:
	 * 				- Product sliders
	 * 				- TopNav: All 1st level category
	 * 				- Short Introduction
	 * 				- Grid of products
	 * @param string $shopName
	 */
	public function actionIndex($shopName = null){
		$products = new ProductSearch();
		$this->render('home', ['products' => $products]);
	}

	/**
	 * Display products by category
	 * 		- Product catalog as a grid
	 * @param string $category_id
	 */
	public function actionCatalog($category_id = null){
		$catalog = Category::findOne($category_id);

		$this->render('catalog', ['catalog' => $catalog]);
	}

	/**
	 * Display a product
	 * 		- Detail info of a product
	 * 		- Related products
	 * @param string $product_id
	 */
	public function actionProduct($product_id = null){
		$product = Product::findOne($product_id);
		if (!$product) throw new HttpException(404, Yii::t('shop', "The requested product not found!"));
		// TODO: Calculate related products
		$this->render('product', ['product' => $product]);
	}
}
