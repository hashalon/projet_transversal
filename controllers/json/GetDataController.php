<?php

namespace app\controllers;

use Yii;
use app\models\Region;
use app\models\RegionSearch;
use app\models\Departement;
use app\models\DepartementSearch;
use app\models\Arrondissement;
use app\models\ArrondissementSearch;
use app\models\Commune;
use app\models\CommuneSearch;
//use app\models\;
//use app\models\;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


class GetDataController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionJson($map = 'Map', $detail = 'regions', $criteria, $year = null){
        $object = $this->findModelByName($map);
        if( checkLevelDetail($map, $detail) ){
            
        }
    }
    
    /**
     * Finds the Region model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Model the Region, Departement, Arrondissement, Commune corresponding to the given id
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Region::findOne($id)) !== null) {
            return $model;
        } elseif (($model = Departement::findOne($id)) !== null) {
            return $model;
        } elseif (($model = Arrondissement::findOne($id)) !== null) {
            return $model;
        } elseif (($model = Commune::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested object does not exist.');
        }
    }
    
    protected function findModelByName($name){
        if (($model = Region::findByAttributes( array('reg_name'=>$name) )) !== null) {
            return $model;
        } elseif (($model = Departement::findByAttributes( array('dep_name'=>$name) )) !== null) {
            return $model;
        } elseif (($model = Arrondissement::findByAttributes( array('arr_name'=>$name) )) !== null) {
            return $model;
        } elseif (($model = Commune::findByAttributes( array('com_name'=>$name) )) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested object does not exist.');
        }
    }
    
    private function checkLevelDetail( $map, $detail ){
        // we search for the table where the map is stored
        $map_level = detailValue( get_class($map) );
        $detail_level = detailValue($detail);
        if( $map_level != -1 && $detail_level != -1 ){
            if( $map_level > $detail_level ){
                return true;
            }
        }
        return false;
    }
    
    private function detailValue($detail){
        $value = -1;
        if( !$detail ){
            $value = 4; // if false, we return 4
        }else{
            switch( $detail ){
                case 'regions': $value = 3; break;
                case 'Region': $value = 3; break;
                case 'departements': $value = 2; break;
                case 'Departement': $value = 2; break;
                case 'arrondissements': $value = 1; break;
                case 'Arrondissement': $value = 1; break;
                case 'communes': $value = 0; break;
                case 'Commune': $value = 0; break;
            }
        }
        return $value;
    }
}