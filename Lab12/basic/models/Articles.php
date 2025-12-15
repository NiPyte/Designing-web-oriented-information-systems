<?php

namespace app\models;

use Yii;

// Note: Class name is Articles (plural)
class Articles extends \yii\db\ActiveRecord
{
    public $imageFile; // Virtual attribute for file upload

    public static function tableName()
    {
        return 'articles';
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description', 'content'], 'string'],
            [['created_at'], 'safe'],
            [['title', 'image'], 'string', 'max' => 255],
            // Add rule for image file
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
            'image' => 'Image',
            'created_at' => 'Created At',
            'imageFile' => 'Upload Image',
        ];
    }

    // Method to upload file
    public function upload()
    {
        if ($this->validate() && $this->imageFile) {
            // Create 'uploads' folder if not exists
            if (!is_dir('uploads')) {
                mkdir('uploads');
            }

            $fileName = $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $this->imageFile->saveAs('uploads/' . $fileName);
            $this->image = $fileName; // Save filename to DB
            return true;
        }
        return false;
    }
}