<?php

namespace app\modules\Access\controllers;
use Yii;
use yii\web\Controller;


use app\modules\Access\models\AccessControl;
/*
  InsertController
    Este controlador permite la creacion de registros que indican el acceso de los usuarios a la plataforma
*/

class InsertController extends Controller
{

  public function beforeAction(){#Valida

      if(Yii::$app->user->isGuest){
        //valida si el usuario esta logeado
          return $this->redirect(['site/logout'])->send();

      }
      return true;
  }




    public static function actionAdd($interaction){
      #Crea un registro para cada interaccion en la que es convocado. Toma la data de usuarios desde la sesion
      $user = Yii::$app->user->identity;
      if($user){
        $access = new  AccessControl();
        $access->rut_usuario = $user->rut_usuario;
        $access->username = $user->username;
        $access->id_interaction = $interaction;
        $access->save(false);
      }

    }





}
