<?php

namespace modules\contactus\frontend\models;

use Yii;
use modules\contactus\frontend\Module;
use extensions\i18n\validators\FarsiCharactersValidator;

class Contactus extends \yii\db\ActiveRecord
{
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
            [['departmentId'], 'required', 'on' => 'withDepartment'],
            [['message', 'language'], 'string'],
            [['name', 'email', 'phone', 'subject'], 'string', 'max' => 255],
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
            'name' => Module::t('Full Name'),
            'email' => Module::t('Email'),
            'phone' => Module::t('Phone'),
            'subject' => Module::t('Subject'),
            'departmentId' => Module::t('Department'),
            'message' => Module::t('Message'),
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
        if ($this->department == null) {
            return;
        }
        try {
            $mailer = Yii::$app->mailer;
            $mailer->compose(
                '@modules/contactus/frontend/views/front/mail',
                [
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
