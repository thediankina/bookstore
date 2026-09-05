<?php

namespace app\models\ar;

use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $name
 * @property int $publish_year
 * @property string $description
 * @property string $isbn
 * @property string $created_at
 * @property string|null $updated_at
 */
class BookAr extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%books}}';
    }
}
