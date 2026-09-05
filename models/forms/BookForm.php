<?php

namespace app\models\forms;

use yii\base\Model;

class BookForm extends Model
{
    public $name;
    public $publishYear;
    public $description;
    public $isbn;

    public function rules()
    {
        return [
            [['name', 'description', 'isbn'], 'filter', 'filter' => 'trim'],
            [['name', 'publishYear', 'description', 'isbn'], 'required'],
            [['publishYear'], 'integer', 'min' => 0],
            [['name', 'isbn'], 'string', 'max' => 255],
            [['description'], 'string'],
        ];
    }
}
