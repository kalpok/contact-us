<?php

namespace modules\contactus\backend\models;

use Yii;

class Contactus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contactus';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'شناسه',
            'language' => 'زبان',
            'name' => 'نام',
            'email' => 'ایمیل',
            'phone' => 'تلفن',
            'subject' => 'موضوع',
            'departmentId' => 'دپارتمان',
            'message' => 'پیام',
            'createdAt' => 'تاریخ ارسال پیام',
            'updatedAt' => 'آخرین بروزرسانی',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'departmentId']);
    }
}
