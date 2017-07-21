<?php
namespace modules\contactus\frontend\models;

use Yii;

class Department extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'contactus_department';
    }

    public static function find()
    {
        $query = new \yii\db\ActiveQuery(get_called_class());
        if (Yii::$app->i18n->isMultiLanguage()) {
            $query->andWhere(
                ['like', 'language', Yii::$app->language]
            );
        }
        return $query;
    }
}
