<?php
return [
    'title' => 'ماژول تماس با ما',
    'menu' => [
        'label' => 'تماس با ما',
        'icon' => 'envelope-o',
        'items' => [
            [
                'label' => 'لیست پیام‌ها',
                'url' => ['/contactus/manage/index'],
                'visible' => Yii::$app->user->canAccessAny(['contactus.manage'])
            ],
            [
                'label' => 'لیست دپارتمان‌ها',
                'url' => ['/contactus/department/index'],
                'visible' => Yii::$app->user->canAccessAny(['contactus.manage'])
            ],
        ]
    ]
];
