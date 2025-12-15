<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

// This class connects to the 'user' table in database
class User extends ActiveRecord implements IdentityInterface
{
    // Tell Yii which table to use
    public static function tableName()
    {
        return 'user';
    }

    // Find user by ID (needed for auto-login)
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return null;
    }

    // Find user by Username (needed for login form)
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    // Get user ID
    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    // Check if the password is correct
    public function validatePassword($password)
    {
        // Compare input password with the hash in database
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    // Encrypt password before saving
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    // Generate random key for cookies
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }
}