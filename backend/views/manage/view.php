<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use themes\admin360\widgets\Panel;
use themes\admin360\widgets\ActionButtons;

/* @var $this yii\web\View */
/* @var $model modules\post\backend\models\Category */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'پیام‌ها', 'url' => ['/contactus/manage/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contactus-view">
    <?= ActionButtons::widget([
        'modelID' => $model->id,
        'buttons' => [
            'delete' => ['label' => 'حذف'],
            'index' => ['label' => 'پیام‌ها'],
        ],
    ]); ?>
    <div class="row">
        <div class="col-md-5">
            <?php Panel::begin([
                'title' => 'اطلاعات پیام',
            ]) ?>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id:farsiNumber',
                        [
                            'attribute' => 'language',
                            'visible' => Yii::$app->i18n->isMultiLanguage(),
                            'format' => 'language'
                        ],
                        'name',
                        'email',
                        'phone',
                        'subject',
                        'departmentId',
                        'message',
                        'createdAt:date',
                        'updatedAt:date',
                    ],
                ]) ?>
            <?php Panel::end() ?>
        </div>
    </div>

</div>
