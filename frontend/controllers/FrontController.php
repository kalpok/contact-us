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
            \Yii::$app->session->addFlash(
                'success',
                'پیغام شما با موفقیت ارسال شد.'
            );
        }
        return $this->render('index', [
            'model' => $model,
        ]);
    }
}
