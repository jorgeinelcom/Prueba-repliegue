<?php

namespace app\modules\armarios\controllers;

use Yii;
use app\modules\armarios\models\SaRegistroBodega;
use app\modules\armarios\models\SaRegistroBodegaSearch;
use app\modules\armarios\models\SaPallet;
use app\modules\armarios\models\SaTipoCable;
use app\modules\armarios\models\SaTipoCableRegistro;
use app\modules\armarios\models\SaArmario;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RegistroBodegaController implements the CRUD actions for SaRegistroBodega model.
 */
class RegistroBodegaController extends Controller
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

    /**
     * Lists all SaRegistroBodega models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SaRegistroBodegaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SaRegistroBodega model.
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

     public function actionIngresoCables($id)
    {   
        $session=Yii::$app->session;
        $rut = $session['rut'];

        if (!$rut) {
               return $this->redirect(['/site/login']);
        }

        $model = $this->findModel($id);
        $tipoCables = SaTipoCable::find()->all();

        if (Yii::$app->request->post()) {

            $suma = 0;
            foreach ($tipoCables as $key => $tc) {
                if ($_POST["peso-".$tc->id_tipo_cable]  != "" && $_POST["peso-".$tc->id_tipo_cable]  != 0) {
                    $tipoRegistro = SaTipoCableRegistro::find()->where(["id_tipo_cable" => $tc->id_tipo_cable, "id_registro_bodega" => $id])->one();
                    if (!$tipoRegistro) {
                        $tipoRegistro = new SaTipoCableRegistro();
                    }
                    $tipoRegistro->rutUsuario = $rut;
                    $tipoRegistro->id_tipo_cable = $tc->id_tipo_cable;
                    $tipoRegistro->id_registro_bodega = $id;
                    $tipoRegistro->peso = $_POST["peso-".$tc->id_tipo_cable];
                    $tipoRegistro->save(false);

                    $suma = $suma + $tipoRegistro->peso;


                }
            }

            $model->kilos_cu = $suma;
            $model->save(false);

            return $this->redirect(['view', 'id' => $model->id_registro_bodega]);
        }
 

        return $this->render('ingreso-cables', [
            'model' => $model,
            'tipoCables' => $tipoCables,
            'id' => $id
        ]);
    }

    /**
     * Creates a new SaRegistroBodega model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $session=Yii::$app->session;
        $rut = $session['rut'];

        if (!$rut) {
               return $this->redirect(['/site/login']);
        }

        $model = new SaRegistroBodega();

        if ($model->load(Yii::$app->request->post())) {

            $pallet = $this->findPallet(Yii::$app->request->post()["SaRegistroBodega"]["id_pallet"]);
           
            if (!$pallet) {
               $pallet = new SaPallet();
               $pallet->nombre = Yii::$app->request->post()["SaRegistroBodega"]["id_pallet"];
               $pallet->rut_usuario = $rut;
               $pallet->id_oc = $model->id_oc;
               $pallet->save(false);
            }

            if (Yii::$app->request->post()["SaRegistroBodega"]["id_armario"] == "") {
                $armario = NULL;
            }else{
                $armario = $this->findArmario(Yii::$app->request->post()["SaRegistroBodega"]["id_armario"]);
           
                if (!$armario) {
                   $armario = new SaArmario();
                   $armario->descripcion = Yii::$app->request->post()["SaRegistroBodega"]["id_armario"];
                   $armario->id_oc = $model->id_oc;
                   $armario->rutUsuario = $rut;
                   $armario->save(false);
                }
            }
            

        


            $fechaRepliegue = date('Y-m-d', strtotime(Yii::$app->request->post()["fecha_repliegue"]));
            $model->id_pallet = $pallet->id_pallet;
            if ($armario == NULL) {
                $model->id_armario = 3;
            }else{  
                $model->id_armario = $armario->id_armario;
            }
            $model->fecha_repliegue = $fechaRepliegue;
            $model->rut_usuario = $rut;

          
            $model->save(false);

            return $this->redirect(['ingreso-cables', 'id' => $model->id_registro_bodega]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    protected function findPallet($id){
        $pallet = SaPallet::find()->where(["id_pallet" => $id])->one();

        if ($pallet) {
            return $pallet;
        }else{
            return false;
        }
    }

    protected function findArmario($id){
        $pallet = SaArmario::find()->where(["id_armario" => $id])->one();

        if ($pallet) {
            return $pallet;
        }else{
            return false;
        }
    }

    /**
     * Updates an existing SaRegistroBodega model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $session=Yii::$app->session;
        $rut = $session['rut'];

        if (!$rut) {
               return $this->redirect(['/site/login']);
        }

        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $pallet = $this->findPallet(Yii::$app->request->post()["SaRegistroBodega"]["id_pallet"]);
           
            if (!$pallet) {
               $pallet = new SaPallet();
               $pallet->nombre = Yii::$app->request->post()["SaRegistroBodega"]["id_pallet"];
               $pallet->rut_usuario = $rut;
               $pallet->id_oc = $model->id_oc;
               $pallet->save(false);
            }

            if (Yii::$app->request->post()["SaRegistroBodega"]["id_armario"] == "") {
                $armario = NULL;
            }else{
                $armario = $this->findArmario(Yii::$app->request->post()["SaRegistroBodega"]["id_armario"]);
           
                if (!$armario) {
                   $armario = new SaArmario();
                   $armario->descripcion = Yii::$app->request->post()["SaRegistroBodega"]["id_armario"];
                   $armario->id_oc = $model->id_oc;
                   $armario->rutUsuario = $rut;
                   $armario->save(false);
                }
            }
            

        


            $fechaRepliegue = date('Y-m-d', strtotime(Yii::$app->request->post()["fecha_repliegue"]));
            $model->id_pallet = $pallet->id_pallet;
            if ($armario == NULL) {
                $model->id_armario = 3;
            }else{  
                $model->id_armario = $armario->id_armario;
            }
            $model->fecha_repliegue = $fechaRepliegue;
            $model->rut_usuario = $rut;
            $model->save(false);

             return $this->redirect(['ingreso-cables', 'id' => $model->id_registro_bodega]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SaRegistroBodega model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SaRegistroBodega model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SaRegistroBodega the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SaRegistroBodega::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
