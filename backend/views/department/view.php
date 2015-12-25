<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use themes\admin360\widgets\Panel;
use themes\admin360\widgets\ActionButtons;

/* @var $this yii\web\View */
/* @var $model modules\post\backend\models\Category */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'پیغام‌ها', 'url' => ['/contactus/manage/index']];
$this->params['breadcrumbs'][] = ['label' => 'دپارتمان‌ها', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contactus-department-view">
    <?= ActionButtons::widget([
        'modelID' => $model->id,
        'buttons' => [
            'create' => ['label' => 'افزودن دپارتمان'],
            'update' => ['label' => 'ویرایش'],
            'delete' => ['label' => 'حذف'],
            'index' => ['label' => 'دپارتمان‌ها'],
        ],
    ]); ?>
    <div class="row">
        <div class="col-md-5">
            <?php Panel::begin([
                'title' => 'اطلاعات دپارتمان',
            ]) ?>
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'id:farsiNumber',
                        'title',
                        [
                            'attribute' => 'language',
                            'visible' => Yii::$app->i18n->isMultiLanguage(),
                            'format' => 'language'
                        ],
                        'createdAt:date',
                        'updatedAt:date',
                    ],
                ]) ?>
            <?php Panel::end() ?>
        </div>
    </div>

</div>
