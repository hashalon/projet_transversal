<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CommuneSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Communes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="commune-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Commune', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'com_code',
            'com_name',
            'epci',
            'arrondissement_arr_code',
            'zone_demploi_zone_no',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
