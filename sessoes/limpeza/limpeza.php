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


if (isset($_POST['mopgiratorioflashlimp'])) {
  if (!in_array('mopgiratorioflashlimp',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='mopgiratorioflashlimp';
  }
}else if(isset($_POST['sabaoliquidoomolavagemperfeitaprogalaodois'])){
  if (!in_array('sabaoliquidoomolavagemperfeitaprogalaodois',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='sabaoliquidoomolavagemperfeitaprogalaodois';
  }
}else if(isset($_POST['kitceraliquidabravobrilhopraticoamarelaembeleza'])){
  if (!in_array('kitceraliquidabravobrilhopraticoamarelaembeleza',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='kitceraliquidabravobrilhopraticoamarelaembeleza';
  }
}else if(isset($_POST['alcoolsetentaetilicoliquidoitajakit'])){
  if (!in_array('alcoolsetentaetilicoliquidoitajakit',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='alcoolsetentaetilicoliquidoitajakit';
  }
}else if(isset($_POST['toalhasdepapelkitchenjumbofolhaduplakitseis'])){
  if (!in_array('toalhasdepapelkitchenjumbofolhaduplakitseis',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='toalhasdepapelkitchenjumbofolhaduplakitseis';
  }
}else if(isset($_POST['freecocaixatuttifruttipackdoze'])){;
  if (!in_array('freecocaixatuttifruttipackdoze',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='freecocaixatuttifruttipackdoze';
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
    <title>Sessão Limpeza</title>
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
        <a href="../../sessoes/frios/frios.php" class="setoreslink">Frios</a>
        <a href="../../sessoes/hortifruti/hortifruti.php" class="setoreslink">Hortifruti</a>
        <a href="../../sessoes/limpeza/limpeza.php" class="setoreslinked">Limpeza</a>
      </div>

    <div class="bannerlimpeza">Produtos de Limpeza</div>

    <?php
      $precomopgiratorioflashlimp = "SELECT precoproduto FROM produto WHERE nomeproduto ='mopgiratorioflashlimp';";
      $precomopgiratorioflashlimpresultado = mysqli_query($conexao, $precomopgiratorioflashlimp);
      $precomopgiratorioflashlimparray = mysqli_fetch_assoc($precomopgiratorioflashlimpresultado);
      $precosabaoliquidoomolavagemperfeitaprogalaodois = "SELECT precoproduto FROM produto WHERE nomeproduto ='sabaoliquidoomolavagemperfeitaprogalaodois';";
      $precosabaoliquidoomolavagemperfeitaprogalaodoisresultado = mysqli_query($conexao, $precosabaoliquidoomolavagemperfeitaprogalaodois);
      $precosabaoliquidoomolavagemperfeitaprogalaodoisarray = mysqli_fetch_assoc($precosabaoliquidoomolavagemperfeitaprogalaodoisresultado);
      $precokitceraliquidabravobrilhopraticoamarelaembeleza = "SELECT precoproduto FROM produto WHERE nomeproduto ='kitceraliquidabravobrilhopraticoamarelaembeleza';";
      $precokitceraliquidabravobrilhopraticoamarelaembelezaresultado = mysqli_query($conexao, $precokitceraliquidabravobrilhopraticoamarelaembeleza);
      $precokitceraliquidabravobrilhopraticoamarelaembelezaarray = mysqli_fetch_assoc($precokitceraliquidabravobrilhopraticoamarelaembelezaresultado);
      $precoalcoolsetentaetilicoliquidoitajakit = "SELECT precoproduto FROM produto WHERE nomeproduto ='alcoolsetentaetilicoliquidoitajakit';";
      $precoalcoolsetentaetilicoliquidoitajakitresultado = mysqli_query($conexao, $precoalcoolsetentaetilicoliquidoitajakit);
      $precoalcoolsetentaetilicoliquidoitajakitarray = mysqli_fetch_assoc($precoalcoolsetentaetilicoliquidoitajakitresultado);
      $precotoalhasdepapelkitchenjumbofolhaduplakitseis = "SELECT precoproduto FROM produto WHERE nomeproduto ='toalhasdepapelkitchenjumbofolhaduplakitseis';";
      $precotoalhasdepapelkitchenjumbofolhaduplakitseisresultado = mysqli_query($conexao, $precotoalhasdepapelkitchenjumbofolhaduplakitseis);
      $precotoalhasdepapelkitchenjumbofolhaduplakitseisarray = mysqli_fetch_assoc($precotoalhasdepapelkitchenjumbofolhaduplakitseisresultado);
      $precofreecocaixatuttifruttipackdoze = "SELECT precoproduto FROM produto WHERE nomeproduto ='freecocaixatuttifruttipackdoze';";
      $precofreecocaixatuttifruttipackdozeresultado = mysqli_query($conexao, $precofreecocaixatuttifruttipackdoze);
      $precofreecocaixatuttifruttipackdozearray = mysqli_fetch_assoc($precofreecocaixatuttifruttipackdozeresultado);

    
    echo '
<form action="" method="post">
    <div class="container ">
      <div class="row ">
          <div class="col-sm-4 ">
              <div class="panel panel-danger ">
                  <div class="panel-heading " style="text-align: center; font-size: 25px; ">MOP GIRATÓRIO FLASHLIMP FIT MOP5010 COM BALDE, CABO TELESCÓPICO E REFIL - CINZA/VERDE</div>
                  <div class="panel-body "><img src="../../images/mopgiratorioflashlimp.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                  <div class="panel-footer ">Por: R$'.implode(",",$precomopgiratorioflashlimparray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="mopgiratorioflashlimp"> <br> A unidade contém: aço inox leve e resistente
                  </div>
              </div>
          </div>
          <div class="col-sm-4 ">
              <div class="panel panel-danger ">
                  <div class="panel-heading " style="text-align: center; font-size: 25px; ">SABÃO LÍQUIDO OMO LAVAGEM PERFEITA PRO GALÃO - 2 UNIDADES</div>
                  <div class="panel-body "><img src="../../images/sabaoliquidoomolavagemperfeitaprogalaodois.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                  <div class="panel-footer ">Por: R$'.implode(",",$precosabaoliquidoomolavagemperfeitaprogalaodoisarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="sabaoliquidoomolavagemperfeitaprogalaodois"> <br>Cada unidade contém 7 litros 
                  </div>
              </div>

          </div>
          <div class="col-sm-4 ">
              <div class="panel panel-danger ">
                  <div class="panel-heading " style="text-align: center; font-size: 25px;">KIT 6 CERA LÍQUIDA BRAVO BRILHO PRÁTICO AMARELA EMBELEZA</div>
                  <div class="panel-body "><img src="../../images/kitceraliquidabravobrilhopraticoamarelaembeleza.jpg" class="img-responsive " style="width:100%; " alt="Image "></div>
                  <div class="panel-footer ">Por: R$'.implode(",",$precokitceraliquidabravobrilhopraticoamarelaembelezaarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="kitceraliquidabravobrilhopraticoamarelaembeleza"> <br> Cada unidade contém 750ml
                  </div>
              </div>
          </div>
      </div>
  </div><br>

  <div class="container ">
      <div class="row ">
          <div class="col-sm-4 ">
              <div class="panel panel-danger ">
                  <div class="panel-heading " style="text-align: center; font-size: 25px; ">ÁLCOOL 70% ETÍLICO LÍQUIDO ITAJA 1LT KIT 6 UNIDADES</div>
                  <div class="panel-body "><img src="../../images/alcoolsetentaetilicoliquidoitajakit.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                  <div class="panel-footer ">Por: R$'.implode(",",$precoalcoolsetentaetilicoliquidoitajakitarray).' <br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="alcoolsetentaetilicoliquidoitajakit"> <br>Cada unidade contém 1 Litro
                  </div>
              </div>
          </div>
          <div class="col-sm-4 ">
              <div class="panel panel-danger ">
                  <div class="panel-heading " style="text-align: center; font-size: 25px; ">TOALHAS DE PAPEL KITCHEN JUMBO FOLHA DUPLA - 6 PACOTES</div>
                  <div class="panel-body "><img src="../../images/toalhasdepapelkitchenjumbofolhaduplakitseis.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                  <div class="panel-footer ">Por: R$'.implode(",",$precotoalhasdepapelkitchenjumbofolhaduplakitseisarray).'<br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="toalhasdepapelkitchenjumbofolhaduplakitseis"> <br>Cada pacote contém 3 rolos com 180 toalhas de papel</div>
              </div>
          </div>
          <div class="col-sm-4 ">
              <div class="panel panel-danger ">
                  <div class="panel-heading " style="text-align: center; font-size: 25px; ">FREECÔ CAIXA TUTTI FRUTTI</div>
                  <div class="panel-body "><img src="../../images/freecocaixatuttifruttipackdoze.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                  <div class="panel-footer ">Por: R$'.implode(",",$precofreecocaixatuttifruttipackdozearray).'<br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="freecocaixatuttifruttipackdoze"> <br>Cada unidade contém 60 ml</div>
              </div>
          </div>
      </div>
  </div>
  </form>
  ';
  ?>

    
  <div class="sessoespag " style="text-align: center; ">
        <ul class="pagination ">
            <li class="active"><a href="../../sessoes/limpeza/limpeza.php">1</a></li>
            <li><a href="../../sessoes/limpeza/limpeza2.php ">2</a></li>
            <li><a href="../../sessoes/limpeza/limpeza3.php">3</a></li>
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