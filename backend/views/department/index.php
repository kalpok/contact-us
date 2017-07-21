<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use themes\admin360\widgets\Panel;
use themes\admin360\widgets\ActionButtons;

$this->title = 'دپارتمان‌ها';
$this->params['breadcrumbs'][] = ['label'=>'تماس با ما', 'url'=>['/contactus']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contactus-department-index">

    <?= ActionButtons::widget([
        'buttons' => [
            'create' => ['label' => 'دپارتمان جدید'],
        ],
    ]); ?>

    <?php Panel::begin([
        'title' => Html::encode($this->title)
    ]) ?>
        <?php Pjax::begin([
            'id' => 'contactus-department-gridviewpjax',
            'enablePushState' => false,
        ]); ?>
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'core\grid\IDColumn'],
                    ['class' => 'core\grid\LanguageColumn'],
                    'title',
                    'email',
                    'createdAt:datetime',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        <?php Pjax::end(); ?>
    <?php Panel::end() ?>

</div>
