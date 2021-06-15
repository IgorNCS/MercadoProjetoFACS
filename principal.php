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


if (isset($_POST['limaosiciliano'])) {
  if (!in_array('limaosiciliano',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='limaosiciliano';
  }
}else if(isset($_POST['heineken'])){
  if (!in_array('heineken',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='heineken';
  }
}else if(isset($_POST['alcatrabestbeef'])){
  if (!in_array('alcatrabestbeef',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='alcatrabestbeef';
  }
}else if(isset($_POST['odorizadoraerosollavanda'])){
  if (!in_array('odorizadoraerosollavanda',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='odorizadoraerosollavanda';
  }
}else if(isset($_POST['whiskyoldparr'])){
  if (!in_array('whiskyoldparr',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='whiskyoldparr';
  }
}else if(isset($_POST['panodelimpeza'])){;
  if (!in_array('panodelimpeza',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='panodelimpeza';
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercadin</title>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>






    
    <link rel="stylesheet" href="style.css">
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Train+One&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
    
    <style>
      



    </style>

</head>
<body>

  <header>
    <div class="header1">
      <a href="principal.php">
      <img class="logo" src="https://www.siesesp.org.br/img/Compra-certa-gd.png" alt="">
    </a>
    </div>
    <div class="header2">
      <p class="searchtop">Encontre aqui o produto que você procura... </p>
    </div>

    <div class="header3">
      <form method="post">
      <input type="submit" class="limparcarrinho" value="Limpar" name="limparcarrinho">
      </form>
      <a href="carrinho.php"class="shopcart">
        <img class="shopcart" src="https://image.flaticon.com/icons/png/512/126/126510.png" alt="Meu carrinho">
        Carrinho
      </a>
      
 
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




      <a href="RegisterClient.php" class="register" >Login
      /
      Registrar</a>
    </div>

  </header>
  
  <div class="setores">
        <a href="sessoes/bebidas/bebidas.php" class="setoreslink">Bebidas</a>
        <a href="sessoes/carne/carne.php" class="setoreslink">Carnes</a>
        <a href="sessoes/frios/frios.php" class="setoreslink">Frios</a>
        <a href="sessoes/hortifruti/hortifruti.php" class="setoreslink">Hortifruti</a>
        <a href="sessoes/limpeza/limpeza.php" class="setoreslink">Limpeza</a>
      </div>

<div class="carousel">
  <div id="demo" class="carousel slide" data-ride="carousel">
    <ul class="carousel-indicators">
      <li data-target="#demo" data-slide-to="0" class="active"></li>
      <li data-target="#demo" data-slide-to="1"></li>
      <li data-target="#demo" data-slide-to="2"></li>
    </ul>
    <div class="carousel-inner">
      <!-- <img src="./images/promo.png" class="carouselpromo" alt=""> -->
      <div class="carousel-item active">

        <div class="listcarousel">
          
          <div class="listcarousel1">
            <a href="sessoes/hortifruti/hortifruti.php"class="carouselinfo">
            <img src="images/limao.jpg" class="carouselimg" alt="Limão">
            <div class="carouselinfo">
              
              Limão            
            </a>
            </div>
              
             

          </div>
          <div class="listcarousel1">
            <a href="sessoes/bebidas/bebidas3.php"class="carouselinfo">
            <img src="images/vinhopergolatintosuave.jpg" class="carouselimg" alt="Pergola">
            <div class="carouselinfo">
              Pergola
                          
            </a>
            </div>
          </div>
          <div class="listcarousel1">
            <a href="sessoes/carne/carne.php"class="carouselinfo">
            <img src="images/picanha.jpg" class="carouselimg" alt="Picanha">
            <div class="carouselinfo">
              Picanha
                          
            </a>
            </div>
          </div>

        </div>
      </div>
      <div class="carousel-item">

        
        <div class="listcarousel">
          <div class="listcarousel1">
            
            <a href="sessoes/frios/frios3.php"class="carouselinfo">
            <img src="images/queijomucareladavacagdefatiado.jpg" class="carouselimg" alt="Queijo">
            <div class="carouselinfo">
              Queijo           
            </a>
            </div>
              
             

          </div>
          <div class="listcarousel1">
            <a href="sessoes/hortifruti/hortifruti.php"class="carouselinfo">
            <img src="images/mamaoformosa.jpg" class="carouselimg" alt="Mamão">
            <div class="carouselinfo">
              Mamão
                          
            </a>
            </div>
          </div>
          <div class="listcarousel1">
            <a href="sessoes/bebidas/bebidas3.php"class="carouselinfo">
            <img src="images/vinhorosechilenomerlotmeioseco.jpg" class="carouselimg" alt="Vinho Rose">
            <div class="carouselinfo">
              Vinho Rose
                          
            </a>
          </div>
          </div>

        </div>

      </div>
      <div class="carousel-item">

        
        <div class="listcarousel">
          <div class="listcarousel1">
            <a href="sessoes/limpeza/limpeza2.php"class="carouselinfo">
            
            <img src="images/alcoolsetentaetilicoliquidoitaja.jpg" class="carouselimg" alt="New York">
            <div class="carouselinfo">
              Álcool
              
            </a>
          </div>
              
             

          </div>
          <div class="listcarousel1">
            <a href="sessoes/limpeza/limpeza.php"class="carouselinfo">
            <img src="images/sabaoliquidoomolavagemperfeitaprogalaodois.jpg" class="carouselimg" alt="Desinfetante">
            <div class="carouselinfo">
              Desinfetante
              
            </a>
            </div>
          </div>
          <div class="listcarousel1">
            <a href="sessoes/carne/carne3.php"class="carouselinfo">
            <img src="images/filedetilapiacopacol.jpg" class="carouselimg" alt="Tilapia">
            <div class="carouselinfo">
              Tilapia
              
            </a>
            </div>
          </div>
        </div>
      </div>
      
    </div>

   <div class="testar">
    <a class="carousel-control-prev" href="#demo" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#demo" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>
   </div>

    </div>
</div>

<form action="" method="post">
  <div class="bestbuy">
    <div class="bestbuytitle">ALGUNS PRODUTOS</div>
      <div class="bestbuyitens">

    <div class="card" style="width: 300px;">
      <img src="images/limaosiciliano.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title" style="text-align: center;">Limão Siciliano</h5>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <div class="bestbuypricetxt">Preco unitario:</div>
          <div class="bestbuyprice">R$2.99</div>/230gr*
        </li>

    
      </ul>
      <div class="card-body">
      <input type="submit" class="colocarcarrinho" value="Por no carrinho" name="limaosiciliano">
        <a href="sessoes/hortifruti/hortifruti3.php" class="card-link">Ir no Setor</a>
      </div>
      </div>
  
    <div class="card" style="width: 300px;">
      <img src="images/heineken.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title" style="text-align: center;">Heineken</h5>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <div class="bestbuypricetxt">Preco caixa:</div>
          <div class="bestbuyprice">R$60.00</div>/cx
        </li>
    
      </ul>
      <div class="card-body">
      <input type="submit" class="colocarcarrinho" value="Por no carrinho" name="heineken">
        <a href="sessoes/bebidas/bebidas.php" class="card-link">Ir no Setor</a>
      </div>
      </div>
  
      <div class="card" style="width: 300px;">
        <img src="images/alcatrabestbeef.jpg" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title" style="text-align: center;">Alcatra Best Beef</h5>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">
            <div class="bestbuypricetxt">Preco unitario:</div>
            <div class="bestbuyprice">R$38.94</div>/500gr*
          </li>

      
        </ul>
        <div class="card-body">
        <input type="submit" class="colocarcarrinho" value="Por no carrinho" name="alcatrabestbeef">
        <a href="sessoes/carne/carne.php" class="card-link">Ir no Setor</a>
        </div>
        </div>
    </div>

        <div class="bestbuyitens">
      <div class="card" style="width: 300px;">
      <img src="images/odorizadoraerosollavanda.jpg" class="card-img-top" alt="...">
      <div class="card-body">
       <h5 class="card-title" style="text-align: center;">Odorizador Aerosol Lavanda</h5>
     </div>
      <ul class="list-group list-group-flush">
      <li class="list-group-item">
        <div class="bestbuypricetxt">Preco unitario:</div>
        <div class="bestbuyprice">R$13.60</div>
      </li>

    </ul>
    <div class="card-body">
    <input type="submit" class="colocarcarrinho" value="Por no carrinho" name="odorizadoraerosollavanda">
          <a href="sessoes/limpeza/limpeza2.php" class="card-link">Ir no Setor</a>
    </div>
    </div>

    <div class="card" style="width: 300px;">
      <img src="images/whiskyoldparr.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title" style="text-align: center;">Whisky Old Par</h5>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">
          <div class="bestbuypricetxt">Preco unitario:</div>
          <div class="bestbuyprice">R$142.90</div>
        </li>

      </ul>
      <div class="card-body">
      <input type="submit" class="colocarcarrinho" value="Por no carrinho" name="whiskyoldparr">
          <a href="sessoes/bebidas/bebidas2.php" class="card-link">Ir no Setor</a>
      </div>
      </div>

        <div class="card" style="width: 300px;">
          <img src="images/panodelimpeza.jpg" class="card-img-top" alt="...">
          <div class="card-body">
            <h5 class="card-title" style="text-align: center;">Pano de Limpeza</h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <div class="bestbuypricetxt">Preco unitario:</div>
              <div class="bestbuyprice">R$12.90</div>
            </li>


          </ul>
          <div class="card-body">
          <input type="submit" class="colocarcarrinho" value="Por no carrinho" name="panodelimpeza">
            <a href="sessoes/limpeza/limpeza2.php" class="card-link">Ir no Setor</a>
          </div>
          </div>

  </div>
</form>





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
    <script src="front.js"></script>

    <script>
    </script>
</body>
</html>