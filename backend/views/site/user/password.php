<?php

use yii\bootstrap4\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Parol';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-12 col-sm-6 col-md-4">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle" src="/admin/dist/img/AdminLTELogo.png">
                    <h3 class="profile-username text-center"><?= $model->first_name ?></h3>
                    <p class="text-muted text-center"> Administrator</p>
                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item d-flex justify-content-between">
                            <b>ID</b> <a class="float-right"><?= $model->id ?></a>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <b>Yaratilgan</b> <a
                                    class="float-right"><?= Yii::$app->formatter->asDate($model->created_at, 'php:M d, Y'); ?></a>

                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <b>Yangilangan</b> <a
                                    class="float-right"><?= Yii::$app->formatter->asDate($model->updated_at, 'php:M d, Y'); ?></a>
                        </li>
                    </ul>
                    <a class="btn btn-primary btn-block" href="#"> <i class="fa fa-check"> </i></a>

                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="row">
            <div class="col">
                <div class="card card-tabs card-primary card-outline">
                    <div class="card-header p-0">
                        <div class="row d-flex justify-content-center">
                            <div class="col-auto">
                                <ul id="user-menu" class="nav nav-pills ml-auto p-2">
                                    <li class="nav-item">
                                        <a href="<?= Url::to(['/site/user']) ?>" class="nav-link "><i
                                                    class="fa fa-gears"></i>Umumiy</a>
                                    </li>
                                    <li class="nav-item">
                                    </li>
                                    <li class="nav-item"><a href="<?= Url::to(['/site/password']) ?>"
                                                            class="nav-link active"><i class="fa fa-lock"></i> Parol</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card card-primary card-outline">

                    <div class="card-body ">
                        <?php $form = ActiveForm::begin(['id' => 'password-update-form']); ?>
                        <div class="row">
                            <div class="col-md-12">
                                <?= $form->field($model, 'currentPassword')->passwordInput() ?>
                            </div>
                            <div class="col-md-12">
                                <?= $form->field($model, 'newPassword')->passwordInput() ?>
                            </div>
                            <div class="col-md-12">
                                <?= $form->field($model, 'confirmPassword')->passwordInput() ?>
                            </div>
                        </div>
                        <div class="form-group d-flex justify-content-end">
                            <?= Html::submitButton('Saqlash', ['class' => 'btn btn-primary']) ?>
                        </div>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>


    </div>

</div>