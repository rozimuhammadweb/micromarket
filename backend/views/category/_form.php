<?php

use gofuroov\multilingual\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Category $model */
/** @var yii\bootstrap4\ActiveForm $form */
?>
<div class="card card-primary card-outline">
    <div class="card-body">
        <div class="category-form">

            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            <div class="row">
                <div class="col-md-12">
                    <?= $form->languageSwitcher($model) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'title')->textInput() ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'sort_order')->textInput() ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'is_popular')->widget(\kartik\switchinput\SwitchInput::class, []); ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'status')->widget(\kartik\switchinput\SwitchInput::class, []); ?>
                </div>
                <div class="col-12">
                    <?= $form->field($model, 'imageFile')->widget(FileInput::class, [
                        'options' => ['accept' => 'image/*'],
                    ]) ?>

                </div>
            </div>
            <div class="form-group d-flex justify-content-end">
                <?= Html::submitButton('Saqlash', ['class' => 'btn btn-primary  ml-2 px-5']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
