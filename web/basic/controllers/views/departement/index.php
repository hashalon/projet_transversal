<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DepartementSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departements';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departement-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Departement', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'dep_no',
            'dep_name',
            'region_reg_no',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
