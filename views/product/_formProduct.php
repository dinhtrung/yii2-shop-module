<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use istt\shop\models\Shop;
use istt\shop\models\Category;

/* @var $this yii\web\View */
/* @var $model vendor\istt\shop\models\Product */
/* @var $form kartik\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'category_id')->widget(Select2::className(), [
    		'data' => [null => Yii::t('shop', '-- Select Associated Category --')] + Category::CategoryOptions()
    ]) // @TODO: Restrict the categoryOption based on current user...
     ?>

    <?php /* @FIXME: The Associated Shop related to this product will be calculate based on selected category above....
    = $form->field($model, 'shop_name')->widget(Select2::className(), [
    		'data' => [null => Yii::t('shop', '-- Select Associated Shop --')] + ArrayHelper::map(Shop::find()->all(), 'name', 'name'),
    ])*/ ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('shop', 'Create') : Yii::t('shop', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
