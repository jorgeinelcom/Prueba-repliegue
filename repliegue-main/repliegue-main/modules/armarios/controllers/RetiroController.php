<?php

namespace app\modules\armarios\controllers;

use Yii;
use app\modules\armarios\models\SaRetiro;
use app\modules\armarios\models\SaRetiroSearch;
use app\modules\armarios\models\SaRegistroBodega;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * RetiroController implements the CRUD actions for SaRetiro model.
 */
class RetiroController extends Controller
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
     * Lists all SaRetiro models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SaRetiroSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SaRetiro model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {   
        $model = $this->findModel($id);
        $registro = SaRegistroBodega::find()->where(["id_registro_bodega" => $model->id_registro_bodega])->one();

        return $this->render('view', [
            'model' => $model,
            'registro' => $registro
        ]);
    }

    /**
     * Creates a new SaRetiro model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($idRegistro)
    {
        $model = new SaRetiro();

        $session=Yii::$app->session;
        $rut = $session['rut'];

        if (!$rut) {
               return $this->redirect(['/site/login']);
        }

        $registro = SaRegistroBodega::find()->where(["id_registro_bodega" => $idRegistro])->one();


        if ($model->load(Yii::$app->request->post())) {

            $model->id_registro_bodega = $idRegistro;
            $fecha_entrega = date('Y-m-d', strtotime(Yii::$app->request->post()["fecha_entrega"]));
            $model->fecha_entrega = $fecha_entrega;

            $fecha_acta = date('Y-m-d', strtotime(Yii::$app->request->post()["fecha_acta"]));
            $model->fecha_acta = $fecha_acta;

            $model->id_estado = Yii::$app->request->post()["SaRegistroBodega"]["id_estado"];
            $registro->id_estado = Yii::$app->request->post()["SaRegistroBodega"]["id_estado"];

            $model->peso_neto_cable = $model->peso_total_telefonica - $registro->peso_pallet ;
            $model->diferencia = $model->peso_neto_cable - $registro->kilos_cu;

            $model->rut_usuario = $rut;

            $registro->save(false);
            $model->save(false);
 

            return $this->redirect(['view', 'id' => $model->id_retiro]);
        }

        return $this->render('create', [
            'model' => $model,
            'registro' => $registro
        ]);
    }

    /**
     * Updates an existing SaRetiro model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $idRegistro)
    {
        $model = $this->findModel($id);

        $session=Yii::$app->session;
        $rut = $session['rut'];

        if (!$rut) {
               return $this->redirect(['/site/login']);
        }

        $registro = SaRegistroBodega::find()->where(["id_registro_bodega" => $idRegistro])->one();


        if ($model->load(Yii::$app->request->post())) {


            
            $fecha_entrega = date('Y-m-d', strtotime(Yii::$app->request->post()["fecha_entrega"]));
            $model->fecha_entrega = $fecha_entrega;

            $fecha_acta = date('Y-m-d', strtotime(Yii::$app->request->post()["fecha_acta"]));
            $model->fecha_acta = $fecha_acta;

            $model->id_estado = Yii::$app->request->post()["SaRegistroBodega"]["id_estado"];
            $registro->id_estado = Yii::$app->request->post()["SaRegistroBodega"]["id_estado"];

            $model->peso_neto_cable = $model->peso_total_telefonica - $registro->peso_pallet ;
            $model->diferencia = $model->peso_neto_cable - $registro->kilos_cu;

            $model->rut_usuario = $rut;

            $registro->save(false);
            $model->save(false);

            return $this->redirect(['view', 'id' => $model->id_retiro]);
        }

        return $this->render('update', [
            'model' => $model,
            'registro' => $registro
        ]);
    }

    /**
     * Deletes an existing SaRetiro model.
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
     * Finds the SaRetiro model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SaRetiro the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SaRetiro::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
