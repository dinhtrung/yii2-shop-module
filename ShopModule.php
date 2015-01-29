<?php

namespace istt\shop;

use yii\console\Application as ConsoleApplication;
use yii\base\Module as BaseModule;
class ShopModule extends BaseModule
{
	/**
	 * @var string The prefix for user module URL.
	 * @See [[GroupUrlRule::prefix]]
	 */
	public $urlPrefix = 'shop';
	/** @var array The rules to be used in URL management. */
	public $urlRules = [
	];
//     public function init()
//     {
//         parent::init();

//         if (\Yii::$app instanceof Application){
//         	$this->controllerNamespace = 'istt\shop\commands';
//         }
//     }
}
