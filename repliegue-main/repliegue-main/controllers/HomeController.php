<?php

namespace app\controllers;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;

class HomeController extends Controller
{




    public function beforeAction(){#Valida
        if(Yii::$app->user->isGuest){
            return $this->redirect(['site/logout'])->send();
        }else{
            return true;
        }
    }


    public function actionIndex(){
        // var_dump('aca pasa algo'); die();
        return $this->render('index');
    }



}