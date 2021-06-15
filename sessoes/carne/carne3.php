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


if (isset($_POST['filedetilapiacopacol'])) {
  if (!in_array('filedetilapiacopacol',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='filedetilapiacopacol';
  }
}else if(isset($_POST['filedemerluzaswift'])){
  if (!in_array('filedemerluzaswift',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='filedemerluzaswift';
  }
}else if(isset($_POST['lombodebacalhau'])){
  if (!in_array('lombodebacalhau',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='lombodebacalhau';
  }
}else if(isset($_POST['salmaoempedacos'])){
  if (!in_array('salmaoempedacos',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='salmaoempedacos';
  }
}else if(isset($_POST['filedetilapiaaurora'])){
  if (!in_array('filedetilapiaaurora',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='filedetilapiaaurora';
  }
}else if(isset($_POST['sardinhacomoleo'])){;
  if (!in_array('sardinhacomoleo',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='sardinhacomoleo';
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
        <a href="../../sessoes/carne/carne3.php" class="setoreslinked">Carnes</a>
        <a href="../../sessoes/frios/frios.php" class="setoreslink">Frios</a>
        <a href="../../sessoes/hortifruti/hortifruti.php" class="setoreslink">Hortifruti</a>
        <a href="../../sessoes/limpeza/limpeza.php" class="setoreslink">Limpeza</a>
      </div>

    <div class="bannercarne">Carnes e peixes</div>

    <?php
      $precofiledetilapiacopacol = "SELECT precoproduto FROM produto WHERE nomeproduto ='filedetilapiacopacol';";
      $precofiledetilapiacopacolresultado = mysqli_query($conexao, $precofiledetilapiacopacol);
      $precofiledetilapiacopacolarray = mysqli_fetch_assoc($precofiledetilapiacopacolresultado);
      $precofiledemerluzaswift = "SELECT precoproduto FROM produto WHERE nomeproduto ='filedemerluzaswift';";
      $precofiledemerluzaswiftresultado = mysqli_query($conexao, $precofiledemerluzaswift);
      $precofiledemerluzaswiftarray = mysqli_fetch_assoc($precofiledemerluzaswiftresultado);
      $precolombodebacalhau = "SELECT precoproduto FROM produto WHERE nomeproduto ='lombodebacalhau';";
      $precolombodebacalhauresultado = mysqli_query($conexao, $precolombodebacalhau);
      $precolombodebacalhauarray = mysqli_fetch_assoc($precolombodebacalhauresultado);
      $precosalmaoempedacos = "SELECT precoproduto FROM produto WHERE nomeproduto ='salmaoempedacos';";
      $precosalmaoempedacosresultado = mysqli_query($conexao, $precosalmaoempedacos);
      $precosalmaoempedacosarray = mysqli_fetch_assoc($precosalmaoempedacosresultado);
      $precofiledetilapiaaurora = "SELECT precoproduto FROM produto WHERE nomeproduto ='filedetilapiaaurora';";
      $precofiledetilapiaauroraresultado = mysqli_query($conexao, $precofiledetilapiaaurora);
      $precofiledetilapiaauroraarray = mysqli_fetch_assoc($precofiledetilapiaauroraresultado);
      $precosardinhacomoleo = "SELECT precoproduto FROM produto WHERE nomeproduto ='sardinhacomoleo';";
      $precosardinhacomoleoresultado = mysqli_query($conexao, $precosardinhacomoleo);
      $precosardinhacomoleoarray = mysqli_fetch_assoc($precosardinhacomoleoresultado);

    
    echo '
<form action="" method="post">

    <div class="container ">
        <div class="row ">
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">FILÉ DE TILÁPIA COPACOL</div>
                    <div class="panel-body "><img src="../../images/filedetilapiacopacol.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Preço por pacote: R$'.implode(",",$precofiledetilapiacopacolarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="filedetilapiacopacol"> <br> O pacote tem 800g
                    </div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">FILÉ DE MERLUZA SWIFT</div>
                    <div class="panel-body "><img src="../../images/filedemerluzaswift.jpg" class="img-responsive " style="width:100%; height: 327px; " alt="Image "></div>
                    <div class="panel-footer ">Preço por pacote: R$'.implode(",",$precofiledemerluzaswiftarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="filedemerluzaswift"> <br>A unidade tem aproximadamente 1000g
                    </div>
                </div>

            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px;">LOMBO DE BACALHAU</div>
                    <div class="panel-body "><img src="../../images/lombodebacalhau.jpg" class="img-responsive " style="width:100%; height: 325px; " alt="Image "></div>
                    <div class="panel-footer ">Preço por pacote: R$'.implode(",",$precolombodebacalhauarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="lombodebacalhau"> <br> A unidade tem aproximadamente 1000g
                    </div>
                </div>
            </div>
        </div>
    </div><br>

    <div class="container ">
        <div class="row ">
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">SALMÃO EM PEDAÇOS</div>
                    <div class="panel-body "><img src="../../images/salmaoempedacos.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Preço por pacote: R$'.implode(",",$precosalmaoempedacosarray).' <br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="salmaoempedacos"> <br> O pacote tem 500g
                    </div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">FILÉ DE TILÁPIA AURORA</div>
                    <div class="panel-body "><img src="../../images/filedetilapiaaurora.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Preço por pacote: R$'.implode(",",$precofiledetilapiaauroraarray).'<br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="filedetilapiaaurora"> <br> A unidade tem aproximadamente 400g
                        </BR>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">SARDINHA COM ÓLEO</div>
                    <div class="panel-body "><img src="../../images/sardinhacomoleo.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Preço por pacote: R$'.implode(",",$precosardinhacomoleoarray).'<br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="sardinhacomoleo"> <br> A unidade tem aproximadamente 125g <br></div>
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
            <li><a href="../../sessoes/carne/carne2.php ">2</a></li>
            <li class="active"><a href="../../sessoes/carne/carne3.php ">3</a></li>
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