<?php

namespace modules\contactus\frontend;

class Module extends \yii\base\Module
{
    public $urlRules;
    public $controllerNamespace = 'modules\contactus\frontend\controllers';

    public function init()
    {
        parent::init();
        \Yii::configure($this, require(__DIR__ . '/config.php'));
    }
}
