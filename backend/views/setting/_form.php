<?php

use gofuroov\multilingual\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\widgets\MaskedInput;

/** @var yii\web\View $this */
/** @var common\models\Setting $model */
/** @var gofuroov\multilingual\widgets\ActiveForm $form */
?>
<div class="card card-primary card-outline ">
    <div class="card-body">
        <div class="setting-form">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            <div class="row">
                <div class="col-md-12">
                    <?= $form->languageSwitcher($model) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'address')->textInput() ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'shipping_order')->textInput() ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'working_time')->textInput() ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'map')->textInput(['placeholder' => 'https://']) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'number')->widget(MaskedInput::class, [
                        'mask' => '\+\9\9\8 99 999 99 99',
                        'options' => [
                            'minlength' => 17,
                            'autofocus' => true
                        ]
                    ]); ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                </div>
                <div class="col-12">
                    <?= $form->field($model, 'imageFile')->widget(FileInput::class, [
                        'options' => ['accept' => 'image/*'],
                        'pluginOptions' => [
                            'browseClass' => 'btn btn-primary',
                            'uploadClass' => 'btn btn-info',
                            'removeClass' => 'btn btn-danger',
                            'removeIcon' => '<i class="fas fa-trash"></i> '
                        ]
                    ])->label('Logo') ?>

                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'status')->widget(\kartik\switchinput\SwitchInput::class, []); ?>
                </div>
            </div>
            <div class="form-group d-flex justify-content-end">
                <?= Html::submitButton('Saqlash', ['class' => 'btn btn-primary  ml-2 px-5']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
