<?php

namespace app\modules\Permisos\controllers;

use yii\web\Controller;

/**
 * Default controller for the `Permisos` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->redirect(['permisos-usuarios/index']);
    }
}
