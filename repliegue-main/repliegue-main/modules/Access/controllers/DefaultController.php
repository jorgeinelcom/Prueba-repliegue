<?php

namespace app\modules\Access\controllers;

use Yii;
use yii\web\Controller;

/**
 * Default controller for the `Access` module
 */
class DefaultController extends Controller
{

  public function beforeAction(){#Valida

      if(Yii::$app->user->isGuest){
        //valida si el usuario esta logeado
          return $this->redirect(['site/logout'])->send();
      }
      return true;
  }

    public function actionIndex()
    {
        return $this->redirect(['show/index']);
    }
}
