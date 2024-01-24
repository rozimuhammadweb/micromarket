<?php

use common\models\Product;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var common\models\search\ProductSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="card card-primary card-outline ">
    <div class="card-body">
        <div class="product-index">
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
                    [
                        'attribute' => 'category_id',
                        'value' => function ($model) {
                            return $model->category->title;
                        },
                    ],
                    'price',
                    'discount_percent',
                    'availability',
                    [
                        'class' => ActionColumn::className(),
                        'template' => '{images} {view} {update} {delete} ',
                        'buttons' => [
                            'images' => function ($url, $model, $key) {
                                $icon = Html::tag('span', '', ['class' => 'fas fa-image']);

                                return Html::a($icon, ['product/image', 'id' => $model->id], [
                                    'title' => Yii::t('yii', 'Upload'),
                                ]);
                            },
                        ],
                        'urlCreator' => function ($action, $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'id' => $model->id]);
                        }
                    ],
                ],
            ]); ?>

            <?php Pjax::end(); ?>
        </div>
    </div>
</div>
