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


if (isset($_POST['queijoreinobola'])) {
  if (!in_array('queijoreinobola',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='queijoreinobola';
  }
}else if(isset($_POST['presuntofatiado'])){
  if (!in_array('presuntofatiado',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='presuntofatiado';
  }
}else if(isset($_POST['manteigacotoches'])){
  if (!in_array('manteigacotoches',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='manteigacotoches';
  }
}else if(isset($_POST['mortadelamistasadia'])){
  if (!in_array('mortadelamistasadia',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='mortadelamistasadia';
  }
}else if(isset($_POST['leiteitambenaturalmilkintegral'])){
  if (!in_array('leiteitambenaturalmilkintegral',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='leiteitambenaturalmilkintegral';
  }
}else if(isset($_POST['requeijaocremosopolenghicheddar'])){;
  if (!in_array('requeijaocremosopolenghicheddar',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='requeijaocremosopolenghicheddar';
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
        <a href="../../sessoes/frios/frios.php" class="setoreslinked">Frios</a>
        <a href="../../sessoes/hortifruti/hortifruti.php" class="setoreslink">Hortifruti</a>
        <a href="../../sessoes/limpeza/limpeza.php" class="setoreslink">Limpeza</a>
      </div>

    <div class="bannerfrios">frios</div>

    <?php
      $precoqueijoreinobola = "SELECT precoproduto FROM produto WHERE nomeproduto ='queijoreinobola';";
      $precoqueijoreinobolaresultado = mysqli_query($conexao, $precoqueijoreinobola);
      $precoqueijoreinobolaarray = mysqli_fetch_assoc($precoqueijoreinobolaresultado);
      $precopresuntofatiado = "SELECT precoproduto FROM produto WHERE nomeproduto ='presuntofatiado';";
      $precopresuntofatiadoresultado = mysqli_query($conexao, $precopresuntofatiado);
      $precopresuntofatiadoarray = mysqli_fetch_assoc($precopresuntofatiadoresultado);
      $precomanteigacotoches = "SELECT precoproduto FROM produto WHERE nomeproduto ='manteigacotoches';";
      $precomanteigacotochesresultado = mysqli_query($conexao, $precomanteigacotoches);
      $precomanteigacotochesarray = mysqli_fetch_assoc($precomanteigacotochesresultado);
      $precomortadelamistasadia = "SELECT precoproduto FROM produto WHERE nomeproduto ='mortadelamistasadia';";
      $precomortadelamistasadiaresultado = mysqli_query($conexao, $precomortadelamistasadia);
      $precomortadelamistasadiaarray = mysqli_fetch_assoc($precomortadelamistasadiaresultado);
      $precoleiteitambenaturalmilkintegral = "SELECT precoproduto FROM produto WHERE nomeproduto ='leiteitambenaturalmilkintegral';";
      $precoleiteitambenaturalmilkintegralresultado = mysqli_query($conexao, $precoleiteitambenaturalmilkintegral);
      $precoleiteitambenaturalmilkintegralarray = mysqli_fetch_assoc($precoleiteitambenaturalmilkintegralresultado);
      $precorequeijaocremosopolenghicheddar = "SELECT precoproduto FROM produto WHERE nomeproduto ='requeijaocremosopolenghicheddar';";
      $precorequeijaocremosopolenghicheddarresultado = mysqli_query($conexao, $precorequeijaocremosopolenghicheddar);
      $precorequeijaocremosopolenghicheddararray = mysqli_fetch_assoc($precorequeijaocremosopolenghicheddarresultado);

    
    echo '
<form action="" method="post">

    <div class="container ">
        <div class="row ">
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">QUEIJO REINO BOLA (1/4)</div>
                    <div class="panel-body "><img src="../../images/queijoreinobola.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Preço por: R$'.implode(",",$precoqueijoreinobolaarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="queijoreinobola"> <br> A unidade contém aproximadamente: 450g
                    </div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">PRESUNTO FATIADO</div>
                    <div class="panel-body "><img src="../../images/presuntofatiado.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Preço por: R$'.implode(",",$precopresuntofatiadoarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="presuntofatiado"> <br> A unidade contém aproximadamente: 180 g 
                    </div>
                </div>

            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px;">MANTEIGA COTOCHÉS 
                   </div>
                    <div class="panel-body "><img src="../../images/manteigacotoches.jpg" class="img-responsive " style="width:100%; " alt="Image "></div>
                    <div class="panel-footer ">Preço: R$'.implode(",",$precomanteigacotochesarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="manteigacotoches"> <br> Contém por unidade aproximadamente: 500g
                    </div>
                </div>
            </div>
        </div>
    </div><br>

    <div class="container ">
        <div class="row ">
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">MORTADELA MISTA SADIA
                    </div>
                    <div class="panel-body "><img src="../../images/mortadelamistasadia.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Preço por pacote: R$'.implode(",",$precomortadelamistasadiaarray).' <br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="mortadelamistasadia"> <br> Contém por unidade aproximadamente: 400g
                    </div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">LEITE ITAMBÉ NATURAL MILK INTEGRAL                   </div>
                    <div class="panel-body "><img src="../../images/leiteitambenaturalmilkintegral.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Preço por quilo: R$'.implode(",",$precoleiteitambenaturalmilkintegralarray).'<br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="leiteitambenaturalmilkintegral"> <br> Contém: 1 litro Cada</div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">REQUEIJÃO CREMOSO POLENGHI CHEDDAR
                    </div>
                    <div class="panel-body "><img src="../../images/requeijaocremosopolenghicheddar.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Preço por pacote : R$'.implode(",",$precorequeijaocremosopolenghicheddararray).'<br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="requeijaocremosopolenghicheddar"> <br> Cada unidade contém: 200g</div>
                </div>
            </div>
        </div>
    </div>

    </form>
    ';
    ?>

    <div class="sessoespag " style="text-align: center; ">
        <ul class="pagination ">
            <li class="active"><a href="../../sessoes/frios/frios.php">1</a></li>
            <li><a href="../../sessoes/frios/frios2.php ">2</a></li>
            <li><a href="../../sessoes/frios/frios3.php ">3</a></li>
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