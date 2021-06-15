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


if (isset($_POST['heineken'])) {
  if (!in_array('heineken',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='heineken';
  }
}else if(isset($_POST['budweiser'])){
  if (!in_array('budweiser',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='budweiser';
  }
}else if(isset($_POST['cocacola'])){
  if (!in_array('cocacola',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='cocacola';
  }
}else if(isset($_POST['stellaartois'])){
  if (!in_array('stellaartois',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='stellaartois';
  }
}else if(isset($_POST['eisenbahn'])){
  if (!in_array('eisenbahn',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='eisenbahn';
  }
}else if(isset($_POST['coloradoappia'])){;
  if (!in_array('coloradoappia',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='coloradoappia';
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
    <title>Sessão Bebidas</title>
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
        <a href="../../sessoes/bebidas/bebidas.php" class="setoreslinked">Bebidas</a>
        <a href="../../sessoes/carne/carne.php" class="setoreslink">Carnes</a>
        <a href="../../sessoes/frios/frios.php" class="setoreslink">Frios</a>
        <a href="../../sessoes/hortifruti/hortifruti.php" class="setoreslink">Hortifruti</a>
        <a href="../../sessoes/limpeza/limpeza.php" class="setoreslink">Limpeza</a>
      </div>

    <div class="bannerbebida">Bebidas</div>


      <?php
      $precoheineken = "SELECT precoproduto FROM produto WHERE nomeproduto ='heineken';";
      $precoheinekenresultado = mysqli_query($conexao, $precoheineken);
      $precoheinekenarray = mysqli_fetch_assoc($precoheinekenresultado);
      $precobudweiser = "SELECT precoproduto FROM produto WHERE nomeproduto ='budweiser';";
      $precobudweiserresultado = mysqli_query($conexao, $precobudweiser);
      $precobudweiserarray = mysqli_fetch_assoc($precobudweiserresultado);
      $precococacola = "SELECT precoproduto FROM produto WHERE nomeproduto ='cocacola';";
      $precococacolaresultado = mysqli_query($conexao, $precococacola);
      $precococacolaarray = mysqli_fetch_assoc($precococacolaresultado);
      $precostellaartois = "SELECT precoproduto FROM produto WHERE nomeproduto ='stellaartois';";
      $precostellaartoisresultado = mysqli_query($conexao, $precostellaartois);
      $precostellaartoisarray = mysqli_fetch_assoc($precostellaartoisresultado);
      $precoeisenbahn = "SELECT precoproduto FROM produto WHERE nomeproduto ='eisenbahn';";
      $precoeisenbahnresultado = mysqli_query($conexao, $precoeisenbahn);
      $precoeisenbahnarray = mysqli_fetch_assoc($precoeisenbahnresultado);
      $precocoloradoappia = "SELECT precoproduto FROM produto WHERE nomeproduto ='coloradoappia';";
      $precocoloradoappiaresultado = mysqli_query($conexao, $precocoloradoappia);
      $precocoloradoappiaarray = mysqli_fetch_assoc($precocoloradoappiaresultado);

    
    echo '
    <form action="" method="post">
  <div class="container ">
        <div class="row ">
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">HEINEKEN</div>
                    <div class="panel-body "><img src="../../images/heineken.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                                       
                    <div class="panel-footer ">Caixa: R$ '.implode(",",$precoheinekenarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="heineken"> <br> A unidade tem 330ml
                    </div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">BUDWEISER</div>
                    <div class="panel-body "><img src="../../images/budweiser.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Caixa: R$ '.implode(",",$precobudweiserarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="budweiser"> <br> A unidade tem 343ml
                    </div>
                </div>

            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">COCA-COLA</div>
                    <div class="panel-body "><img src="../../images/cocacola.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Caixa: R$ '.implode(",",$precococacolaarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="cocacola"> <br> A unidade tem 350ml
                    </div>
                </div>
            </div>
        </div>
    </div><br>

    <div class="container ">
        <div class="row ">
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; "> STELLA ARTOIS</div>
                    <div class="panel-body "><img src="../../images/stellaartois.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Caixa: R$ '.implode(",",$precostellaartoisarray).' <br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="stellaartois"> <br> A unidade tem 330ml
                    </div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; "> EISENBAHN </div>
                    <div class="panel-body "><img src="../../images/eisenbahn.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Caixa: R$ '.implode(",",$precoeisenbahnarray).'<br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="eisenbahn"> <br> A unidade tem 355 ml</div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading" style="text-align: center; font-size: 25px; ">COLORADO APPIA </div>
                    <div class="panel-body "><img src="../../images/coloradoappia.jpg" class="img-responsive" style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Caixa: R$ '.implode(",",$precocoloradoappiaarray).'<br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="coloradoappia"> <br> A unidade tem 410ml</div>
                </div>
            </div>
        </div>
    </div>
    </form>
    ';
    ?>
    <div class="sessoespag " style="text-align: center; ">
        <ul class="pagination ">
            <li class="active "><a href="../../sessoes/bebidas/bebidas.php">1</a></li>
            <li><a href="../../sessoes/bebidas/bebidas2.php ">2</a></li>
            <li><a href="../../sessoes/bebidas/bebidas3.php ">3</a></li>
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