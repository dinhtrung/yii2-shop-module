<?php
/**
 * Return a list of menu item suitable for display in the main Nav
 */
return [
		['label' => Yii::t('shop', 'Shop'), 'url'=>['/shop/shop']],
		['label' => Yii::t('shop', 'Category'), 'url'=>['/shop/category']],
		['label' => Yii::t('shop', 'Product'), 'url'=>['/shop/product']],
		['label' => Yii::t('shop', 'Product Administrator'), 'url'=>['/shop/product/admin'], 'visible' => Yii::$app->user->can('/shop/product/admin')],
		['label' => Yii::t('shop', 'Cart'), 'url'=>['/shop/cart/view']],
];