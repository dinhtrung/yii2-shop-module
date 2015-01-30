<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\widgets\FileInput;
use kartik\widgets\Select2;
use istt\shop\models\Category;

/* @var $this yii\web\View */
/* @var $model vendor\istt\shop\models\Category */
/* @var $form kartik\widgets\ActiveForm */


?>

<div class="category-form">

    <?php $form = ActiveForm::begin([ 'options'=>['enctype'=>'multipart/form-data']]); ?>

<div class="row">
	<div class="col-md-9 col-sm-6">

	    <?= $form->field($model, 'name', ['addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-star"></i>']]])->textInput(['maxlength' => 255]) ?>

	</div>
	<div class="col-md-3 col-sm-6">

		<?= $form->field($model, 'status')->dropDownList([
    		Category::ENABLE => Yii::t('app', 'Enable'),
    		Category::DISABLE => Yii::t('app', 'Disable'),
    	]) ?>

	</div>
</div>


    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

<div class="row">
	<div class="col-sm-6">
	    <?= $form->field($model, 'image')->widget(FileInput::className()) ?>

	    <?= $form->field($model, 'parent', ['addon' => ['prepend' => ['content' => '<i class="glyphicon glyphicon-heart"></i>']]])->widget(Select2::className(), [
	    		'data' => [null => Yii::t('shop', '-- Select parent Category --')] + Category::CategoryOptions()
	    ]) ?>

	</div>
</div>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('shop', 'Create') : Yii::t('shop', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
