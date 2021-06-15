<?php
session_start();
error_reporting(E_ERROR | E_PARSE);

if (!isset($_SESSION['carrinho'])){
  $_SESSION['carrinho'] = array();  
}


?>

<?php
if (isset($_POST['logout'])) {
    unset($_SESSION['usuariotipo']);
    unset($_SESSION['emaillogado']);
    unset($_SESSION['usuarionome']);
    unset($_SESSION['usuariologado']);
    $_SESSION['algumusuariologado'] = false;
}

?>

<?php
  $servername = "localhost:3306"; 
  $username = "root";
  $password = "";
  $dbname = "bd_mercadinho";

  $conexao = mysqli_connect($servername,$username,$password,$dbname) or die ( 'Nao foi possiviel conectar');
      
?>

<?php


if (isset($_POST['queijomucareladavacagdefatiado'])) {
  if (!in_array('queijomucareladavacagdefatiado',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='queijomucareladavacagdefatiado';
  }
}else if(isset($_POST['manteijacomsaldeprimeiraqualidadepiracanjuba'])){
  if (!in_array('manteijacomsaldeprimeiraqualidadepiracanjuba',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='manteijacomsaldeprimeiraqualidadepiracanjuba';
  }
}else if(isset($_POST['coalhadaitambeintegraladocada'])){
  if (!in_array('coalhadaitambeintegraladocada',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='coalhadaitambeintegraladocada';
  }
}else if(isset($_POST['bebidalacteabetaniamorango'])){
  if (!in_array('bebidalacteabetaniamorango',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='bebidalacteabetaniamorango';
  }
}else if(isset($_POST['achocolatadoliquidomaratinho'])){
  if (!in_array('achocolatadoliquidomaratinho',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='achocolatadoliquidomaratinho';
  }
}else if(isset($_POST['chandellenestlechantillychocolateemorango'])){;
  if (!in_array('chandellenestlechantillychocolateemorango',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='chandellenestlechantillychocolateemorango';
  }
}

if(isset($_POST['limparcarrinho'])){
  unset($_SESSION['carrinho']);
  $_SESSION['carrinho'] = array();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Sessão Frios</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <link rel="stylesheet" href="../../style.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Train+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">

    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Merienda&display=swap" rel="stylesheet">

</head>

<body>

<header>
        <div class="header1">
        <a href="../../principal.php">
          <img class="logo" src="https://www.siesesp.org.br/img/Compra-certa-gd.png" alt="">
        </a>
        </div>
        <div class="header2">
        <p class="searchtop">Encontre aqui o produto que você procura... </p>
        </div>
    
        <div class="header3">
          <a href="../../carrinho.php"class="shopcart">
            <img class="shopcart" src="https://image.flaticon.com/icons/png/512/126/126510.png" alt="Meu carrinho">
            Seu carrinho
          </a>
          <form method="post">
      <input type="submit" class="limparcarrinho" value="Limpar" name="limparcarrinho">
      </form>
          
      <?php
          if ($_SESSION['algumusuariologado']) {
            if ($_SESSION['usuariotipo'] == 'normal') {
              echo "<div class='logado'>Ir Perfil: <a href='clientepage.php' class='logado2'>".implode($_SESSION['usuarionome'])."</a>
              <form method='post'>
            <input type='submit' value='Logout' class='logoutclass' name='logout'>
            </form>
              </div>";
            }elseif ($_SESSION['usuariotipo'] == 'admin') {
              echo "<div class='logado'>Perfil Admin: <a href='admin/admpage.php' class='logado2'>".implode($_SESSION['usuarionome'])."</a>
              <form method='post'>
            <input type='submit' value='Logout' class='logoutclass' name='logout'>
            </form>
              </div>";
            }
          }else{
            echo "<div class='logado'>Faca Login ou Cadastre-se </div>";
          }
          

          ?>
          
          <a href="../../RegisterClient.php" class="register" >Login
      /
      Registrar</a>
        </div>
    
      </header>

      <div class="setores">
        <a href="../../sessoes/bebidas/bebidas.php" class="setoreslink">Bebidas</a>
        <a href="../../sessoes/carne/carne.php" class="setoreslink">Carnes</a>
        <a href="../../sessoes/frios/frios3.php" class="setoreslinked">Frios</a>
        <a href="../../sessoes/hortifruti/hortifruti.php" class="setoreslink">Hortifruti</a>
        <a href="../../sessoes/limpeza/limpeza.php" class="setoreslink">Limpeza</a>
      </div>

    <div class="bannerfrios">frios</div>
    <?php
      $precoqueijomucareladavacagdefatiado = "SELECT precoproduto FROM produto WHERE nomeproduto ='queijomucareladavacagdefatiado';";
      $precoqueijomucareladavacagdefatiadoresultado = mysqli_query($conexao, $precoqueijomucareladavacagdefatiado);
      $precoqueijomucareladavacagdefatiadoarray = mysqli_fetch_assoc($precoqueijomucareladavacagdefatiadoresultado);
      $precomanteijacomsaldeprimeiraqualidadepiracanjuba = "SELECT precoproduto FROM produto WHERE nomeproduto ='manteijacomsaldeprimeiraqualidadepiracanjuba';";
      $precomanteijacomsaldeprimeiraqualidadepiracanjubaresultado = mysqli_query($conexao, $precomanteijacomsaldeprimeiraqualidadepiracanjuba);
      $precomanteijacomsaldeprimeiraqualidadepiracanjubaarray = mysqli_fetch_assoc($precomanteijacomsaldeprimeiraqualidadepiracanjubaresultado);
      $precocoalhadaitambeintegraladocada = "SELECT precoproduto FROM produto WHERE nomeproduto ='coalhadaitambeintegraladocada';";
      $precocoalhadaitambeintegraladocadaresultado = mysqli_query($conexao, $precocoalhadaitambeintegraladocada);
      $precocoalhadaitambeintegraladocadaarray = mysqli_fetch_assoc($precocoalhadaitambeintegraladocadaresultado);
      $precobebidalacteabetaniamorango = "SELECT precoproduto FROM produto WHERE nomeproduto ='bebidalacteabetaniamorango';";
      $precobebidalacteabetaniamorangoresultado = mysqli_query($conexao, $precobebidalacteabetaniamorango);
      $precobebidalacteabetaniamorangoarray = mysqli_fetch_assoc($precobebidalacteabetaniamorangoresultado);
      $precoachocolatadoliquidomaratinho = "SELECT precoproduto FROM produto WHERE nomeproduto ='achocolatadoliquidomaratinho';";
      $precoachocolatadoliquidomaratinhoresultado = mysqli_query($conexao, $precoachocolatadoliquidomaratinho);
      $precoachocolatadoliquidomaratinhoarray = mysqli_fetch_assoc($precoachocolatadoliquidomaratinhoresultado);
      $precochandellenestlechantillychocolateemorango = "SELECT precoproduto FROM produto WHERE nomeproduto ='chandellenestlechantillychocolateemorango';";
      $precochandellenestlechantillychocolateemorangoresultado = mysqli_query($conexao, $precochandellenestlechantillychocolateemorango);
      $precochandellenestlechantillychocolateemorangoarray = mysqli_fetch_assoc($precochandellenestlechantillychocolateemorangoresultado);

    
    echo '
<form action="" method="post">

    <div class="container ">
      <div class="row ">
          <div class="col-sm-4 ">
              <div class="panel panel-danger ">
                  <div class="panel-heading " style="text-align: center; font-size: 25px; ">QUEIJO MUÇARELA DAVACA GDE FATIADO
                  </div>
                  <div class="panel-body "><img src="../../images/queijomucareladavacagdefatiado.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                  <div class="panel-footer ">Preço por: R$'.implode(",",$precoqueijomucareladavacagdefatiadoarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="queijomucareladavacagdefatiado"> <br> A unidade contém aproximadamente: 250g
                  </div>
              </div>
          </div>
          <div class="col-sm-4 ">
              <div class="panel panel-danger ">
                  <div class="panel-heading " style="text-align: center; font-size: 25px; ">MANTEIGA COM SAL DE PRIMEIRA QUALIDADE PIRACANJUBA  </div>
                  <div class="panel-body "><img src="../../images/manteijacomsaldeprimeiraqualidadepiracanjuba.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                  <div class="panel-footer ">Preço por: R$'.implode(",",$precomanteijacomsaldeprimeiraqualidadepiracanjubaarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="manteijacomsaldeprimeiraqualidadepiracanjuba"> <br> A unidade contém aproximadamente: 200g 
                  </div>
              </div>

          </div>
          <div class="col-sm-4 ">
              <div class="panel panel-danger ">
                  <div class="panel-heading " style="text-align: center; font-size: 25px;">COALHADA ITAMBÉ INTEGRAL ADOÇADA 
                 </div>
                  <div class="panel-body "><img src="../../images/coalhadaitambeintegraladocada.jpg" class="img-responsive " style="width:100%; " alt="Image "></div>
                  <div class="panel-footer ">Preço: R$'.implode(",",$precocoalhadaitambeintegraladocadaarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="coalhadaitambeintegraladocada"> <br> A unidade contém aproximadamente: 130g
                  </div>
              </div>
          </div>
      </div>
  </div><br>

  <div class="container ">
      <div class="row ">
          <div class="col-sm-4 ">
              <div class="panel panel-danger ">
                  <div class="panel-heading " style="text-align: center; font-size: 25px; ">BEBIDA LÁCTEA BETÂNIA MORANGO
                  </div>
                  <div class="panel-body "><img src="../../images/bebidalacteabetaniamorango.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                  <div class="panel-footer ">Preço por pacote: R$'.implode(",",$precobebidalacteabetaniamorangoarray).' <br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="bebidalacteabetaniamorango"> <br> A unidade contém aproximadamente: 900g 
                  </div>
              </div>
          </div>
          <div class="col-sm-4 ">
              <div class="panel panel-danger ">
                  <div class="panel-heading " style="text-align: center; font-size: 25px; ">ACHOCOLATADO LÍQUIDO MARATINHO TP       </div>
                  <div class="panel-body "><img src="../../images/achocolatadoliquidomaratinho.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                  <div class="panel-footer ">Preço por quilo: R$'.implode(",",$precoachocolatadoliquidomaratinhoarray).'<br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="achocolatadoliquidomaratinho"> <br> A unidade contém aproximadamente :200ml</div>
              </div>
          </div>
          <div class="col-sm-4 ">
              <div class="panel panel-danger ">
                  <div class="panel-heading " style="text-align: center; font-size: 25px; ">CHANDELLE NESTLE CHANTILLY CHOC+MORANGO              </div>
                  <div class="panel-body "><img src="../../images/chandellenestlechantillychocolateemorango.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                  <div class="panel-footer ">Preço por pacote : R$'.implode(",",$precochandellenestlechantillychocolateemorangoarray).'<br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="chandellenestlechantillychocolateemorango"> <br> A unidade contém aproximadamente: 200g</div>
              </div>
          </div>
      </div>
  </div>
  </form>
    ';
    ?>

  <div class="sessoespag " style="text-align: center; ">
        <ul class="pagination ">
            <li><a href="../../sessoes/frios/frios.php">1</a></li>
            <li><a href="../../sessoes/frios/frios2.php ">2</a></li>
            <li class="active"><a href="../../sessoes/frios/frios3.php ">3</a></li>
        </ul>
    </div>

    


    <footer>
        <div class="footercontact">Contatos:
          <br>3434-3434 <br>8484-8484 <br>contato@espacomercado.com.br
        </div>
        <div class="footername">Mercadinho Qualquer S.A <br> Caminho 02-Quadra 05, Cajazeiras, Salvador, BA <br> CEP: 41335-360 <br> CNPJ: 80.033.928/0001-01 <br>Inscrição Estadual: 186124-17</div>
        <div class="footersociais">
          <div class="footersociaistitle">  Sociais:  </div>  
          <div class="footersociaistype"><a href="" class="footersociaistype"><img src="https://image.flaticon.com/icons/png/512/87/87390.png" class="footerimg" alt=""> Instagram</a></div>
          <div class="footersociaistype"><a href="" class="footersociaistype"><img src="https://cdn2.iconfinder.com/data/icons/font-awesome/1792/facebook-official-512.png" class="footerimg" alt=""> Facebook</a></div>
          <div class="footersociaistype"><a href="" class="footersociaistype"><img src="https://img.icons8.com/ios/452/twitter-squared.png" class="footerimg" alt=""> Twitter</a></div>
        </div>
      </footer>

      <script src="/front.js"></script>
</body>

</html>