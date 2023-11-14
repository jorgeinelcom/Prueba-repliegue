<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\CoreUsuario;
use app\models\PermisosUsuarios;
use app\modules\Access\controllers\InsertController;

class SiteController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post','get'],
                ],
            ],
        ];
    }



    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }


    public function actionIndex(){
        return $this->redirect(['/home']);
    }





    //login de usuarios
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->redirect(['/home']);
        }//si el usuario esta logeado redirecciona a home

        $session = Yii::$app->session;

        if ($session['rut'] != null) {
            $session->remove('rut');
            $session->remove('nombre');
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {

            $validarpass = CoreUsuario::find()->where(["username" => $model->username])->one();

             

            $session =  Yii::$app->session;
            $session['rut'] = $validarpass->rut_usuario;
            $session['nombre'] = $validarpass->nombre;
            $session->open();
 
            $this->actionSetPermision();
            InsertController::actionAdd(1); #Llama a la función y pasa como parámetro 1 (Login)

            if(Yii::$app->user->identity->cambio_pass != 1){
                return $this->redirect(['/passrecovery/change-pass']);
            }else{
              return $this->redirect(['/armarios/registro-bodega']);
            }

        }//si el usuario logra logearse es redireccionado a home

        $this->layout = 'loginLayout';
        $model->password = '';
        return $this->render('login', ['model' => $model,]);
    }



    //busca y establece en session los permisos de los que dispone el usuario
    public function actionSetPermision(){

        $permisos = PermisosUsuarios::find()->where(['rut_usuario' => Yii::$app->user->identity->rut_usuario])->all();
        $per = [];
        foreach ($permisos as $key => $p){
            array_push($per, $p['id_permiso']);
        }
        Yii::$app->session['permisos'] = $per;
    }



    //deslogea un uusario
    public function actionLogout()
    {
        InsertController::actionAdd(2); #Llama a la función y pasa como parámetro 2 (logout)
        Yii::$app->user->logout();
        return  $this->redirect(['login']);
    }






}
