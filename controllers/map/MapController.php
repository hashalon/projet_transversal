<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Map;

class MapController extends Controller {
    
    // available arguments are: region, departement, arrondissement
    public function actionIndex($map = 'Map', $detail = 'regions' ){
        
        return $this->render( 'index', [
            'map' => $map,
            'detail' => $detail,
        ]);
    }
    
}