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


if (isset($_POST['tomates'])) {
  if (!in_array('tomates',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='tomates';
  }
}else if(isset($_POST['couveflor'])){
  if (!in_array('couveflor',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='couveflor';
  }
}else if(isset($_POST['alface'])){
  if (!in_array('alface',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='alface';
  }
}else if(isset($_POST['batatainglesa'])){
  if (!in_array('batatainglesa',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='batatainglesa';
  }
}else if(isset($_POST['cebolabranca'])){
  if (!in_array('cebolabranca',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='cebolabranca';
  }
}else if(isset($_POST['cenoura'])){;
  if (!in_array('cenoura',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='cenoura';
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
    <title>Sessão Hortifruti</title>
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
        <a href="../../sessoes/hortifruti/hortifruti2.php" class="setoreslinked">Hortifruti</a>
        <a href="../../sessoes/limpeza/limpeza.php" class="setoreslink">Limpeza</a>
      </div>

    <div class="hortifrutibanner">Hortifruti</div>

    <?php
      $precotomates = "SELECT precoproduto FROM produto WHERE nomeproduto ='tomates';";
      $precotomatesresultado = mysqli_query($conexao, $precotomates);
      $precotomatesarray = mysqli_fetch_assoc($precotomatesresultado);
      $precocouveflor = "SELECT precoproduto FROM produto WHERE nomeproduto ='couveflor';";
      $precocouveflorresultado = mysqli_query($conexao, $precocouveflor);
      $precocouveflorarray = mysqli_fetch_assoc($precocouveflorresultado);
      $precoalface = "SELECT precoproduto FROM produto WHERE nomeproduto ='alface';";
      $precoalfaceresultado = mysqli_query($conexao, $precoalface);
      $precoalfacearray = mysqli_fetch_assoc($precoalfaceresultado);
      $precobatatainglesa = "SELECT precoproduto FROM produto WHERE nomeproduto ='batatainglesa';";
      $precobatatainglesaresultado = mysqli_query($conexao, $precobatatainglesa);
      $precobatatainglesaarray = mysqli_fetch_assoc($precobatatainglesaresultado);
      $precocebolabranca = "SELECT precoproduto FROM produto WHERE nomeproduto ='cebolabranca';";
      $precocebolabrancaresultado = mysqli_query($conexao, $precocebolabranca);
      $precocebolabrancaarray = mysqli_fetch_assoc($precocebolabrancaresultado);
      $precocenoura = "SELECT precoproduto FROM produto WHERE nomeproduto ='cenoura';";
      $precocenouraresultado = mysqli_query($conexao, $precocenoura);
      $precocenouraarray = mysqli_fetch_assoc($precocenouraresultado);

    
    echo '
<form action="" method="post">

    <div class="container ">
        <div class="row ">
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; ">TOMATES</div>
                    <div class="panel-body "><img src="../../images/tomates.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Unidade: R$'.implode(",",$precotomatesarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="tomates"> <br> A unidade tem aproximadamente 190g
                    </div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading "style="text-align: center;">COUVE-FLOR</div>
                    <div class="panel-body "><img src="../../images/couveflor.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">R$:'.implode(",",$precocouveflorarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="couveflor"> <br>A undiade tem aproximadamente 750g
                    </div>
                </div>

            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; ">ALFACE</div>
                    <div class="panel-body "><img src="../../images/alface.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Unidade: R$
                    '.implode(",",$precoalfacearray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="alface"> <br> A unidade tem aproximadamente 100g
                    </div>
                </div>
            </div>
        </div>
    </div><br>

    <div class="container ">
        <div class="row ">
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading "style="text-align: center;">BATATA INGLESA</div>
                    <div class="panel-body "><img src="../../images/batatainglesa.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Unidade: R$'.implode(",",$precobatatainglesaarray).' <br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="batatainglesa"> <br> A unidade tem aproximadamente 200g
                    </div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading "style="text-align: center;">CEBOLA BRANCA</div>
                    <div class="panel-body "><img src="../../images/cebolabranca.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Unidade: R$'.implode(",",$precocebolabrancaarray).'<br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="cebolabranca"> <br> A unidade tem aproximadamente 140g</div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading"style="text-align: center;">Cenoura</div>
                    <div class="panel-body "><img src="../../images/cenoura.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Unidade: R$ 1'.implode(",",$precocenouraarray).'<br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="cenoura"> <br> A unidade tem aproximadamente 240g</div>
                </div>
            </div>
        </div>
    </div>
   </form>
    ';
    ?>

    <div class="sessoespag " style="text-align: center; ">
        <ul class="pagination ">
            <li><a href="../../sessoes/hortifruti/hortifruti.php">1</a></li>
            <li class="active"><a href="../../sessoes/hortifruti/hortifruti2.php ">2</a></li>
            <li><a href="../../sessoes/hortifruti/hortifruti3.php">3</a></li>
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