<?php

namespace modules\contactus\backend\controllers;

use yii\filters\AccessControl;
use core\controllers\AdminController;
use modules\contactus\backend\models\Department;
use modules\contactus\backend\models\DepartmentSearch;

/**
 * DepartmentController implements the CRUD actions for Department model.
 */
class DepartmentController extends AdminController
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
                            'actions' => ['index', 'update', 'delete', 'create', 'view'],
                            'roles' => ['contacus.manage'],
                        ],
                    ],
                ],
            ]
        );
    }

    public function init()
    {
        $this->modelClass = Department::className();
        $this->searchClass = DepartmentSearch::className();
        parent::init();
    }
}
