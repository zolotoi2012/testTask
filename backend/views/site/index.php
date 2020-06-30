<?php

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\AclCategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\grid\GridView;

$this->title = 'Test Task';
?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'internal_id',
        'last_modify',
        'regulator',
    ],
]); ?>
