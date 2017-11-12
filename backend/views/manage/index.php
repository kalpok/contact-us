<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use themes\admin360\widgets\Panel;
use themes\admin360\widgets\ActionButtons;

$this->title = 'تماس با ما';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contactus-manage-index">
    <?= ActionButtons::widget([
        'buttons' => [
            'department' => [
                'label' => 'مدیریت دپارتمان‌ها',
                'url' => ['department/index'],
                'icon' => 'tasks',
                'type' => 'info',
            ],
        ],
    ]); ?>
    <?php Panel::begin([
        'title' => Html::encode($this->title)
    ]) ?>

        <?php Pjax::begin([
            'id' => 'contactus-gridviewpjax',
            'enablePushState' => false,
        ]); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'core\grid\IDColumn'],
                    ['class' => 'core\grid\LanguageColumn'],
                    'name',
                    'email',
                    'phone',
                    'subject',
                    [
                        'attribute' => 'department.title',
                        'label' => 'دپارتمان‌'
                    ],
                    'createdAt:datetime',
                    ['class' => 'yii\grid\ActionColumn',
                    'template' => '{view} {delete}'],
                ],
            ]); ?>
        <?php Pjax::end(); ?>
    <?php Panel::end() ?>

</div>
