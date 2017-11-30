<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Certidão de <?php echo $titulo ?></title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>/public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>public/css/scrolling-nav.css" rel="stylesheet">
    <script src="<?php echo base_url() ?>public/js/jquery-3.2.0.min.js"></script>
    <script type="text/javascript" src="https://rawgit.com/RobinHerbots/Inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script type="text/javascript" src="https://rawgit.com/RobinHerbots/Inputmask/3.x/dist/inputmask/phone-codes/phone.js"></script>
  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Certidão Já</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <header class="bg-primary text-white">
      <div class="container text-center">
        <h1>Solicitação de certidão de <?php echo $titulo ?> </h1>
        <p class="lead">Você faz a sua solicitação e recebe sem sair de casa !</p>
      </div>
    </header>
    <?php 
      if ($titulo == "Óbito") {
        $titulo = "Obito";
      }
    ?>
    <script type="text/javascript">
      $(document).ready(function(){
        $("#cpf").inputmask({"mask": "999.999.999-99"});
        $("#data").inputmask("99/99/9999");
        $("#telefone").inputmask("(99) 99999-9999");
      })
    </script>
    <script type="text/javascript">
      function submitForm() {
        $.post('<?php echo "certidao".$titulo ?>', $("#form").serialize(), function(data){
          if (data == 0) {
             location.reload(true);
          }
          else{
            $("#code").val(data)
            $("#comprar").submit();
          }
        });
      }
    </script>