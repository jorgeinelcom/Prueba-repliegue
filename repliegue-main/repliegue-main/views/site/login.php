<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';

?>

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../web/img/apple-icon.png" />
  <link rel="icon" type="image/png" href="../web/img/favicon.png" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
  <meta name="viewport" content="width=device-width" />

  <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />

  <script  src="https://code.jquery.com/jquery-2.2.4.min.js"  integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  
  <script src="http://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script> <!-- stats.js lib --> 
  <script src="http://threejs.org/examples/js/libs/stats.min.js"></script>

</head>






<div id="particles-js"></div>

<body>
  


  <?php $form = ActiveForm::begin(); ?>


  <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3  p-m p-d">
    <form method="post" action="#">
      <div class="card card-login card-hidden">
        <div class="card-header text-center" data-background-color="rose">
          <h4 class="card-title"><img src="images/negativo3.png" style="width:60%;"></h4>
        </div>


        <div class="card-content">

          <div class="">

            <?php if (Yii::$app->session->hasFlash('success')): ?>
              <div class="alert alert-success" role="alert">
                <?= Yii::$app->session->getFlash('success');?>
              </div>
            <?php endif; ?>
          </div>

          <div class="input-group">
            <span class="input-group-addon">
              <i class="material-icons">email</i>
            </span>
            <div class="form-group label-floating">
              <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label("Nombre Usuario") ?>
            </div>
          </div>

          <div class="input-group mt-2">
            <span class="input-group-addon">
              <i class="material-icons">lock_outline</i>
            </span>
            <div class="form-group label-floating">
              <?= $form->field($model, 'password')->passwordInput() ?>
            </div>
          </div>


          <div class=" buttons-center">

              <div class="submit">
                <?= Html::submitButton('Ingresar', ['class' => 'btn btn-info btn-block login', 'name' => 'login-button']) ?>
              </div>

            <a href="#" data-target="#changePass" data-toggle="modal">Olvide mi contraseña</a>
          </div>

          <?php if (Yii::$app->session->hasFlash('error')): ?>
              <div class="alert alert-danger" role="alert">
                <?= Yii::$app->session->getFlash('error');?>
              </div>
             
            <?php endif;  ?>



        </div>

      </div>
    </form>
  </div>









    <?php ActiveForm::end(); ?>




    <!-- Modal -->
    <div class="modal fade" id="changePass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Recuperar Contraseña</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

            <div class="modal-body">
              <h5>Ingrese su correo, si los datos coinciden con  nuestros registros le enviaremos un mail para restablecer su contraseña</h5>

              <div class="col-md-12">
                <input type="text" name="" value="" class="form-control" placeholder="Ingrese su Email" id="mailUsuario" required>
              </div>
              <br/> <br/>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
              <button type="button" class="btn btn-primary" id="recuperar">Recuperar Contraseña</button>
            </div>

        </div>
      </div>
    </div>


<style>

.submit {
      margin-bottom: 25px;
      padding:0px!important;
  }
  .buttons-center{
    text-align: center;
    margin-top: 30px;
    margin-bottom: 6px;
  }
  .card-header.text-center {
    background:#00889c!important;
  }
  button.btn.btn-primary.login {
    background-color: #0f4053!important;
  }


  .card-header.text-center {
    background: #0f4e66!important;
    padding: 15px;
  }

  .mt-2{
    margin-top:15px;
  }
  body {
    background: rgb(15,78,102);
    background: linear-gradient(45deg, rgba(15,78,102,1) 0%, rgba(0,191,215,1) 100%);
  }
  .card-content {
    background: white;
    padding: 50px 35px;
  }

  .card-login{
    overflow:hidden;
    border-radius: 10px;
    margin-top:5%;
  }

  .p-d{
    padding: 0px 70px;
  }
  @media screen and (max-width: 760px) {
    .p-m{
      padding:0px!important;
    }
  }
 canvas{ display: block; vertical-align: bottom; } 
  #particles-js{ 
    position:absolute; 
    width: 100%; 
    height: 100%; 
    left: 0;
    top: 0;

    background-image: url(""); 
    background-repeat: no-repeat; 
    background-size: cover; 
    background-position: 50% 50%; 
  } /* ---- stats.js ---- */ 
  .count-particles{ 
    background: #000022; 
    position: absolute; 
    top: 48px; 
    left: 0; 
    width: 80px; 
    color: #13E8E9; 
    font-size: .8em; 
    text-align: left; 
    text-indent: 4px; 
    line-height: 14px; 
    padding-bottom: 2px; 
    font-family: Helvetica, Arial, sans-serif; 
    font-weight: bold; 
  } 
  .js-count-particles{ 
    font-size: 1.1em; 
  } 
  #stats, .count-particles{ 
    -webkit-user-select: none; 
    margin-top: 5px; 
    margin-left: 5px; 
  } 
  #stats{ 
    border-radius: 3px 3px 0 0; 
    overflow: hidden; 
  } 
  .count-particles{ 
    border-radius: 0 0 3px 3px; 
  }
</style>



    <script type="text/javascript">

    var jq = $.noConflict();
        document.getElementById('recuperar').addEventListener('click', () => {
          let error = 0;
          let rut = document.getElementById('rut')
          let email = document.getElementById('mailUsuario').value

          if(!email){
            swal('Mm!', 'Todos los campos son obligatorios');
          }else{

              emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
              if(!emailRegex.test(email)){
                swal('Ups!', 'El email que ingresaste no es valido');
                error ++;
              }else{
                $.get('index.php?r=passrecovery/change-pass/request-change-pass&email='+email, function(response){

                    if(response == 1){
                        swal('Genial!', 'Hemos enviado un correo que te permitira restablecer tu contraseña', 'success')
                        jq("#changePass").modal('hide');
                        document.getElementById('mailUsuario').value = ''
                    }else{
                      swal('Ho!', 'El correo ingresado no coincide con nuestros registros', 'warning')
                    }

                })
              }

          }

          if(error > 0){
            swal(error)
          }

        })




        particlesJS("particles-js", {
          "particles":{
            "number":{
              "value":80,
              "density":{
                "enable":true,
                "value_area":800
                }
            },
            "color":{
              "value":"#ffffff"
            },
            "shape":{
              "type":"circle",
              "stroke":{
                "width":0,
                "color":"#000000"
              },
              "polygon":{
                "nb_sides":5
              },
              "image":{
                "src":"img/github.svg",
                "width":100,
                "height":100
                }
            },
            "opacity":{
              "value":0.5,
              "random":false,
              "anim":{
                "enable":false,
                "speed":1,
                "opacity_min":0.1,
                "sync":false
              }
            },
            "size":{
              "value":3,
              "random":true,
              "anim":{
                "enable":false,
                "speed":40,
                "size_min":0.1,
                "sync":false
              }
            },
            "line_linked":{
              "enable":true,
              "distance":150,
              "color":"#ffffff",
              "opacity":0.4,
              "width":1
            },
            "move":{
              "enable":true,
              "speed":6,
              "direction":"none",
              "random":false,
              "straight":false,
              "out_mode":"out",
              "bounce":false,
              "attract":{
                "enable":false,
                "rotateX":600,
                "rotateY":1200
              }
            }
          },

          "interactivity":{
            "detect_on":"canvas",
            "events":{
              "onhover":{
                "enable":true,
                "mode":"repulse"
              },
              "onclick":{
                "enable":true,
                "mode":"push"
              },
              "resize":true
            },
            "modes":{
              "grab":{
                "distance":400,
                "line_linked":{
                  "opacity":1
                }
              },
              "bubble":{
                "distance":400,
                "size":40,
                "duration":2,
                "opacity":8,
                "speed":3
              },
              "repulse":{
                "distance":200,
                "duration":0.4
              },
              "push":{
                "particles_nb":4
              },
              "remove":{
                "particles_nb":2
              }
            }
          },
          "retina_detect":true
        });
              
              
              
              
      
      

      </script>





</body>
