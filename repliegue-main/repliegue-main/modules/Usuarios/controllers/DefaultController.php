<?php

namespace app\modules\Usuarios\controllers;

use Yii;
use yii\web\Controller;

/**
 * Default controller for the `Usuarios` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->redirect(['user/index']);
    }
}
