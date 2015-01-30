<?php

namespace istt\shop\models;

use Yii;

/**
 * This is the model class for table "{{%shop}}".
 *
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $image					Image File
 * @property string $tags					Meta keywords for this shop
 * @property integer $owner_id			The user id assigned to this shop
 * @property integer $category_id		The root category assigned to this shop
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property Product[] $products
 */
class Shop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop}}';
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
    const REPOSITORY="uploads/shop";
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['description'], 'string'],
            [['owner_id'], 'integer'],
            [['name'], 'string', 'max' => 40],
        		// Extra attributes
        		[['imageFile'], 'file', 'mimeTypes' => 'image/png image/jpeg image/gif'],
        		[['name'], 'unique'],
        		[['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'name' => Yii::t('shop', 'Name'),
            'description' => Yii::t('shop', 'Description'),
            'tags' => Yii::t('shop', 'Tags'),
            'owner_id' => Yii::t('shop', 'Owner ID'),
            'created_at' => Yii::t('shop', 'Created At'),
            'updated_at' => Yii::t('shop', 'Updated At'),
            'created_by' => Yii::t('shop', 'Created By'),
            'updated_by' => Yii::t('shop', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['shop_name' => 'name']);
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
