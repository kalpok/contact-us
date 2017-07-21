<?php
namespace modules\contactus\backend\controllers;

use Yii;
use yii\filters\AccessControl;
use modules\contactus\backend\models\ContactInfo;

class InfoController extends \yii\web\Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index'],
                        'roles' => ['contacus.info']
                    ]
                ]
            ]
        ];
    }

    public function actionIndex()
    {
        $model = ContactInfo::find()->one();

        if (!isset($model)) {
            $model = new ContactInfo;
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash(
                'success',
                'اطلاعات تماس با موفقیت در سیستم ذخیره شد.'
            );
        }

        return $this->render('index', ['model' => $model]);
    }
}
