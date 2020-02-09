<?php

namespace common\models;

use Yii;


/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int $parent_id
 * @property string $name
 * @property string|null $keyword
 * @property string|null $desc
 * @property string|null $slug
 */
class Category extends \yii\db\ActiveRecord
{
    public $parentCategory;

    function behaviors() {
        return [
            'slug' => [
                'class' => 'Zelenin\yii\behaviors\Slug',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id'], 'integer'],
            [['name'], 'required'],
            [['name', 'keyword', 'desc', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'name' => 'Name',
            'keyword' => 'Keyword',
            'desc' => 'Desc',
            'slug' => 'Slug',
        ];
    }

    public function getProducts() {
        return $this->hasMany(Product::class, ['category_id' => 'id']);
    }

    public static function getList() {
        return \yii\helpers\ArrayHelper::map(self::find()->andWhere(['parent_id' => 0])->all(), 'id', 'name');
    }


}
