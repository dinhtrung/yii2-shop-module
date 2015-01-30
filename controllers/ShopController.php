<?php

namespace istt\shop\controllers;

use Yii;
use istt\shop\models\Shop;
use istt\shop\models\ShopSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ShopController implements the CRUD actions for Shop model.
 */
class ShopController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Shop models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ShopSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('indexShop', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Shop model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('viewShop', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Shop model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Shop();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        	/** Handle uploaded file **/
        	$image = UploadedFile::getInstance($model, 'imageFile');
        	if (($image instanceof UploadedFile)){
        		$suffix = '';
        		while (!file_exists($filePath = Yii::getAlias("@webroot/" .Shop::REPOSITORY . ($fileName = $image->baseName . $suffix . $image->extension)))){
        			$suffix += 1;
        			$image->saveAs($filePath);
        		}
        		$model->image = $fileName;
        	}
        	/** Save the model **/
        	if ($model->save()){
            	return $this->redirect(['view', 'id' => $model->name]);
        	} else {
        		return $this->render('createShop', [ 'model' => $model, ]);
        	}
        } else {
            return $this->render('createShop', [ 'model' => $model, ]);
        }
    }

    /**
     * Updates an existing Shop model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
        	/** Handle uploaded file **/
        	$image = UploadedFile::getInstance($model, 'imageFile');
        	if (($image instanceof UploadedFile)){
        		$suffix = '';
        		while (!file_exists($filePath = Yii::getAlias("@webroot/" . Shop::REPOSITORY . ($fileName = $image->baseName . $suffix . $image->extension)))){
        			$suffix += 1;
        			$image->saveAs($filePath);
        		}
        		$model->image = $fileName;
        	}
        	/** Save the model **/
        	if ($model->save()){
            	return $this->redirect(['view', 'id' => $model->name]);
        	} else {
	            return $this->render('updateShop', [ 'model' => $model, ]);
        	}
        } else {
            return $this->render('updateShop', [ 'model' => $model, ]);
        }
    }

    /**
     * Deletes an existing Shop model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Shop model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Shop the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Shop::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
