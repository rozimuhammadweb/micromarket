<?php

use common\models\Category;
use gofuroov\multilingual\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var gofuroov\multilingual\ActiveForm $form */
?>
<div class="card card-primary card-outline ">
    <div class="card-body">
        <div class="product-form">

            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-md-12">
                    <?= $form->languageSwitcher($model) ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'category_id')->widget(\kartik\select2\Select2::class, [
                        'data' => ArrayHelper::map(Category::find()->all(), 'id', 'title'),
                        'options' => ['placeholder' => 'Kategoriyani tanlang...'],
                        'pluginOptions' => [
                            'allowClear' => true,
                        ],
                    ]) ?>
                </div>

                <div class="col-md-12">
                    <?= $form->field($model, 'title')->textInput() ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'short_description')->textInput() ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
                        'editorOptions' => [
                            'preset' => '4', //разработанны стандартные настройки basic, standard, full данную возможность не обязательно использовать
                            'inline' => false, //по умолчанию false
                        ],
                    ]); ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'shipping')->textInput() ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'price')->textInput() ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'discount_percent')->textInput() ?>
                </div>
                <div class="col-md-12">
                    <?= $form->field($model, 'availability')->textInput() ?>
                </div>
            </div>
            <div class="form-group d-flex justify-content-end">
                <?= Html::submitButton('Saqlash', ['class' => 'btn btn-primary  ml-2 px-5']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
