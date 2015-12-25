<?php
namespace modules\contactus\backend\controllers;

use kalpok\controllers\AdminController;
use yii\filters\AccessControl;
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
                            'actions' => ['index', 'delete', 'view'],
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
}
