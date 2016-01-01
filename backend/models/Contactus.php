<?php

namespace modules\contactus\backend\models;

use Yii;

/**
 * This is the model class for table "contactus".
 *
 * @property integer $id
 * @property string $language
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $subject
 * @property integer $departmentId
 * @property string $message
 * @property integer $createdAt
 * @property integer $updatedAt
 *
 * @property ContactusDepartment $department
 */
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
    public function rules()
    {
        return [
        ];
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
        return $this->hasOne(ContactusDepartment::className(), ['id' => 'departmentId']);
    }
}
