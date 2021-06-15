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


if (isset($_POST['filemignon'])) {
  if (!in_array('filemignon',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='filemignon';
  }
}else if(isset($_POST['coxaesobrecoxaaurora'])){
  if (!in_array('coxaesobrecoxaaurora',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='coxaesobrecoxaaurora';
  }
}else if(isset($_POST['rabosuinoqualita'])){
  if (!in_array('rabosuinoqualita',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='rabosuinoqualita';
  }
}else if(isset($_POST['filedecosta'])){
  if (!in_array('filedecosta',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='filedecosta';
  }
}else if(isset($_POST['acemcomosso'])){
  if (!in_array('acemcomosso',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='acemcomosso';
  }
}else if(isset($_POST['cupimmaturatta'])){;
  if (!in_array('cupimmaturatta',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='cupimmaturatta';
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
    <title>Sessão Carnes</title>
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
        <a href="../../sessoes/carne/carne2.php" class="setoreslinked">Carnes</a>
        <a href="../../sessoes/frios/frios.php" class="setoreslink">Frios</a>
        <a href="../../sessoes/hortifruti/hortifruti.php" class="setoreslink">Hortifruti</a>
        <a href="../../sessoes/limpeza/limpeza.php" class="setoreslink">Limpeza</a>
      </div>

    <div class="bannercarne">Carnes e peixes</div>
    <?php
      $precofilemignon = "SELECT precoproduto FROM produto WHERE nomeproduto ='filemignon';";
      $precofilemignonresultado = mysqli_query($conexao, $precofilemignon);
      $precofilemignonarray = mysqli_fetch_assoc($precofilemignonresultado);
      $precocoxaesobrecoxaaurora = "SELECT precoproduto FROM produto WHERE nomeproduto ='coxaesobrecoxaaurora';";
      $precocoxaesobrecoxaauroraresultado = mysqli_query($conexao, $precocoxaesobrecoxaaurora);
      $precocoxaesobrecoxaauroraarray = mysqli_fetch_assoc($precocoxaesobrecoxaauroraresultado);
      $precorabosuinoqualita = "SELECT precoproduto FROM produto WHERE nomeproduto ='rabosuinoqualita';";
      $precorabosuinoqualitaresultado = mysqli_query($conexao, $precorabosuinoqualita);
      $precorabosuinoqualitaarray = mysqli_fetch_assoc($precorabosuinoqualitaresultado);
      $precofiledecosta = "SELECT precoproduto FROM produto WHERE nomeproduto ='filedecosta';";
      $precofiledecostaresultado = mysqli_query($conexao, $precofiledecosta);
      $precofiledecostaarray = mysqli_fetch_assoc($precofiledecostaresultado);
      $precoacemcomosso = "SELECT precoproduto FROM produto WHERE nomeproduto ='acemcomosso';";
      $precoacemcomossoresultado = mysqli_query($conexao, $precoacemcomosso);
      $precoacemcomossoarray = mysqli_fetch_assoc($precoacemcomossoresultado);
      $precocupimmaturatta = "SELECT precoproduto FROM produto WHERE nomeproduto ='cupimmaturatta';";
      $precocupimmaturattaresultado = mysqli_query($conexao, $precocupimmaturatta);
      $precocupimmaturattaarray = mysqli_fetch_assoc($precocupimmaturattaresultado);

    
    echo '
<form action="" method="post">

    <div class="container ">
        <div class="row ">
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">FILÉ MIGNON</div>
                    <div class="panel-body "><img src="../../images/filemignon.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Preço por quilo: R$'.implode(",",$precofilemignonarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="filemignon"> <br> Vendemos a partir de 500g
                    </div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">COXA E SOBRECOXA AURORA</div>
                    <div class="panel-body "><img src="../../images/coxaesobrecoxaaurora.jpg" class="img-responsive " style="width:100%; height: 294px; " alt="Image "></div>
                    <div class="panel-footer ">Preço por pacote: R$'.implode(",",$precocoxaesobrecoxaauroraarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="coxaesobrecoxaaurora"> <br>Cada pacote tem 1000g
                    </div>
                </div>

            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px;">RABO SUÍNO QUALITÁ</div>
                    <div class="panel-body "><img src="../../images/rabosuinoqualita.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Preço por pacote: R$'.implode(",",$precorabosuinoqualitaarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="rabosuinoqualita"> <br> Cada pacote tem 300g
                    </div>
                </div>
            </div>
        </div>
    </div><br>

    <div class="container ">
        <div class="row ">
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">FILÉ DE COSTELA</div>
                    <div class="panel-body "><img src="../../images/filedecosta.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Preço por quilo: R$'.implode(",",$precofiledecostaarray).' <br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="filedecosta"> <br> Vendemos a partir de 500g
                    </div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">ACEM C/ OSSO</div>
                    <div class="panel-body "><img src="../../images/acemcomosso.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Preço por quilo: R$'.implode(",",$precoacemcomossoarray).'<br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="acemcomosso"> <br> Vendemos a partir de 500g</div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">CUPIM MATURATTA</div>
                    <div class="panel-body "><img src="../../images/cupimmaturatta.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Preço por pacote: R$'.implode(",",$precocupimmaturattaarray).'<br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="cupimmaturatta"> <br> A unidade tem aproximadamente 1800g</div>
                </div>
            </div>
        </div>
    </div>
    </form>
    ';
    ?>
    <div class="sessoespag " style="text-align: center; ">
        <ul class="pagination ">
            <li><a href="../../sessoes/carne/carne1.php">1</a></li>
            <li class="active"><a href="../../sessoes/carne/carne2.php ">2</a></li>
            <li><a href="../../sessoes/carne/carne3.php ">3</a></li>
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