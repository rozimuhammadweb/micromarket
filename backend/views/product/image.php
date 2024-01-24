<?php

use common\models\Product;
use common\modules\galleryManager\GalleryManager;

/* @var $this yii\web\View */
/* @var $model Product */
?>

<?php
if ($model->isNewRecord) {
    echo 'Can not upload images for new record';
} else {
    echo GalleryManager::widget(
        [
            'model' => $model,
            'behaviorName' => 'galleryBehavior',
            'apiRoute' => 'product/galleryApi'
        ]
    );
}
?>