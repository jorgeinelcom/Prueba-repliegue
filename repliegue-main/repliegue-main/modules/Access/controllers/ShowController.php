<?php

namespace app\modules\Access\controllers;
use Yii;
use yii\web\Controller;

use app\modules\Access\models\AccessControlSearch;

class ShowController extends Controller
{

    public function beforeAction(){
      if(Yii::$app->user->isGuest){
        return $this->redirect(['/site/salir']);
      }else{
        return true;
      }
    }



    public function actionIndex()
    {

        $searchModel = new  AccessControlSearch();
        $dataProvider = $searchModel->search(yii::$app->request->queryParams);

        return $this->render('index',[
          'dataProvider' => $dataProvider,
          'searchModel' => $searchModel
        ]);
    }



}
