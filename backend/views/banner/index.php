<?php

use common\models\Banner;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var common\models\search\BannerSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Banners';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-primary card-outline ">
    <div class="card-body">
        <div class="banner-index">
            <p>
                <?= Html::a('<i class="fa fa-plus"></i>', ['create'], ['class' => 'btn btn-primary']) ?>
            </p>

            <?php Pjax::begin(); ?>
            <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'name',
                    'title',
                    [
                        'attribute' => 'status',
                        'value' => function ($model) {
                            return $model->status == Banner::STATUS_ACTIVE ? 'Active' : 'In Active';
                        },
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{toggle-status}',
                        'buttons' => [
                            'toggle-status' => function ($url, $model) {
                                $title = $model->status == Banner::STATUS_ACTIVE ? 'Deactivate' : 'Activate';
                                $icon = $model->status == Banner::STATUS_ACTIVE ? 'toggle-on' : 'toggle-off';
                                $color = $model->status == Banner::STATUS_ACTIVE ? 'primary' : 'danger';

                                return \yii\helpers\Html::a(
                                    '<span class="fas fa-' . $icon . ' text-' . $color . '"></span>',
                                    ['toggle-status', 'id' => $model->id],
                                    [
                                        'title' => $title,
                                        'data' => [
                                            'method' => 'post',
                                        ],
                                    ]
                                );
                            },
                        ],
                    ],
                    [
                        'attribute' => 'imageFile',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return Html::img($model->getUploadUrl('imageFile'), ['class' => 'img-thumbnail', 'style' => 'width:100px']);
                        },
                    ],
                    [
                        'class' => ActionColumn::className(),
                        'urlCreator' => function ($action, Banner $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>

            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
