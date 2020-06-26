<?php

namespace modules\contactus\frontend\controllers;

use modules\contactus\frontend\Module;
use modules\contactus\frontend\models\Contactus;
use modules\contactus\frontend\models\Department;

class FrontController extends \yii\web\Controller
{
    public $layout = '//two-column';

    public function actionIndex()
    {
        $model = new Contactus;
        $departments = Department::find()->where(['language'=>\Yii::$app->language])->all();
        if ($departments) {
            $model->scenario = 'withDepartment';
        }
        if ($model->load(\Yii::$app->request->post())) {
            if ($model->save()) {
                $model->sendToDepartment();
                \Yii::$app->session->addFlash(
                    'success',
                    Module::t('Message sent successfully.')
                );
                return $this->refresh();
            } else {
                \Yii::$app->session->addFlash(
                    'danger',
                    Module::t('Unfortunately there\'s been a problem. please try again.')
                );
            }
        }
        return $this->render('index', [
            'model' => $model,
            'departments' => $departments
        ]);
    }
}
