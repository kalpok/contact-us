<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use themes\admin360\widgets\Panel;
use themes\admin360\widgets\ActionButtons;
/* @var $this yii\web\View */
/* @var $searchModel modules\contactus\backend\models\DepartmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

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
                    ['class' => 'yii\grid\SerialColumn'],
                    ['class' => 'kalpok\grid\IDColumn'],
                    ['class' => 'kalpok\grid\LanguageColumn'],
                    'title',
                    [
                        'attribute' => 'createdAt',
                        'format' =>'date',
                        'filter' =>false
                    ],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        <?php Pjax::end(); ?>
    <?php Panel::end() ?>

</div>
