<?php

namespace app\modules\apcentrales\controllers;

use Yii;
use app\modules\apcentrales\models\ApProyectos;
use app\modules\apcentrales\models\ProyectosSearch;
use app\modules\apcentrales\models\ApProyectosPersonas;
use app\modules\apcentrales\models\ApProyectosVehiculos;
use app\modules\apcentrales\models\ApChecklists;
use app\modules\apcentrales\models\ApChecklistsPreguntas;
use app\modules\apcentrales\models\ApChecklistsProyectos;
use app\modules\apcentrales\models\ApChecklistsRespuestas;
use app\modules\apcentrales\models\ApHistorialEstados;
use app\modules\apcentrales\models\ApArchivosChecklist;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProyectosController implements the CRUD actions for ApProyectos model.
 */
class ProyectosController extends Controller
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
     * Lists all ApProyectos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProyectosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ApProyectos model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $checklists = ApChecklistsProyectos::find()->where(["idproyectos" => $id, "id_checklists" => 1])->all();
        $avance = ApChecklistsProyectos::find()->where(["idproyectos" => $id, "id_checklists" => 2])->all();
        $cambiosEstado = ApHistorialEstados::find()->where(["idproyectos" => $id])->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'checklists' => $checklists,
            'avance' => $avance,
            'cambiosEstado' => $cambiosEstado
        ]);
    }

    /**
     * Creates a new ApProyectos model.
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

        $model = new ApProyectos();

        if ($model->load(Yii::$app->request->post())) {


            $model->rut_usuario = $rut;
            $model->fec_asignacion = date('Y-m-d',strtotime(Yii::$app->request->post()["fechaAsignacion"]));

            $model->save(false);
            return $this->redirect(['seleccion', 'id' => $model->idproyectos]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionSeleccion($id){
        $session=Yii::$app->session;
        $rut = $session['rut'];

        if (!$rut) {
               return $this->redirect(['/site/login']);
        }

        $model = $this->findModel($id);
        $personaProyecto = new ApProyectosPersonas();
        $vehiculosProyecto = new ApProyectosVehiculos();

        if (Yii::$app->request->post()) {

            $ppForm = Yii::$app->request->post()['ApProyectosPersonas'];
            $crearPersonas = $this->insertarPersona($ppForm,$model); 

            $pvForm = Yii::$app->request->post()['ApProyectosVehiculos'];
            $crearVehiculos = $this->insertarVehiculo($pvForm,$model); 


            $model->save(false);
            return $this->redirect(['view', 'id' => $model->idproyectos]);
        }

        return $this->render('seleccion', [
            'model' => $model,
            'personaProyecto' => $personaProyecto,
            'vehiculosProyecto' => $vehiculosProyecto
        ]);


    }

    public function actionAvanceRetiro($id){
        $session=Yii::$app->session;
        $rut = $session['rut'];

        if (!$rut) {
               return $this->redirect(['/site/login']);
        }

        $today = date('Y-m-d');

        $validaChecklist = $this->actionValidaChecklist($id, $today, 2);

        if ($validaChecklist) {

            return $this->redirect(['detalle-respuestas', 'id' => $id, 'idChecklist' => $validaChecklist["id_checklists_proyectos"], 'checklistid' =>2]);
        }

        $model = $this->findModel($id);
        $checklist = ApChecklists::find()->where(["id_checklists" => 2])->one();
        $preguntas = ApChecklistsPreguntas::find()->where(["id_checklists" => $checklist->id_checklists])->orderby(["orden" => SORT_ASC])->all();
        $check_diario = new ApChecklistsProyectos();

        if (Yii::$app->request->post()) {


            $check_diario->idproyectos =  $id;
            $check_diario->rut_usuario = $rut;
            $check_diario->id_checklists = $checklist->id_checklists;
            $check_diario->save(false);

            foreach($preguntas as $preg){
                $check_respuesta = new ApChecklistsRespuestas();
                $check_respuesta->id_checklists_preguntas = $preg->id_checklists_preguntas;
                $check_respuesta->id_checklists_proyectos = $check_diario->id_checklists_proyectos;
                $check_respuesta->rut_usuario = $rut;
                if (isset($_POST["respuesta-".$preg->id_checklists_preguntas])) {
                     $respuesta = $_POST["respuesta-".$preg->id_checklists_preguntas];
                     if ($preg->id_tipos_preguntas == 5) {
                        $check_respuesta->respuesta = $respuesta;
                     }
                     if ($preg->id_tipos_preguntas == 2) {
                        $check_respuesta->respuesta = $respuesta;
                     }
                }else{
                    $check_respuesta->respuesta = 0;
                }
                $check_respuesta->save(false);

                if ($preg->id_checklists_preguntas == 9) {
                    $model->kg_reales = $model->kg_reales + $check_respuesta->respuesta;
                }
                if ($preg->id_checklists_preguntas == 10) {
                    $model->mts_reales = $model->mts_reales + $check_respuesta->respuesta;
                }

                $model->save(false);
            }



            

            $model->save(false);
            return $this->redirect(['detalle-respuestas', 'id' => $model->idproyectos, 'idChecklist' => $check_diario->id_checklists_proyectos, 'checklistid' => 2]);
        }


        return $this->render('checklist-retiro', [
            'model' => $model,
            'checklist' => $checklist,
            'preguntas' => $preguntas,
            'check_diario' => $check_diario,
        ]);


    }

    public function actionUpdateChecklistAvance($id, $idChecklistProyecto){
        $session=Yii::$app->session;
        $rut = $session['rut'];

        if (!$rut) {
               return $this->redirect(['/site/login']);
        }

        $today = date('Y-m-d');

 

        $model = $this->findModel($id);
        $checklist = ApChecklists::find()->where(["id_checklists" => 2])->one();
        $preguntas = ApChecklistsPreguntas::find()->where(["id_checklists" => $checklist->id_checklists])->orderby(["orden" => SORT_ASC])->all();
        $check_diario = ApChecklistsProyectos::find()->where(["id_checklists_proyectos" => $idChecklistProyecto])->one();

        if (Yii::$app->request->post()) {


            foreach($preguntas as $preg){
                $check_respuesta = ApChecklistsRespuestas::find()->where(["id_checklists_preguntas" => $preg->id_checklists_preguntas, "id_checklists_proyectos" => $check_diario->id_checklists_proyectos])->one();;
                $check_respuesta->rut_usuario = $rut;
                if (isset($_POST["respuesta-".$preg->id_checklists_preguntas])) {
                     $respuesta = $_POST["respuesta-".$preg->id_checklists_preguntas];
                     if ($preg->id_tipos_preguntas == 5) {
                        $check_respuesta->respuesta = $respuesta;
                     }
                     if ($preg->id_tipos_preguntas == 2) {
                        $check_respuesta->respuesta = $respuesta;
                     }
                }else{
                    $check_respuesta->respuesta = 0;
                }
                $check_respuesta->save(false);

                if ($preg->id_checklists_preguntas == 9) {
                    $model->kg_reales = $model->kg_reales + $check_respuesta->respuesta;
                }
                if ($preg->id_checklists_preguntas == 10) {
                    $model->mts_reales = $model->mts_reales + $check_respuesta->respuesta;
                }

                $model->save(false);
            }



            

            $model->save(false);
            return $this->redirect(['detalle-respuestas', 'id' => $model->idproyectos, 'idChecklist' => $check_diario->id_checklists_proyectos, 'checklistid' => 2]);
        }


        return $this->render('checklist-retiro', [
            'model' => $model,
            'checklist' => $checklist,
            'preguntas' => $preguntas,
            'check_diario' => $check_diario,
        ]);


    }




    public function actionChecklist($id){
        $session=Yii::$app->session;
        $rut = $session['rut'];

        if (!$rut) {
               return $this->redirect(['/site/login']);
        }

        $today = date('Y-m-d');

        $validaChecklist = $this->actionValidaChecklist($id, $today, 1);

        if ($validaChecklist) {

            return $this->redirect(['detalle-respuestas', 'id' => $id, 'idChecklist' => $validaChecklist["id_checklists_proyectos"], 'checklistid' => 1]);
        }

        $model = $this->findModel($id);
        $checklist = ApChecklists::find()->where(["id_checklists" => 1])->one();
        $preguntas = ApChecklistsPreguntas::find()->where(["id_checklists" => $checklist->id_checklists])->orderby(["orden" => SORT_ASC])->all();
        $check_diario = new ApChecklistsProyectos();
        $archivos = new ApArchivosChecklist();
        $personasProyecto = ApProyectosPersonas::find()->where(["idproyectos" => $id])->all();
        $vehiculosProyecto = ApProyectosVehiculos::find()->where(["idproyectos" => $id])->all();

        if (Yii::$app->request->post()) {

            $archivos->imageFiles = UploadedFile::getInstances($archivos, 'imageFiles');

            $check_diario->idproyectos =  $id;
            $check_diario->rut_usuario = $rut;
            $check_diario->id_checklists = $checklist->id_checklists;
            $check_diario->save(false);

            foreach($preguntas as $preg){
                $check_respuesta = new ApChecklistsRespuestas();
                $check_respuesta->id_checklists_preguntas = $preg->id_checklists_preguntas;
                $check_respuesta->id_checklists_proyectos = $check_diario->id_checklists_proyectos;
                $check_respuesta->rut_usuario = $rut;
                if (isset($_POST["respuesta-".$preg->id_checklists_preguntas])) {
                     $respuesta = $_POST["respuesta-".$preg->id_checklists_preguntas];
                     if ($preg->id_tipos_preguntas == 2) {
                        $check_respuesta->respuesta = $respuesta;
                     }else{
                        $check_respuesta->respuesta = 1;
                     }
                }else{
                    $check_respuesta->respuesta = 0;
                }
                $check_respuesta->save(false);
            }




            foreach ($archivos->imageFiles as $key => $img) {
                $imagen = 'datachecklist/proyecto_'.$id.'_checklist_'.$check_diario->id_checklists_proyectos.'_'.str_replace([' ',':'],'_', date('Y-m-d H:i:s')).'_rand('.rand(100000, 999999).').'.$img->extension;
                $img->saveAs($imagen);
               
                $doc = new ApArchivosChecklist();
                $doc->url = $imagen;
                $doc->id_checklists_proyectos =  $check_diario->id_checklists_proyectos;
                $doc->save(false);
            }

            

            $model->save(false);
            return $this->redirect(['detalle-respuestas', 'id' => $model->idproyectos, 'idChecklist' => $check_diario->id_checklists_proyectos, 'checklistid' => 1]);
        }

        return $this->render('checklist-diario', [
            'model' => $model,
            'checklist' => $checklist,
            'preguntas' => $preguntas,
            'check_diario' => $check_diario,
            'archivos' => $archivos,
            'personasProyecto' => $personasProyecto,
            'vehiculosProyecto' => $vehiculosProyecto,
        ]);


    }

    public function actionUpdateChecklistDiario($id, $idChecklistDiario){
        $session=Yii::$app->session;
        $rut = $session['rut'];

        if (!$rut) {
               return $this->redirect(['/site/login']);
        }

        $today = date('Y-m-d');

        $model = $this->findModel($id);
        $checklist = ApChecklists::find()->where(["id_checklists" => 1])->one();
        $preguntas = ApChecklistsPreguntas::find()->where(["id_checklists" => $checklist->id_checklists])->orderby(["orden" => SORT_ASC])->all();
        $check_diario = ApChecklistsProyectos::find()->where(["id_checklists_proyectos" => $idChecklistDiario])->one();
     
        $archivos = ApArchivosChecklist::find()->where(["id_checklists_proyectos" => $idChecklistDiario])->one();
        $personasProyecto = ApProyectosPersonas::find()->where(["idproyectos" => $id])->all();
        $vehiculosProyecto = ApProyectosVehiculos::find()->where(["idproyectos" => $id])->all();

        if (Yii::$app->request->post()) {



            $archivos->imageFiles = UploadedFile::getInstances($archivos, 'imageFiles');

            $check_diario->idproyectos =  $id;
            $check_diario->rut_usuario = $rut;
            $check_diario->id_checklists = $checklist->id_checklists;
            $check_diario->save(false);

            foreach($preguntas as $preg){
                $check_respuesta = ApChecklistsRespuestas::find()->where(["id_checklists_preguntas" => $preg->id_checklists_preguntas, "id_checklists_proyectos" => $check_diario->id_checklists_proyectos ])->one();
                $check_respuesta->rut_usuario = $rut;
                if (isset($_POST["respuesta-".$preg->id_checklists_preguntas])) {
                     $respuesta = $_POST["respuesta-".$preg->id_checklists_preguntas];
                     if ($preg->id_tipos_preguntas == 2) {
                        $check_respuesta->respuesta = $respuesta;
                     }else{
                        $check_respuesta->respuesta = 1;
                     }
                }else{
                    $check_respuesta->respuesta = 0;
                }
                $check_respuesta->save(false);
            }




            foreach ($archivos->imageFiles as $key => $img) {
                $imagen = 'datachecklist/proyecto_'.$id.'_checklist_'.$check_diario->id_checklists_proyectos.'_'.str_replace([' ',':'],'_', date('Y-m-d H:i:s')).'_rand('.rand(100000, 999999).').'.$img->extension;
                $img->saveAs($imagen);
               
                $doc = new ApArchivosChecklist();
                $doc->url = $imagen;
                $doc->id_checklists_proyectos =  $check_diario->id_checklists_proyectos;
                $doc->save(false);
            }

            

            $model->save(false);
            return $this->redirect(['detalle-respuestas', 'id' => $model->idproyectos, 'idChecklist' => $check_diario->id_checklists_proyectos, 'checklistid' => 1]);
        }

        return $this->render('checklist-diario', [
            'model' => $model,
            'checklist' => $checklist,
            'preguntas' => $preguntas,
            'check_diario' => $check_diario,
            'archivos' => $archivos,
            'personasProyecto' => $personasProyecto,
            'vehiculosProyecto' => $vehiculosProyecto,
        ]);


    }

    public function actionDetalleRespuestas($id, $idChecklist, $checklistid){
        $model = $this->findModel($id);
        $checklist = ApChecklists::find()->where(["id_checklists" => $checklistid])->one();
        $preguntas = ApChecklistsPreguntas::find()->where(["id_checklists" => $checklist->id_checklists])->orderby(["orden" => SORT_ASC])->all();
        $check_diario = ApChecklistsProyectos::find()->where(["id_checklists_proyectos" => $idChecklist])->one();
        $archivos = ApArchivosChecklist::find()->where(["id_checklists_proyectos" => $idChecklist])->all();
        $personasProyecto = ApProyectosPersonas::find()->where(["idproyectos" => $id])->all();
        $vehiculosProyecto = ApProyectosVehiculos::find()->where(["idproyectos" => $id])->all();
        $fechaChecklist = date('d/m/Y', strtotime($check_diario->create_at)); 


        return $this->render('detalle-respuestas', [
            'model' => $model,
            'checklist' => $checklist,
            'preguntas' => $preguntas,
            'check_diario' => $check_diario,
            'archivos' => $archivos,
            'personasProyecto' => $personasProyecto,
            'vehiculosProyecto' => $vehiculosProyecto,
            'fechaChecklist' => $fechaChecklist,
            'idChecklist' => $idChecklist,
            'id' => $id,
            'checklistid' => $checklistid
        ]);
    }

    public function insertarPersona($form,$proyecto){

        foreach ($form["idpersonas"] as $r) {

            $model = new ApProyectosPersonas();            
            $model->idproyectos = $proyecto->idproyectos;
            $model->idpersonas = $r;
            $model->id_estados = 1;
            $model->save(false);


        }

    }

    public function insertarVehiculo($form,$proyecto){

        foreach ($form['idvehiculos'] as $r) {

            $model = new ApProyectosVehiculos();            
            $model->idproyectos = $proyecto->idproyectos;
            $model->idvehiculos = $r;
            $model->id_estados = 1;
            $model->save(false);


        }

    }

    public function actionValidaChecklist($idproyectos, $fecha, $checklist){
        $check_diario = Yii::$app->db->createCommand(' Select * from ap_checklists_proyectos where idproyectos = '.$idproyectos.' and id_checklists = '.$checklist.' and DATE_FORMAT(create_at, "%Y-%m-%d") = "'.$fecha.'" ')->queryOne();
        
        return $check_diario;
    }


    /**
     * Updates an existing ApProyectos model.
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
        $estadoInicial = $model->id_estados_proyecto;

        if ($model->load(Yii::$app->request->post())) {
            $nuevoEstado = $model->id_estados_proyecto;

            if ($nuevoEstado != $estadoInicial) {
                $historial = new ApHistorialEstados();
                $historial->idproyectos = $id;
                $historial->rutUsuario = $rut;
                $historial->id_estados_proyecto = $nuevoEstado;
                $historial->save(false);
            }

            if($nuevoEstado == 6){
                $model->fec_cierre = date('Y-m-d');
            }


            $model->save(false);
            return $this->redirect(['view', 'id' => $model->idproyectos]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing ApProyectos model.
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
     * Finds the ApProyectos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ApProyectos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ApProyectos::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
