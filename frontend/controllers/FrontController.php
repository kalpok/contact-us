<?php

namespace modules\contactus\frontend\controllers;

use yii\web\Controller;
use modules\contactus\frontend\models\Contactus;

class FrontController extends Controller
{
    public $layout = '//two-column';

    public function actionIndex()
    {
        $model = new Contactus;
        if (!empty($this->modelScenario)) {
            $model->scenario = $this->modelScenario;
        }
        $model->loadDefaultValues();
        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            $model->sendToDepartment();
            \Yii::$app->session->addFlash(
                'success',
                'پیام شما با موفقیت ارسال شد.'
            );
        } else {
            \Yii::$app->session->addFlash(
                'error',
                'مشکلی در فرایند ارسال پیام به وجود آمده. لطفا مجددا تلاش کنید.'
            );
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
