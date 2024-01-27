<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Tags $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tags', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="card card-primary card-outline ">
    <div class="card-body">
        <div class="tags-view">
            <p>
                <?= Html::a('Tahrirlash', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('O\'chirish', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Haqiqatan ham bu ma\'lumotni oʻchirib tashlamoqchimisiz?',
                        'method' => 'post',
                    ],
                ]) ?>
            </p>

            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'id',
                    'title',
                    [
                        'attribute' => 'status',
                        'value' => function ($model) {
                            return $model->status == 1 ? 'Active' : 'In Active';
                        },
                    ],
                ],
            ]) ?>
        </div>
    </div>
</div>
