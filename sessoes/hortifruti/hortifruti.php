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
}else if(isset($_POST['bananaprata'])){
  if (!in_array('bananaprata',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='bananaprata';
  }
}else if(isset($_POST['limao'])){
  if (!in_array('limao',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='limao';
  }
}else if(isset($_POST['bananadaterra'])){
  if (!in_array('bananadaterra',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='bananadaterra';
  }
}else if(isset($_POST['maracuja'])){
  if (!in_array('maracuja',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='maracuja';
  }
}else if(isset($_POST['mamaoformosa'])){;
  if (!in_array('mamaoformosa',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='mamaoformosa';
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
        <a href="../../sessoes/hortifruti/hortifruti.php" class="setoreslinked">Hortifruti</a>
        <a href="../../sessoes/limpeza/limpeza.php" class="setoreslink">Limpeza</a>
      </div>

    <div class="hortifrutibanner">Hortifruti</div>
    <?php
      $precotomates = "SELECT precoproduto FROM produto WHERE nomeproduto ='tomates';";
      $precotomatesresultado = mysqli_query($conexao, $precotomates);
      $precotomatesarray = mysqli_fetch_assoc($precotomatesresultado);
      $precobananaprata = "SELECT precoproduto FROM produto WHERE nomeproduto ='bananaprata';";
      $precobananaprataresultado = mysqli_query($conexao, $precobananaprata);
      $precobananaprataarray = mysqli_fetch_assoc($precobananaprataresultado);
      $precolimao = "SELECT precoproduto FROM produto WHERE nomeproduto ='limao';";
      $precolimaoresultado = mysqli_query($conexao, $precolimao);
      $precolimaoarray = mysqli_fetch_assoc($precolimaoresultado);
      $precobananadaterra = "SELECT precoproduto FROM produto WHERE nomeproduto ='bananadaterra';";
      $precobananadaterraresultado = mysqli_query($conexao, $precobananadaterra);
      $precobananadaterraarray = mysqli_fetch_assoc($precobananadaterraresultado);
      $precomaracuja = "SELECT precoproduto FROM produto WHERE nomeproduto ='maracuja';";
      $precomaracujaresultado = mysqli_query($conexao, $precomaracuja);
      $precomaracujaarray = mysqli_fetch_assoc($precomaracujaresultado);
      $precomamaoformosa = "SELECT precoproduto FROM produto WHERE nomeproduto ='mamaoformosa';";
      $precomamaoformosaresultado = mysqli_query($conexao, $precomamaoformosa);
      $precomamaoformosaarray = mysqli_fetch_assoc($precomamaoformosaresultado);

    
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
                    <div class="panel-heading "style="text-align: center;">BANANA PRATA</div>
                    <div class="panel-body "><img src="../../images/bananaprata.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Unidade: R$'.implode(",",$precobananaprataarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="bananaprata"> <br>A unidade tem aproximadamente 190g
                    </div>
                </div>

            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; ">LIMÃO</div>
                    <div class="panel-body "><img src="../../images/limao.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Unidade: R$'.implode(",",$precolimaoarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="limao"> <br> A unidade tem aproximadamente 100g
                    </div>
                </div>
            </div>
        </div>
    </div><br>

    <div class="container ">
        <div class="row ">
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading "style="text-align: center;">BANANA DA TERRA</div>
                    <div class="panel-body "><img src="../../images/bananadaterra.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Unidade: R$'.implode(",",$precobananadaterraarray).' <br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="bananadaterra"><br>                        
                        A unidade tem aproximadamente 210g
                    </div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading "style="text-align: center;">MARACUJÁ</div>
                    <div class="panel-body "><img src="../../images/maracuja.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Unidade: R$'.implode(",",$precomaracujaarray).'<br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="maracuja">> <br>  
                         A unidade tem aproximadamente 170g</div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading"style="text-align: center;">MAMÃO FORMOSA</div>
                    <div class="panel-body "><img src="../../images/mamaoformosa.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Unidade: R$'.implode(",",$precomamaoformosaarray).'<br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="mamaoformosa"><br> A unidade tem aproximadamente 1700g</div>
                </div>
            </div>
        </div>
    </div>
    </form>
    ';
    ?>

    <div class="sessoespag " style="text-align: center; ">
        <ul class="pagination ">
            <li class="active"><a href="../../sessoes/hortifruti/hortifruti.php">1</a></li>
            <li><a href="../../sessoes/hortifruti/hortifruti2.php ">2</a></li>
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