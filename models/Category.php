<?php

namespace istt\shop\models;

use creocoder\nestedsets\NestedSetsBehavior;
use creocoder\nestedsets\NestedSetsQueryBehavior;
use Yii;


/**
 * This is the model class for table "{{%category}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property integer $status
 * @property integer $depth
 * @property integer $lft
 * @property integer $rgt
 * @property integer $root
 *
 * @property Product[] $products
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%category}}';
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
    const REPOSITORY="uploads/category/";
    public $parent;
    public function rules()
    {
        return [
//             [['name', 'description', 'image', 'status', 'depth'], 'required'],
            [['description'], 'string'],
//             [['status', 'depth', 'lft', 'rgt', 'root'], 'integer'],
            [['name', 'image'], 'string', 'max' => 255],
        		/* @custom: Extra override other rules */
        		[['imageFile'], 'file', 'mimeTypes' => 'image/*'],
             	[['name', 'description'], 'required'],
	            [['status'], 'in', 'range' => [self::ENABLE, self::DISABLE]],
        		[['parent'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('shop', 'ID'),
            'name' => Yii::t('shop', 'Name'),
            'description' => Yii::t('shop', 'Description'),
            'image' => Yii::t('shop', 'Image'),
            'status' => Yii::t('shop', 'Status'),
            'depth' => Yii::t('shop', 'Depth'),
            'lft' => Yii::t('shop', 'Lft'),
            'rgt' => Yii::t('shop', 'Rgt'),
            'root' => Yii::t('shop', 'Root'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'id']);
    }

    /** END OF GII GENERATED CODE **/

	/**
	 * Automatically insert created_at, created_by, updated_at, updated_by
	 *
	 * @see \yii\base\Component::behaviors()
	 */
	public function behaviors() {
		return [
				'Blameable' => \yii\behaviors\BlameableBehavior::className (),
				'Timestamp' => \yii\behaviors\TimestampBehavior::className (),
				'NestedSets' => [
						'class' => NestedSetsBehavior::className(),
						'treeAttribute' => 'root'
				],
		];
	}

	const ENABLE = 1;
	const DISABLE = 0;

	/**
	 * Retrieve the list of available Categories as option list
	 * Recursive scan the children of a node in the tree
	 */
	public static function CategoryOptions($root = 0, $depth = null){
		$res = [];
		if ($root instanceof self){
			$res[$root->id] = str_repeat('-', $root->depth) . ' ' . $root->name;
			if ($depth){
				foreach ($root->children(1)->all() as $childRoot){
					$res += self::CategoryOptions($childRoot, $depth - 1);
				}
			} elseif (is_null($depth)){
				foreach ($root->children(1)->all() as $childRoot){
					$res += self::CategoryOptions($childRoot, NULL);
				}
			}
		} elseif (is_scalar($root)){
			if ($root == 0){
				foreach (self::find()->roots()->all() as $rootItem){
					if ($depth)
						$res += self::CategoryOptions($rootItem, $depth - 1);
					elseif (is_null($depth))
					$res += self::CategoryOptions($rootItem, NULL);
				}
			} else {
				$root = self::find($root)->one();
				if ($root) 	$res += self::CategoryOptions($root, $depth);
			}
		}
		return $res;
	}
	public function transactions()
	{
		return [
				self::SCENARIO_DEFAULT => self::OP_ALL,
		];
	}
	public static function find()
	{
		return new CategoryQuery(get_called_class());
	}

	public function afterFind(){
		$this->imageFile = Yii::getAlias("@webroot/" . self::REPOSITORY . $this->image);
		parent::afterFind();
	}

}

/**
 * CategoryQuery that support NestedSet Behaviors
 * @author dinhtrung
 *
 */
class CategoryQuery extends \yii\db\ActiveQuery
{
	public function behaviors() {
		return [
				NestedSetsQueryBehavior::className(),
		];
	}
}
