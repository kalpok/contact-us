<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use themes\admin360\widgets\Panel;
use themes\admin360\widgets\ActionButtons;

$this->title = 'تماس با ما | '. $model->subject;
$this->params['breadcrumbs'][] =
    ['label' => 'پیام‌ها', 'url' => ['/contactus/manage/index']];
$this->params['breadcrumbs'][] = $model->subject;
?>
<div class="contactus-view">
    <?= ActionButtons::widget([
        'modelID' => $model->id,
        'buttons' => [
            'delete' => ['label' => 'حذف پیام'],
            'index' => ['label' => 'لیست پیام‌ها'],
        ],
    ]); ?>
    <div class="row">
        <div class="col-md-7">
            <?php Panel::begin([
                'title' => 'متن پیام',
            ]) ?>
                <div class="well">
                    <?= $model->message ?>
                </div>
            <?php Panel::end() ?>
        </div>
        <div class="col-md-5">
            <?php Panel::begin([
                'title' => 'جزئیات پیام',
            ]) ?>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        [
                            'attribute' => 'language',
                            'visible' => Yii::$app->i18n->isMultiLanguage(),
                            'format' => 'language'
                        ],
                        'name',
                        'email',
                        'phone',
                        'subject',
                        [
                            'attribute' => 'department.title',
                            'label' => 'دپارتمان'
                        ],
                        'createdAt:datetime',
                    ],
                ]) ?>
            <?php Panel::end() ?>
        </div>
    </div>

</div>
