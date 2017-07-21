<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use modules\contactus\frontend\models\Department;

$this->title = 'تماس با ما';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contactus-front-index">
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-8">
            <?= Html::activeHiddenInput(
                $model,
                'language',
                ['value'=>Yii::$app->language]
            ) ?>
            <?=
                $form->field($model, 'name')
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
            ?>
            <?=
                $form->field($model, 'phone')
                    ->textInput(
                        [
                            'maxlength' => 255,
                            'class' => 'form-control input-large'
                        ]
                    )
            ?>
            <?=
                $form->field($model, 'subject')
                    ->textInput(
                        [
                            'maxlength' => 255,
                            'class' => 'form-control input-large'
                        ]
                    )
            ?>
            <?php if (Department::find()->exists()) : ?>
                <?= $form->field($model, 'departmentId')->dropDownList(
                    ArrayHelper::map(Department::find()->all(), 'id', 'title'),
                    ['prompt' => 'انتخاب کنید ...']
                ) ?>
            <?php endif ?>
            <?= $form->field($model, 'message')->textarea(['rows' => 6]) ?>

            <?=
                Html::submitButton(
                    'ارسال',
                    [
                        'class' => 'btn btn-lg btn-success'
                    ]
                )
            ?>
        </div>
    </div>
<?php ActiveForm::end(); ?>
</div>
