<?php

namespace modules\contactus\backend\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use modules\contactus\backend\models\ContactInfo;

class InfoController extends Controller
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
                        'roles' => ['contacus.manage']
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

        if (!empty(Yii::$app->request->post()) && $model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->addFlash('success', 'اطلاعات تماس با موفقیت در سیستم ذخیره شد.');
        }

        return $this->render('index', ['model' => $model]);
    }
}
