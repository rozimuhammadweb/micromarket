<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Social $model */
?>
<div class="card card-primary card-outline ">
    <div class="card-body">
        <div class="social-form">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            <div class="row">
                <div class="col-12">
                    <?= $form->field($model, 'name')->textInput(['placeholder' => 'https://']) ?>
                </div>
                <div class="col-12">
                    <?= $form->field($model, 'icon')->widget(\kartik\file\FileInput::class, [
                        'options' => ['accept' => 'image/*'],
                        'pluginOptions' => [
                            'showPreview' => false,
                            'showRemove' => false,
                            'browseLabel' =>  'Select Icon'
                        ],
                    ])->label('Social icon *') ?>
                </div>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'status')->widget(\kartik\switchinput\SwitchInput::class, []); ?>
            </div>
            <div class="form-group d-flex justify-content-end mt-3">
                <?= Html::submitButton('Saqlash', ['class' => 'btn btn-primary  ml-2 px-5']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
