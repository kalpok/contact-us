<?php

namespace modules\contactus\frontend\controllers;

use modules\contactus\frontend\models\Contactus;

class FrontController extends \yii\web\Controller
{
    public $layout = '//two-column';

    public function actionIndex()
    {
        $model = new Contactus;
        if ($model->load(\Yii::$app->request->post())) {
            if ($model->save()) {
                $model->sendToDepartment();
                \Yii::$app->session->addFlash(
                    'success',
                    'پیام شما با موفقیت ارسال شد.'
                );
                $this->refresh();
            } else {
                \Yii::$app->session->addFlash(
                    'error',
                    'مشکلی در فرایند ارسال پیام به وجود آمده. لطفا مجددا تلاش کنید.'
                );
            }
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
