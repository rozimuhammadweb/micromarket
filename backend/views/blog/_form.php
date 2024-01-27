<?php

use gofuroov\multilingual\widgets\ActiveForm;
use kartik\file\FileInput;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Blog $model */

?>
<div class="card card-primary card-outline ">
    <div class="card-body">
        <div class="blog-form">

            <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

            <div class="row">
                <div class="col-md-12">
                    <?= $form->languageSwitcher($model) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'category_id')->widget(\kartik\select2\Select2::class, [
                        'data' => ArrayHelper::map(\common\models\CategoryBlog::getCategoriesBlog(), 'id', 'title'),
                        'options' => ['placeholder' => 'Kategoriyani tanlang...'],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ]) ?>
                </div>
                <div class="col-12">
                    <?= $form->field($model, 'title')->textInput() ?>
                </div>
                <div class="col-12">
                    <?= $form->field($model, 'short_description')->textInput() ?>
                </div>
                <div class="col-12">
                    <?= $form->field($model, 'tags')->widget(\kartik\select2\Select2::class, [
                        'data' => \yii\helpers\ArrayHelper::map(\common\models\Tags::find()->all(), 'id', 'title'),
                        'options' => ['placeholder' => 'Select tags...', 'multiple' => true],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ]) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
                        'editorOptions' => [
                            'preset' => '4', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                            'inline' => false, //по умолчанию false
                        ],
                    ]); ?>
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
