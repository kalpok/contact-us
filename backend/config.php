<?php
return [
    'title' => 'ماژول تماس با ما',
    'menu' => [
        'label' => 'تماس با ما',
        'icon' => 'file',
        'items' => [
            [
                'label' => 'پیغام‌ها',
                'url' => ['/contactus/manage/index'],
                'visible' => Yii::$app->user->canAccessAny(['contactus.manage'])
            ],
        ]
    ]
];
