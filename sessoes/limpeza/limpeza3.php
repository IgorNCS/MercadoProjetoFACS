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


if (isset($_POST['cerastartautobrilho'])) {
  if (!in_array('cerastartautobrilho',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='cerastartautobrilho';
  }
}else if(isset($_POST['detergenteypeclear'])){
  if (!in_array('detergenteypeclear',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='detergenteypeclear';
  }
}else if(isset($_POST['detergentedesengordurantescotchbrite'])){
  if (!in_array('detergentedesengordurantescotchbrite',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='detergentedesengordurantescotchbrite';
  }
}else if(isset($_POST['lustramoveisjasmimpoliflor'])){
  if (!in_array('lustramoveisjasmimpoliflor',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='lustramoveisjasmimpoliflor';
  }
}else if(isset($_POST['difusordeambientecuboalecrimdourado'])){
  if (!in_array('difusordeambientecuboalecrimdourado',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='difusordeambientecuboalecrimdourado';
  }
}else if(isset($_POST['brilhainoxazulim'])){;
  if (!in_array('brilhainoxazulim',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='brilhainoxazulim';
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
          <img class="logo" src="https://www.espacomercado.com.br/images/Logomarca%20arredondada.png" alt="">
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
        <a href="../../sessoes/limpeza/limpeza3.php" class="setoreslinked">Limpeza</a>
      </div>

    <div class="bannerlimpeza">Produtos de Limpeza</div>

    <?php
      $precocerastartautobrilho = "SELECT precoproduto FROM produto WHERE nomeproduto ='cerastartautobrilho';";
      $precocerastartautobrilhoresultado = mysqli_query($conexao, $precocerastartautobrilho);
      $precocerastartautobrilhoarray = mysqli_fetch_assoc($precocerastartautobrilhoresultado);
      $precodetergenteypeclear = "SELECT precoproduto FROM produto WHERE nomeproduto ='detergenteypeclear';";
      $precodetergenteypeclearresultado = mysqli_query($conexao, $precodetergenteypeclear);
      $precodetergenteypecleararray = mysqli_fetch_assoc($precodetergenteypeclearresultado);
      $precodetergentedesengordurantescotchbrite = "SELECT precoproduto FROM produto WHERE nomeproduto ='detergentedesengordurantescotchbrite';";
      $precodetergentedesengordurantescotchbriteresultado = mysqli_query($conexao, $precodetergentedesengordurantescotchbrite);
      $precodetergentedesengordurantescotchbritearray = mysqli_fetch_assoc($precodetergentedesengordurantescotchbriteresultado);
      $precolustramoveisjasmimpoliflor = "SELECT precoproduto FROM produto WHERE nomeproduto ='lustramoveisjasmimpoliflor';";
      $precolustramoveisjasmimpoliflorresultado = mysqli_query($conexao, $precolustramoveisjasmimpoliflor);
      $precolustramoveisjasmimpoliflorarray = mysqli_fetch_assoc($precolustramoveisjasmimpoliflorresultado);
      $precodifusordeambientecuboalecrimdourado = "SELECT precoproduto FROM produto WHERE nomeproduto ='difusordeambientecuboalecrimdourado';";
      $precodifusordeambientecuboalecrimdouradoresultado = mysqli_query($conexao, $precodifusordeambientecuboalecrimdourado);
      $precodifusordeambientecuboalecrimdouradoarray = mysqli_fetch_assoc($precodifusordeambientecuboalecrimdouradoresultado);
      $precobrilhainoxazulim = "SELECT precoproduto FROM produto WHERE nomeproduto ='brilhainoxazulim';";
      $precobrilhainoxazulimresultado = mysqli_query($conexao, $precobrilhainoxazulim);
      $precobrilhainoxazulimarray = mysqli_fetch_assoc($precobrilhainoxazulimresultado);

    
    echo '
<form action="" method="post">

    <div class="container ">
        <div class="row ">
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">CERA START AUTO BRILHO</div>
                    <div class="panel-body "><img src="../../images/cerastartautobrilho.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Por: R$'.implode(",",$precocerastartautobrilhoarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="cerastartautobrilho"> <br>A unidade contém 5L
                    </div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">DETERGENTE YPÊ CLEAR</div>
                    <div class="panel-body "><img src="../../images/detergenteypeclear.jpg" class="img-responsive " style="width:100%; height: 362px; " alt="Image "></div>
                    <div class="panel-footer ">POR: R$'.implode(",",$precodetergenteypecleararray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="detergenteypeclear"> <br>A unidade contém 500ml
                    </div>
                </div>

            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px;">DETERGENTE DESENGORDURANTE SCOTCH BRITE</div>
                    <div class="panel-body "><img src="../../images/detergentedesengordurantescotchbrite.jpg" class="img-responsive " style="width:100%; height: 293px; " alt="Image "></div>
                    <div class="panel-footer ">Por: R$'.implode(",",$precodetergentedesengordurantescotchbritearray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="detergentedesengordurantescotchbrite"> <br>A unidade contém 5L
                    </div>
                </div>
            </div>
        </div>
    </div><br>

    <div class="container ">
        <div class="row ">
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">LUSTRA MÓVEIS JASMIM POLIFLOR</div>
                    <div class="panel-body "><img src="../../images/lustramoveisjasmimpoliflor.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                    <div class="panel-footer ">Por: R$'.implode(",",$precolustramoveisjasmimpoliflorarray).' <br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="lustramoveisjasmimpoliflor"> <br>A unidade contém 500ml
                    </div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">DIFUSOR DE AMBIENTE CUBO ALECRIM DOURADO - GIULIANA HOME</div>
                    <div class="panel-body "><img src="../../images/difusordeambientecuboalecrimdourado.jpg" class="img-responsive " style="width:100%; height: 274px " alt="Image "></div>
                    <div class="panel-footer ">POR: R$'.implode(",",$precodifusordeambientecuboalecrimdouradoarray).'<br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="difusordeambientecuboalecrimdourado"> <br> A unidade tem aproximadamente 400g
                        <BR>A unidade contém 350ml</BR>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 ">
                <div class="panel panel-danger ">
                    <div class="panel-heading " style="text-align: center; font-size: 25px; ">BRILHA INOX AZULIM</div>
                    <div class="panel-body "><img src="../../images/brilhainoxazulim.jpg" class="img-responsive " style="width:100%; height: 364px " alt="Image "></div>
                    <div class="panel-footer ">Por: R$'.implode(",",$precobrilhainoxazulimarray).'<br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="brilhainoxazulim"> <br>A unidade contém 500ml <br> </div>
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
            <li><a href="../../sessoes/limpeza/limpeza2.php ">2</a></li>
            <li class="active"><a href="../../sessoes/limpeza/limpeza3.php">3</a></li>
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