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


if (isset($_POST['panodelimpeza'])) {
  if (!in_array('panodelimpeza',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='panodelimpeza';
  }
}else if(isset($_POST['clorogelvimoriginalmultiusopackdoze'])){
  if (!in_array('clorogelvimoriginalmultiusopackdoze',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='clorogelvimoriginalmultiusopackdoze';
  }
}else if(isset($_POST['odorizadoraerosollavanda'])){
  if (!in_array('odorizadoraerosollavanda',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='odorizadoraerosollavanda';
  }
}else if(isset($_POST['desinfetantepatogelusogerallavandalimpezaprofunda'])){
  if (!in_array('desinfetantepatogelusogerallavandalimpezaprofunda',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='desinfetantepatogelusogerallavandalimpezaprofunda';
  }
}else if(isset($_POST['alcoolsetentaetilicoliquidoitaja'])){
  if (!in_array('alcoolsetentaetilicoliquidoitaja',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='alcoolsetentaetilicoliquidoitaja';
  }
}else if(isset($_POST['desinfetanteomousogerallavandapackdoze'])){;
  if (!in_array('desinfetanteomousogerallavandapackdoze',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='desinfetanteomousogerallavandapackdoze';
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
        <a href="../../sessoes/limpeza/limpeza2.php" class="setoreslinked">Limpeza</a>
      </div>

    <div class="bannerlimpeza">Produtos de Limpeza</div>
    <?php
      $precopanodelimpeza = "SELECT precoproduto FROM produto WHERE nomeproduto ='panodelimpeza';";
      $precopanodelimpezaresultado = mysqli_query($conexao, $precopanodelimpeza);
      $precopanodelimpezaarray = mysqli_fetch_assoc($precopanodelimpezaresultado);
      $precoclorogelvimoriginalmultiusopackdoze = "SELECT precoproduto FROM produto WHERE nomeproduto ='clorogelvimoriginalmultiusopackdoze';";
      $precoclorogelvimoriginalmultiusopackdozeresultado = mysqli_query($conexao, $precoclorogelvimoriginalmultiusopackdoze);
      $precoclorogelvimoriginalmultiusopackdozearray = mysqli_fetch_assoc($precoclorogelvimoriginalmultiusopackdozeresultado);
      $precoodorizadoraerosollavanda = "SELECT precoproduto FROM produto WHERE nomeproduto ='odorizadoraerosollavanda';";
      $precoodorizadoraerosollavandaresultado = mysqli_query($conexao, $precoodorizadoraerosollavanda);
      $precoodorizadoraerosollavandaarray = mysqli_fetch_assoc($precoodorizadoraerosollavandaresultado);
      $precodesinfetantepatogelusogerallavandalimpezaprofunda = "SELECT precoproduto FROM produto WHERE nomeproduto ='desinfetantepatogelusogerallavandalimpezaprofunda';";
      $precodesinfetantepatogelusogerallavandalimpezaprofundaresultado = mysqli_query($conexao, $precodesinfetantepatogelusogerallavandalimpezaprofunda);
      $precodesinfetantepatogelusogerallavandalimpezaprofundaarray = mysqli_fetch_assoc($precodesinfetantepatogelusogerallavandalimpezaprofundaresultado);
      $precoalcoolsetentaetilicoliquidoitaja = "SELECT precoproduto FROM produto WHERE nomeproduto ='alcoolsetentaetilicoliquidoitaja';";
      $precoalcoolsetentaetilicoliquidoitajaresultado = mysqli_query($conexao, $precoalcoolsetentaetilicoliquidoitaja);
      $precoalcoolsetentaetilicoliquidoitajaarray = mysqli_fetch_assoc($precoalcoolsetentaetilicoliquidoitajaresultado);
      $precodesinfetanteomousogerallavandapackdoze = "SELECT precoproduto FROM produto WHERE nomeproduto ='desinfetanteomousogerallavandapackdoze';";
      $precodesinfetanteomousogerallavandapackdozeresultado = mysqli_query($conexao, $precodesinfetanteomousogerallavandapackdoze);
      $precodesinfetanteomousogerallavandapackdozearray = mysqli_fetch_assoc($precodesinfetanteomousogerallavandapackdozeresultado);

    
    echo '
<form action="" method="post">

    <div class="container ">
        <div class="row ">
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">PANO DE LIMPEZA MULTIUSO SCOTT DURAMAX</div>
                    <div class="panel-body "><img src="../../images/panodelimpeza.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Por: R$'.implode(",",$precopanodelimpezaarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="panodelimpeza"> <br>Contém 58 unidades
                    </div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">CLORO GEL VIM ORIGINAL MULTIUSO - 12 UNIDADES</div>
                    <div class="panel-body "><img src="../../images/clorogelvimoriginalmultiusopackdoze.jpg" class="img-responsive " style="width:100%; height: 363px" alt="Image "></div>
                    <div class="panel-footer ">Por: R$'.implode(",",$precoclorogelvimoriginalmultiusopackdozearray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="clorogelvimoriginalmultiusopackdoze"> <br>Cada unidade contém 700ml
                    </div>
                </div>

            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px;">ODORIZADOR DE AMBIENTE AEROSOL LAVANDA - BOM AR AIR WICK</div>
                    <div class="panel-body "><img src="../../images/odorizadoraerosollavanda.jpg" class="img-responsive " style="width:100%; height: 293px" alt="Image "></div>
                    <div class="panel-footer ">Por: R$'.implode(",",$precoodorizadoraerosollavandaarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="odorizadoraerosollavanda"> <br>A unidade contém 360ml
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container ">
        <div class="row ">
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">DESINFETANTE PATO GEL USO GERAL LAVANDA LIMPEZA PROFUNDA</div>
                    <div class="panel-body "><img src="../../images/desinfetantepatogelusogerallavandalimpezaprofunda.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Por: R$'.implode(",",$precodesinfetantepatogelusogerallavandalimpezaprofundaarray).' <br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="desinfetantepatogelusogerallavandalimpezaprofunda"> <br> A unidade contém 750ml
                    </div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">ÁLCOOL 70% ETÍLICO LÍQUIDO ITAJA</div>
                    <div class="panel-body "><img src="../../images/alcoolsetentaetilicoliquidoitaja.jpg" class="img-responsive " style="width:100%; height: 363px" alt="Image "></div>
                    <div class="panel-footer ">Por: R$'.implode(",",$precoalcoolsetentaetilicoliquidoitajaarray).'<br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="alcoolsetentaetilicoliquidoitaja"> <br>A unidade contém 1L</div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">DESINFETANTE OMO USO GERAL LAVANDA - 12 UNIDADES</div>
                    <div class="panel-body "><img src="../../images/desinfetanteomousogerallavandapackdoze.jpg" class="img-responsive " style="width:100%; height: 328px" alt="Image "></div>
                    <div class="panel-footer ">Por: R$'.implode(",",$precodesinfetanteomousogerallavandapackdozearray).'<br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="desinfetanteomousogerallavandapackdoze"> <br>Cada unidade contém 500ml</div>
                </div>
            </div>
        </div>
    </div>
    </form>
    ';
    ?>

    <div class="sessoespag " style="text-align: center; ">
        <ul class="pagination ">
            <li><a href="../../sessoes/limpeza/limpeza.php">1</a></li>
            <li class="active"><a href="../../sessoes/limpeza/limpeza2.php ">2</a></li>
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