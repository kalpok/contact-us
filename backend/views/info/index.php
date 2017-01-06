<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use themes\admin360\widgets\Panel;
use themes\admin360\widgets\Button;
use themes\admin360\widgets\editor\Editor;

$this->title = 'تماس با ما';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="contactinfo-create">
    <div class="contactinfo-form">
        <div class="row">
          <div class="col-md-8">
            <?php $form = ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data'],
            ]); ?>
                <?php Panel::begin([
                    'title' => 'اطلاعات فرم',
                    'options' => ['class' => 'box-solid box-primary']
                ]) ?>
                    <?= $form->errorSummary($model, [
                        'class'=>"text-danger"
                    ]); ?>
                    <?= $form->field($model, 'title')->textInput([
                        'maxlength' => 255,
                        'class' => 'form-control input-medium'
                    ]); ?>
                    <?= $form->field($model, 'motto')->textInput([
                        'maxlength' => 255,
                        'class' => 'form-control input-medium'
                    ]); ?>
                    <?= $form->field($model, 'address')->textarea([
                        'rows' => 6
                    ]); ?>
                    <?= $form->field($model, 'phone')->textInput([
                        'maxlength' => 255,
                        'class' => 'form-control input-medium',
                        'style'=>'direction:ltr'
                    ]); ?>
                    <?= $form->field($model, 'fax')->textInput([
                        'maxlength' => 255,
                        'class' => 'form-control input-medium',
                        'style'=>'direction:ltr'
                    ]); ?>
                    <?= $form->field($model, 'postalCode')->textInput([
                        'maxlength' => 255,
                        'class' => 'form-control input-medium',
                        'style'=>'direction:ltr'
                    ]); ?>
                    <?= $form->field($model, 'postBox')->textInput([
                        'maxlength' => 255,
                        'class' => 'form-control input-medium',
                        'style'=>'direction:ltr'
                    ]); ?>
                    <?= $form->field($model, 'email')->textInput([
                        'maxlength' => 255,
                        'class' => 'form-control input-medium',
                        'style'=>'direction:ltr'
                    ]); ?>
                    <?= $form->field($model, 'openHour')->textInput([
                        'maxlength' => 255,
                        'class' => 'form-control input-medium'
                    ]); ?>
                    <?= $form->field($model, 'description')->widget(Editor::className(), [
                        'preset' => 'simple'
                    ]);?>
                <?php Panel::end() ?>

                <div class="form-group">
                    <?= Html::submitButton('<i class="fa fa-save"></i> ذخیره', [
                        'class' => 'btn btn-lg btn-flat margin bg-green'])
                    ?>
                    <?= Button::widget(
                        [
                            'label' => 'انصراف',
                            'options' => ['class' => 'btn-lg btn-flat margin'],
                            'type' => 'warning',
                            'icon' => 'undo',
                            'url' => ['/site/index'],
                        ]
                    ) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
