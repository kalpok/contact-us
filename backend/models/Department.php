<?php

namespace modules\contactus\backend\models;

use Yii;
use kalpok\behaviors\TimestampBehavior;
use extensions\i18n\validators\FarsiCharactersValidator;

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
