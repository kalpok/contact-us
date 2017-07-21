<?php
namespace modules\contactus\backend\controllers;

use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use core\controllers\AdminController;
use modules\contactus\backend\models\Contactus;
use modules\contactus\backend\models\ContactusSearch;

class ManageController extends AdminController
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['contacus.manage'],
                        ],
                    ],
                ],
            ]
        );
    }

    public function init()
    {
        $this->modelClass = Contactus::className();
        $this->searchClass = ContactusSearch::className();
        parent::init();
    }

    public function actionCreate()
    {
        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionUpdate($id)
    {
        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
