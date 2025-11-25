<?php

namespace app\models;

use Yii;
use yii\base\Model;

class EntryForm extends Model
{
    public $name;
    public $email;

    // Validation rules
    public function rules()
    {
        return [
            // name та email required
            [['name', 'email'], 'required'],
            // Email should be correct
            ['email', 'email'],
        ];
    }
}
?>