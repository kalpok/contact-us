<?php
namespace modules\contactus\backend\models;

use extensions\i18n\validators\FarsiCharactersValidator;

class ContactInfo extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'contactus_info';
    }

    public function rules()
    {
        return [
            [['fax', 'openHour','description','address','phone','title','postalCode','postBox'], 'safe'],
            ['email', 'email'],
            [['address','title'], 'trim'],
            [['title', 'description', 'motto'], FarsiCharactersValidator::className()],
            ['title', 'default', 'value' => 'تماس با ما'],

        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'شناسه',
            'title' => 'عنوان',
            'fax' => 'نمابر',
            'openHour' => 'ساعات پاسخگویی',
            'email' => 'پست الکترونیکی',
            'address' => 'آدرس',
            'phone' => 'تلفن',
            'postalCode' => 'کد پستی',
            'postBox' => 'صندوق پستی',
            'description' => 'توضیحات',
        ];
    }

    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }
}
