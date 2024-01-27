<?php

use gofuroov\multilingual\widgets\ActiveForm;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Tags $model */
?>

<div class="card card-primary card-outline">
    <div class="card-body">
        <div class="tags-form">
            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-md-12">
                    <?= $form->languageSwitcher($model) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'title')->textInput() ?>
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
