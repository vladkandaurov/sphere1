<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $name
 * @property string|null $content
 * @property float $price
 * @property string|null $keywords
 * @property string|null $description
 * @property string|null $img
 * @property string $hit
 * @property string $new
 * @property string $sale
 * @property string $slug
 */
class Product extends \yii\db\ActiveRecord
{

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
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name'], 'required'],
            [['category_id'], 'integer'],
            [['content', 'hit', 'new', 'sale'], 'string'],
            [['price'], 'number'],
            [['name', 'keywords', 'description', 'img', 'slug'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Категория',
            'name' => 'Название',
            'content' => 'Описание',
            'price' => 'Цена',
            'keywords' => 'Тэги',
            'description' => 'Описание',
            'img' => 'Картинка',
            'hit' => 'Hit',
            'new' => 'New',
            'sale' => 'Sale',
            'slug' => 'Имя-ссылка',
        ];
    }

    public function getCategory() {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function getCategoryName() {
        return (isset($this->category)) ? $this->category->name : 'Не задан';
    }
}
