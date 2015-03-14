<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;

class MapController extends Controller {
    
    public function actions(){
        return $this->render('site/map');
    }
    
}