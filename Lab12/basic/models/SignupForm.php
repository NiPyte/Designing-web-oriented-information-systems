<?php

namespace app\models;

use Yii;
use yii\base\Model;

class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;

    // Validation rules
    public function rules()
    {
        return [
            // Remove spaces
            ['username', 'trim'],
            // Username is required
            ['username', 'required'],
            // Username must be unique in 'user' table
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username is taken.'],
            // Username length
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'], // Must be valid email
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email is taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6], // Password min 6 chars
        ];
    }

    // Logic to save new user
    public function signup()
    {
        // If data is bad, return null
        if (!$this->validate()) {
            return null;
        }

        // Create new User object
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;

        // Encrypt the password
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->created_at = time();
        $user->updated_at = time();

        // Save to database. Return user if success, null if fail.
        return $user->save() ? $user : null;
    }
}