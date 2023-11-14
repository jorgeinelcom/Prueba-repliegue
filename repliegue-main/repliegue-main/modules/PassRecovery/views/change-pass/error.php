





<div class="col-md-4 col-md-offset-4">

  <div class="card" id="p15" style="padding:15px;">

    <?php if ($error == 2): ?>
        <h3>Su codigo de seguridad no es valido</h3>
    <?php elseif($error == 1): ?>
        <h3>Su codigo de seguridad ha expirado</h3>
    <?php endif; ?>
    <br>
  <a href="index.php?r=site/login" class="btn btn-default"> <i class="fas fa-arrow-left"></i> Volver</a>
  </div>

</div>



<style media="screen">
  ul{
    display: none!important;
  }



      #p15{
        padding:15px!important;
      }
    ul{
      display: none!important;
    }

    body {
      background: rgb(15,78,102);
      background: linear-gradient(45deg, rgba(15,78,102,1) 0%, rgba(0,191,215,1) 100%);
    }

    .wrap > .container {
      padding: 70px 15px 20px;
  }

</style>
