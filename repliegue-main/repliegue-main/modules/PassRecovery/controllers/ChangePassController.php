<?php

namespace app\modules\PassRecovery\controllers;

use Yii;
use yii\web\Controller;

use app\modules\PassRecovery\models\CoreUsuario;

/**
 * Default controller for the `passrecovery` module
 */
class ChangePassController extends Controller
{


public function actionError($id){//retorna uan vista con el error
    return $this->render('error',['error' => $id]);
}



    /*actionIndex()
      Esta funcion maneja la logica del primer ingreso exigiendo cambiar la contraseña
    */
    public function actionIndex()
    {
      $this->layout = '/loginLayout';
      $usuario = $this->actionFindUser(Yii::$app->user->identity->rut_usuario);
      $usuario->password = '';

        if(Yii::$app->request->post()){

          $usuario->password = $this->actionEncode(Yii::$app->request->post()["CoreUsuario"]["password"]);
          $usuario->cambio_pass = 1;
          $usuario->save(false);
          Yii::$app->session->setFlash('success', 'Contraseña cambiada con exito');
          return $this->redirect(['/site/index']);
        }


      return $this->render('index', ['usuario' => $usuario]);
    }







/*actionRequestChangePass
  Esta funcion realiza una solicitud para cmabio de contraseña, valida que el usuario exista y que su email sea valido
  posterior a esto crea un hash y lo envia por correo al usuario para restablecer su contraseña
*/
public function actionRequestChangePass($email){
  date_default_timezone_set("America/Santiago");

  $usuario = $this->actionFindUserByEmail($email);


  if($usuario){


      $date =  new \DateTime('now');
      $caracteres = '0123456789abcdefghijklmnopqrstuvwxyz';
      $hash = substr(str_shuffle($caracteres),0,25)."_".$date->format('Y-m-d H:i:s');
      $usuario->hash_cambio = $hash;
      $usuario->save(false);

      $this->actionSendMail($usuario, $hash);
      return true;
    }else{
      return false;
    }
  }



  public function actionChangePass($hash, $rut){
  $this->layout = '/loginLayout';
    date_default_timezone_set("America/Santiago");
    $usuario = $this->actionFindUser($rut);

    if($usuario->hash_cambio == $hash){

      $fechaHash =  new \DateTime(explode('_', $hash)[1]);
      $fechaActual = new \DateTime('now');
      $diff = $fechaHash->diff($fechaActual);


      if($diff->y > 0 || $diff->m > 0 || $diff->d > 0 || $diff->h > 0 || $diff->i > 30){

          return $this->render('error',['error' => 1]);
        }else{
          $usuario->password = '';
          return $this->render('recuperarpass', ['usuario' => $usuario]);
      }

    }else{
      return $this->render('error',['error' => 2]);
    }
     die();

  }




public function actionSaveNewPass(){


  if(Yii::$app->request->post()){

    $request = Yii::$app->request->post()["CoreUsuario"];
      $usuario = $this->actionFindUser($request["rut_usuario"]);
        $usuario->password = $this->actionEncode($request["password"]);
        $usuario->hash_cambio = '';
        $usuario->save(false);

        Yii::$app->session->setFlash('success', 'Contraseña cambiada con exito');
    return $this->redirect(['/site/login']);
  }
}


//encripta un password
public function actionEncode($pass){
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    return $hash;
}


/*
  funcion encargada de enviar un correo con hash para acceder al modulo de cambio de contraseña
*/
public function actionSendMail($usuario, $hash){

  yii::$app->mailer->compose('@app/modules/PassRecovery/views/mails/changepassrequest', ['usuario' => $usuario, 'hash' => $hash] )
  ->setFrom(['soporte.informatica@inelcomchile.cl'])
  ->setTo([$usuario->correo])
  ->setSubject('Cambio de contraseña')
  ->send();

}

/* actionFindUserByEmail()
  Busca y retorna un usuario usando el email
*/
public function actionFindUserByEmail($email){
  return CoreUsuario::findOne(['correo' => $email]);
}



    // esta funcion busca y retorna un usuario
    public function actionFindUser($rutUsuario){
        return CoreUsuario::find()->where(["rut_usuario" => $rutUsuario])->one();
    }


}
