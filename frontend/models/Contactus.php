<?php

namespace modules\contactus\frontend\models;

use Yii;
use extensions\i18n\validators\FarsiCharactersValidator;

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
            [['name', 'email', 'subject', 'message'], 'required'],
            [['email'], 'email'],
            [['departmentId'], 'integer'],
            [['message'], 'string'],
            [['language', 'name', 'email', 'phone', 'subject'], 'string', 'max' => 255],
            [['name', 'subject', 'message'], FarsiCharactersValidator::className()]
        ];
    }

     public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'core\behaviors\TimestampBehavior'
            ]
        );
    }


    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('cms', 'ID'),
            'language' => 'زبان',
            'name' => Yii::t('cms', 'Full Name'),
            'email' => Yii::t('cms', 'Email'),
            'phone' => Yii::t('cms', 'Phone'),
            'subject' => Yii::t('cms', 'Subject'),
            'departmentId' => Yii::t('cms', 'Department'),
            'message' => Yii::t('cms', 'Message'),
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

    public function sendToDepartment()
    {
        try {
            $mailer = Yii::$app->mailer;
            $mailer->compose(
                '@modules/contactus/frontend/views/front/mail', [
                'text' => $this->message,
                'email' => $this->email,
                'name' => $this->name,
                'subject' => $this->subject,
                'phone' => $this->phone
            ]
            )->setTo($this->department->email)
            ->setSubject($this->subject)
            ->send();
        } catch (\Exception $e) {
            return false;
        }
    }
}
