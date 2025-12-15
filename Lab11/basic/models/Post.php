<?php

namespace app\models;

use yii\db\ActiveRecord;

// This class represents the 'posts' table
class Post extends ActiveRecord
{
    // Define the table name
    public static function tableName()
    {
        return 'posts';
    }
}