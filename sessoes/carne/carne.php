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


if (isset($_POST['coxadaasasadia'])) {
  if (!in_array('coxadaasasadia',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='coxadaasasadia';
  }
}else if(isset($_POST['maminha'])){
  if (!in_array('maminha',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='maminha';
  }
}else if(isset($_POST['alcatrabestbeef'])){
  if (!in_array('alcatrabestbeef',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='alcatrabestbeef';
  }
}else if(isset($_POST['calabresaaurora'])){
  if (!in_array('calabresaaurora',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='calabresaaurora';
  }
}else if(isset($_POST['picanha'])){
  if (!in_array('picanha',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='picanha';
  }
}else if(isset($_POST['coracaodegalinha'])){;
  if (!in_array('coracaodegalinha',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='coracaodegalinha';
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
        <a href="../../sessoes/carne/carne.php" class="setoreslinked">Carnes</a>
        <a href="../../sessoes/frios/frios.php" class="setoreslink">Frios</a>
        <a href="../../sessoes/hortifruti/hortifruti.php" class="setoreslink">Hortifruti</a>
        <a href="../../sessoes/limpeza/limpeza.php" class="setoreslink">Limpeza</a>
      </div>

    <div class="bannercarne">Carnes e peixes</div>

    <?php
      $precocoxadaasasadia = "SELECT precoproduto FROM produto WHERE nomeproduto ='coxadaasasadia';";
      $precocoxadaasasadiaresultado = mysqli_query($conexao, $precocoxadaasasadia);
      $precocoxadaasasadiaarray = mysqli_fetch_assoc($precocoxadaasasadiaresultado);
      $precomaminha = "SELECT precoproduto FROM produto WHERE nomeproduto ='maminha';";
      $precomaminharesultado = mysqli_query($conexao, $precomaminha);
      $precomaminhaarray = mysqli_fetch_assoc($precomaminharesultado);
      $precoalcatrabestbeef = "SELECT precoproduto FROM produto WHERE nomeproduto ='alcatrabestbeef';";
      $precoalcatrabestbeefresultado = mysqli_query($conexao, $precoalcatrabestbeef);
      $precoalcatrabestbeefarray = mysqli_fetch_assoc($precoalcatrabestbeefresultado);
      $precocalabresaaurora = "SELECT precoproduto FROM produto WHERE nomeproduto ='calabresaaurora';";
      $precocalabresaauroraresultado = mysqli_query($conexao, $precocalabresaaurora);
      $precocalabresaauroraarray = mysqli_fetch_assoc($precocalabresaauroraresultado);
      $precopicanha = "SELECT precoproduto FROM produto WHERE nomeproduto ='picanha';";
      $precopicanharesultado = mysqli_query($conexao, $precopicanha);
      $precopicanhaarray = mysqli_fetch_assoc($precopicanharesultado);
      $precocoracaodegalinha = "SELECT precoproduto FROM produto WHERE nomeproduto ='coracaodegalinha';";
      $precocoracaodegalinharesultado = mysqli_query($conexao, $precocoracaodegalinha);
      $precocoracaodegalinhaarray = mysqli_fetch_assoc($precocoracaodegalinharesultado);

    
    echo '
<form action="" method="post">
    <div class="container ">
        <div class="row ">
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">COXA DA ASA SADIA</div>
                    <div class="panel-body "><img src="../../images/coxadaasasadia.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Preço por Unidade: R$'.implode(",",$precocoxadaasasadiaarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="coxadaasasadia"> <br> A unidade tem 1000g
                    </div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">MAMINHA</div>
                    <div class="panel-body "><img src="../../images/maminha.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Preço por quilo: R$'.implode(",",$precomaminhaarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="maminha"> <br> Vendemos a partir de 500g
                    </div>
                </div>

            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px;">ALCATRA BEST BEEF</div>
                    <div class="panel-body "><img src="../../images/alcatrabestbeef.jpg" class="img-responsive " style="width:100%; " alt="Image "></div>
                    <div class="panel-footer ">Unidade: R$'.implode(",",$precoalcatrabestbeefarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="alcatrabestbeef"> <br> Vendemos a partir de 500g
                    </div>
                </div>
            </div>
        </div>
    </div><br>

    <div class="container ">
        <div class="row ">
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">CALABRESA AURORA</div>
                    <div class="panel-body "><img src="../../images/calabresaaurora.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Preço por pacote: R$'.implode(",",$precocalabresaauroraarray).' <br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="calabresaaurora"> <br> Cada pacote tem 2500g
                    </div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">PICANHA</div>
                    <div class="panel-body "><img src="../../images/picanha.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Preço por quilo: R$'.implode(",",$precopicanhaarray).'<br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="picanha"> <br>Vendemos a partir de 500g</div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">CORAÇÃO DE GALINHA</div>
                    <div class="panel-body "><img src="../../images/coracaodegalinha.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Preço por pacote : R$'.implode(",",$precocoracaodegalinhaarray).'<br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="coracaodegalinha"> <br> O pacote tem 1000g</div>
                </div>
            </div>
        </div>
    </div>

    </form>
    ';
    ?>
    <div class="sessoespag " style="text-align: center; ">
        <ul class="pagination ">
            <li class="active "><a href="../../sessoes/carne/carne.php">1</a></li>
            <li><a href="../../sessoes/carne/carne2.php ">2</a></li>
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