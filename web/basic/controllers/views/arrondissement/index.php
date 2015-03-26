<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArrondissementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Arrondissements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arrondissement-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Arrondissement', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'arr_code',
            'arr_name',
            'departement_dep_no',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
