<?php

namespace modules\contactus\backend\models;

use Yii;
use kalpok\behaviors\TimestampBehavior;
use kalpok\validators\FarsiCharactersValidator;
/**
 * This is the model class for table "contactus_department".
 *
 * @property integer $id
 * @property string $language
 * @property string $title
 * @property integer $createdAt
 * @property integer $updatedAt
 *
 * @property Contactus[] $contactuses
 */
class Department extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contactus_department';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'email'], 'required'],
            [['email'], 'email'],
            [['language', 'title'], 'string', 'max' => 255],
            [['title'], FarsiCharactersValidator::className()]
        ];
    }

    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                TimestampBehavior::className(),
            ]
        );
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'شناسه',
            'language' => 'زبان',
            'email' => 'ایمیل',
            'title' => 'عنوان',
            'createdAt' => 'تاریخ ساخت',
            'updatedAt' => 'آخرین بروزرسانی',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getContactuses()
    {
        return $this->hasMany(Contactus::className(), ['departmentId' => 'id']);
    }
}
