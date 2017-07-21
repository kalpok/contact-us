<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use themes\admin360\widgets\Panel;
use themes\admin360\widgets\Button;
use extensions\i18n\widgets\LanguageSelect;

$backLink = $model->isNewRecord ? ['index'] : ['view', 'id' => $model->id];
?>

<div class="contactus-department-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-8">
            <?php Panel::begin([
                'title' => 'اطلاعات دپارتمان'
            ]) ?>
                <?=
                    $form->field($model, 'title')
                        ->textInput(
                            [
                                'maxlength' => 255,
                                'class' => 'form-control input-large'
                            ]
                        )
                ?>
                <?=
                    $form->field($model, 'email')
                        ->textInput(
                            [
                                'maxlength' => 255,
                                'class' => 'form-control input-large'
                            ]
                        )
                        ->hint('پیام های کاربران به این ایمیل هم ارسال می‌شود.');
                ?>
                <?php if (Yii::$app->i18n->isMultiLanguage()) : ?>

                        <?php if ($model->isNewRecord) : ?>
                            <?= $form->field($model, 'language')->widget(
                                LanguageSelect::className(),
                                ['options' => ['class' => 'form-control input-large']]
                            )->label('زبان'); ?>
                        <?php else : ?>
                            <?= $form->field($model, 'language')->textInput([
                                'class' => 'form-control input-large',
                                'disabled' => true,
                                'value' => Yii::$app->formatter->asLanguage($model->language)
                            ])->label('زبان') ?>
                        <?php endif ?>
                <?php endif ?>
            <?php Panel::end() ?>
        </div>
        <div class="col-md-4">
            <?php Panel::begin() ?>
                <?=
                    Html::submitButton(
                        '<i class="fa fa-save"></i> ذخیره',
                        [
                            'class' => 'btn btn-lg btn-success'
                        ]
                    )
                ?>
                <?= Button::widget([
                        'label' => 'انصراف',
                        'options' => ['class' => 'btn-lg'],
                        'type' => 'warning',
                        'icon' => 'undo',
                        'url' => $backLink,
                    ])
                ?>
            <?php Panel::end() ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
