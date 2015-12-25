<?php

namespace modules\contactus\frontend\models;

use Yii;

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
    public function attributeLabels()
    {
        return [
            'id' => 'شناسه',
            'language' => 'زبان',
            'title' => 'عنوان',
            'createdAt' => 'تاریخ ساخت',
            'updatedAt' => 'آخرین بروزرسانی',
        ];
    }

}
