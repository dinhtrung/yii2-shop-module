<?php

namespace istt\shop\models;

use Yii;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;

/**
 * This is the model class for table "{{%product}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property double $price
 * @property string $image
 * @property integer $category_id
 * @property string $shop_name
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 *
 * @property Category $category
 * @property Shop $shopName
 */
class Product extends \yii\db\ActiveRecord implements CartPositionInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('shopDb');
    }

    /**
     * @inheritdoc
     */
    public $imageFile;
    const REPOSITORY="@web/uploads/products/images";
    public function rules()
    {
        return [
            [['title', 'description', 'price'/*, 'image'*/], 'required'],
            [['description'], 'string'],
            [['price'], 'number'],
            [['category_id'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],
            [['shop_name'], 'string', 'max' => 40],
        		/** EXTRA ATTRIBUTES **/

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('shop', 'ID'),
            'title' => Yii::t('shop', 'Title'),
            'description' => Yii::t('shop', 'Description'),
            'price' => Yii::t('shop', 'Price'),
            'image' => Yii::t('shop', 'Image'),
            'category_id' => Yii::t('shop', 'Category ID'),
            'shop_name' => Yii::t('shop', 'Shop Name'),
            'created_at' => Yii::t('shop', 'Created At'),
            'created_by' => Yii::t('shop', 'Created By'),
            'updated_at' => Yii::t('shop', 'Updated At'),
            'updated_by' => Yii::t('shop', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopName()
    {
        return $this->hasOne(Shop::className(), ['name' => 'shop_name']);
    }


    /* END OF GII GENERATED CODE */
    /* END OF GII GENERATED CODE */
    /* END OF GII GENERATED CODE */

    use CartPositionTrait;

    public function getPrice()
    {
    	return $this->price;
    }

    public function getId()
    {
    	return $this->id;
    }
    /**
         * Automatically insert created_at, created_by, updated_at, updated_by
         * @see \yii\base\Component::behaviors()
         */
        public function behaviors(){
        	return [
        			'blameable' => \yii\behaviors\BlameableBehavior::className(),
        			'timestamp' => \yii\behaviors\TimestampBehavior::className(),
        	];
        }

}
