<?php
use yii\helpers\Html;
?>

<?php $this->beginPage() ?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=<?= Yii::$app->charset ?>"/>
    <style type="text/css">
        .contenedor-mail {
            padding: 15px;
            background: white !important;
            max-width: 600px!important;
            border-radius: 10px;
            margin: 1.2em auto;

            -webkit-box-shadow: 0px 0px 5px -3px rgba(0,0,0,0.75)!important;
            -moz-box-shadow: 0px 0px 5px -3px rgba(0,0,0,0.75)!important;
            box-shadow: 0px 0px 5px -3px rgba(0,0,0,0.75)!important;
                    }


        .banner > img {
            max-width: 100%;
        }

        .cabecera {
            /*      background: red;
                  color: #fff;*/
            padding: 15px 0px;
            margin-bottom: 20px;
        }

        .m-n {
            margin: 0 !important;
            line-height: 1.5em;
            font-weight: 500;
        }

        .titulo {
            font-size: 25px;
        }

        .subtitulo {
            font-size: 15px
        }

        .contenedor-general {

            padding: 15px;
        }

        .button_action {
            padding: 10px;
            border-radius: 10px;
            text-decoration: none;
        }

        .btn-accion{
            color:#fff!important;
            /*background: ;*/
            padding:10px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
    </style>




    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="contenedor-general">
    <div class="contenedor-mail">


        <div class="cabecera">


        </div>

        <div class="body">
         <p>Hola  <strong><?= $usuario->nombre ?> <?=$usuario->apellidos ?></strong>. <br>
            Hemos recibido una solicitud para cambiar contraseña
            Si deseas cambiar tu contraseña puedes hacerlo ingresando
            <a href="<?= Yii::$app->params['url'] ?>?r=passrecovery/change-pass/change-pass&hash=<?=$hash ?>&rut=<?=$usuario->rut_usuario ?>">Aqui</a>
         </p>

         <p>Este enlace es valido durante 30 minutos</p>


           <br /> <br />

        </div>

        <div class="footer">

        </div>


    </div>
</div>


<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
