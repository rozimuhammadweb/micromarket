<?php

use gofuroov\multilingual\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Banner $model */

?>
<div class="card card-primary card-outline ">
    <div class="card-body">
        <div class="banner-form">
            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
            <div class="row">
                <div class="col-md-12">
                    <?= $form->languageSwitcher($model) ?>
                </div>
                <div class="col-12">
                    <?= $form->field($model, 'name')->textInput() ?>
                </div>
                <div class="col-12">
                    <?= $form->field($model, 'title')->textInput() ?>
                </div>
                <div class="col-12">
                    <?= $form->field($model, 'subtitle')->textInput() ?>
                </div>
                <div class="col-12">
                    <?= $form->field($model, 'imageFile')->widget(FileInput::class, [
                        'options' => ['accept' => 'image/*'],
                        'pluginOptions' => [
                            'showPreview' => false,
                            'showRemove' => false,
                        ],
                    ]) ?>
                </div>
                <div class="col-md-6">
                    <?= $form->field($model, 'status')->widget(\kartik\switchinput\SwitchInput::class, []); ?>
                </div>
            </div>
            <div class="form-group d-flex justify-content-end mt-3">
                <?= Html::submitButton('Saqlash', ['class' => 'btn btn-primary  ml-2 px-5']) ?>
            </div>
            <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>