<?php

namespace milkyway\comments\models;

use milkyway\comments\CommentsModule;
use yii\base\Model;

class CommentMetadata extends Model
{
    public $name;
    public $address;

    public function rules()
    {
        return [
            [['name', 'address'], 'required'],
            [['name', 'address'], 'string', 'max' => 255]
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => CommentsModule::t('comments', 'Name'),
            'address' => CommentsModule::t('comments', 'Address'),
        ];
    }
}