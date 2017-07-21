<?php
namespace modules\contactus\frontend;

use Yii;

class Module extends \yii\base\Module
{
    public $urlRules;
    public $controllerNamespace = 'modules\contactus\frontend\controllers';

    public function init()
    {
        parent::init();
        self::registerTranslations();
        Yii::configure($this, require(__DIR__ . '/config.php'));
    }

    private static function registerTranslations()
    {
        Yii::$app->i18n->translations['modules.contactus'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'basePath' => '@modules/contactus/common/messages',
            'fileMap' => [
                'modules.contactus' => 'module.php',
            ],
        ];
    }

    public static function t($message, $params = [], $language = null)
    {
        return Yii::t('modules.contactus', $message, $params, $language);
    }
}
