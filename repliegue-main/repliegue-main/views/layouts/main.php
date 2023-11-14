<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://kit.fontawesome.com/b8362b255b.js" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<div class="wrap">
    <nav class="navbar navbar-inverse">
        <div class="container" >
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
            <img src="images/negativo3.png" height="35px" alt="My Application"></a>
            <b style="color: white;">AMB. DESARROLLO</b>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
            <ul class="nav navbar-nav navbar-right">
                <!-- ######################## INICIO MENU RESPONSIVO  #################################################################### -->
                <?php 
                    $rutSesion = Yii::$app->user->identity->rut_usuario;
                    $Menu = Yii::$app->db->CreateCommand("CALL SP_SELECT_MENU( ".$rutSesion." ) ")->queryall();
                    foreach ($Menu as $key => $valueMenu): 
                ?>
                    <?php if($valueMenu['M_ID'] != 11): ?>
                        <li class="dropdown" style="font-size: 13px;">
                            <a href="#<?= $valueMenu['M_RUTA'] ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
                                <?= $valueMenu['M_NOM'] ?>
                                <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu"> 
                                <!-- ######################## CREACION SUB MENU ######################## -->
                                <?php  $SubMenu = Yii::$app->db->CreateCommand("CALL SP_SELECT_SUBMENU( ".$rutSesion." , ".$valueMenu['M_ID']." ) ")->queryall(); ?>
                                <?php foreach ($SubMenu as $key => $valueSub): ?>
                                    <li><a href="<?= $valueSub['SM_RUTA'] ?>"><?= $valueSub['SM_NOM'] ?></a></li>
                                <?php endforeach ?>
                                <!-- ######################## Menu interno para dashboard ########################-->
                                <?php if($valueMenu['M_ID'] == 4) :
                                    $Menu2 = Yii::$app->db->CreateCommand("CALL SP_SELECT_MENU_ID( ".$rutSesion.",11) ")->queryall();
                                ?>
                                    <?php foreach ($Menu2 as $key => $valueMenu2):  ?>
                                        <li class="divider"></li>
                                        <li class="dropdown-header"><?= $valueMenu2['M_NOM'] ?></li>
                                        <?php  $SubMenu2 = Yii::$app->db->CreateCommand("CALL SP_SELECT_SUBMENU( ".$rutSesion." , ".$valueMenu2['M_ID']." ) ")->queryall(); ?>
                                        <?php foreach ($SubMenu2 as $key => $valueSub2): ?>
                                            <li><a href="<?= $valueSub2['SM_RUTA'] ?>"><?= $valueSub2['SM_NOM'] ?></a></li>
                                        <?php endforeach ?>
                                    <?php endforeach ?>
                                <?php endif ?>
                                <!-- ######################## FIN Menu interno para dashboard ########################-->
                                <!-- ######################## FIN CREACION SUB MENU ######################## -->
                            </ul>
                        </li>
                    <?php endif ?>
                <?php endforeach ?>
                <!-- ######################## TERMINO MENU RESPONSIVO  #################################################################### -->
                
                <!-- ######################## inicio li de logout fijo  #################################################################### -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"> <?= Yii::$app->user->identity->username?>  <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">
                            <?= Html::beginForm(['/site/logout'], 'post').
                                Html::submitButton('Salir', ['class' => 'btn btn-link logout'] ).
                            Html::endForm()?>
                        </a></li>
                    </ul>
                </li>
                <!-- ######################## fin li de logout fijo  #################################################################### -->
            </ul>
        </div>
        </div>
    </nav>




<style>
    @media (min-width: 768px){
        .navbar {
            border-radius: 0px!important;
        }
    }

    .navbar-inverse {
        background: rgb(15,78,102);
        background: linear-gradient(45deg, rgba(15,78,102,1) 0%, rgb(20, 107, 140)  100%);
        border-color: #0f4e66;
    }

    .navbar {
        position: relative;
        min-height: 70px;
        margin-bottom: 20px;
        border: 1px solid transparent;
    }

    .navbar-inverse .navbar-nav > li > a {
        color: #ffffff;
    }

    .navbar-inverse .navbar-nav > .open > a, .navbar-inverse .navbar-nav > .open > a:hover, .navbar-inverse .navbar-nav > .open > a:focus {
        color: #fff;
        background-color: #0f3a4b;
    }
    body{
        background: #f7f7f7;
    }

    .swal2-popup.swal2-modal.swal2-icon-warning.swal2-show{
        font-size: 15px;
    }

    
hr {
    margin-top: 10px!important;
    margin-bottom: 20px!important;
    border: 0!important;
    border-top: 1px solid #cdcdcd!important;
}
.pdlf15{
    padding-right: 15px;
    padding-left: 15px
}

.mg2.orange {
    margin: 2px;
    padding: 3px 10px;
}
    .btn-success {
    color: #fff;
    background-color: #8BC34A;
    border-color: #8BC34A;
}
</style>



    <div class="container" id="contenedor-principal">
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; INELCOM CHILE S.A <?= date('Y') ?></p>

    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
