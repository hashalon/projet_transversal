<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\Map;

class MapController extends Controller {
    
    public function actionIndex(){
        
        $mapname = 'france_regions.svg';
        return $this->render( 'index' );
    }
    
}