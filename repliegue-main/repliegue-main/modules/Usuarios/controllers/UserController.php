<?php

namespace app\modules\Usuarios\controllers;

use Yii;
use app\modules\Usuarios\models\CoreUsuario;
use app\modules\Usuarios\models\CoreUsuariosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for CoreUsuario model.
 */
class UserController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    public function beforeAction(){#Valida

        if(Yii::$app->user->isGuest){
          //valida si el usuario esta logeado
            return $this->redirect(['site/logout'])->send();

        }
        return true;
    }



    public function actionIndex()
    {
        $searchModel = new CoreUsuariosSearch();
        $searchModel->id_estado = 1;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);


        $searchModelInactivos = new CoreUsuariosSearch();
        $searchModelInactivos->id_estado = 2;
        $dataProviderInactivos = $searchModelInactivos->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'searchModelInactivos' => $searchModelInactivos,
            'dataProviderInactivos' => $dataProviderInactivos,
        ]);
    }

    /**
     * Displays a single CoreUsuario model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }


    //Creacion de nuevos usuarios
    public function actionCreate()
    {
        $model = new CoreUsuario();

        if ($model->load(Yii::$app->request->post()) ) {

            if($model->validate()){ //valida según las reglas del formulario
                $model->password = $this->actionEncode($model->password);
                $model->id_estado = 1;
                $model->save(false);
                return $this->redirect(['view', 'id' => $model->rut_usuario]);
            }

            
        }
        
        $model->username = '';
        return $this->render('create', [
            'model' => $model,
        ]);
    }




    //encripta un password
    public function actionEncode($pass){
        $hash = password_hash($pass, PASSWORD_DEFAULT);
        return $hash;
    }



    //Actualza un usuario existente
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->scenario = 'update';
        if ($model->load(Yii::$app->request->post()) ) {

            if($model->validate()){ //valida según las reglas del formulario
                if($model->password){
                    $model->password = $this->actionEncode($model->password);
                }else{
                    $model->password =$model->oldAttributes['password'];
                }
    
                $model->save(false);
                return $this->redirect(['view', 'id' => $model->rut_usuario]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CoreUsuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CoreUsuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CoreUsuario::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
