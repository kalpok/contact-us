<?php

use yii\helpers\Html;
use themes\admin360\widgets\ActionButtons;

/* @var $this yii\web\View */
/* @var $model modules\post\backend\models\Category */

$this->title = 'افزودن دپارتمان';
$this->params['breadcrumbs'][] = ['label' => 'تماس با ما', 'url' => ['/contactus/manage/index']];
$this->params['breadcrumbs'][] = ['label' => 'دپارتمانها', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-category-create">
	<?= ActionButtons::widget([
        'buttons' => [
            'index' => ['label' => 'دپارتمانها'],
        ],
    ]); ?>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
