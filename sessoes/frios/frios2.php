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


if (isset($_POST['iogurtenaturalvigorlaranjacenouraemel'])) {
  if (!in_array('iogurtenaturalvigorlaranjacenouraemel',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='iogurtenaturalvigorlaranjacenouraemel';
  }
}else if(isset($_POST['leitefermentadoyakult'])){
  if (!in_array('leitefermentadoyakult',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='leitefermentadoyakult';
  }
}else if(isset($_POST['iogurtechamytobolinhasdechocolate'])){
  if (!in_array('iogurtechamytobolinhasdechocolate',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='iogurtechamytobolinhasdechocolate';
  }
}else if(isset($_POST['bebidalacteafermentadamorangovigortododiabandeja'])){
  if (!in_array('bebidalacteafermentadamorangovigortododiabandeja',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='bebidalacteafermentadamorangovigortododiabandeja';
  }
}else if(isset($_POST['bebidalacteanestlemaxcereal'])){
  if (!in_array('bebidalacteanestlemaxcereal',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='bebidalacteanestlemaxcereal';
  }
}else if(isset($_POST['sobremesalacteachocolateechocolatebrancodanettebandeja'])){;
  if (!in_array('sobremesalacteachocolateechocolatebrancodanettebandeja',$_SESSION['carrinho'])){   
    $_SESSION['carrinho'][]='sobremesalacteachocolateechocolatebrancodanettebandeja';
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
        <a href="../../sessoes/frios/frios2.php" class="setoreslinked">Frios</a>
        <a href="../../sessoes/hortifruti/hortifruti.php" class="setoreslink">Hortifruti</a>
        <a href="../../sessoes/limpeza/limpeza.php" class="setoreslink">Limpeza</a>
      </div>

    <div class="bannerfrios">frios</div>
    <?php
       $precoiogurtenaturalvigorlaranjacenouraemel = "SELECT precoproduto FROM produto WHERE nomeproduto ='iogurtenaturalvigorlaranjacenouraemel';";
       $precoiogurtenaturalvigorlaranjacenouraemelresultado = mysqli_query($conexao, $precoiogurtenaturalvigorlaranjacenouraemel);
       $precoiogurtenaturalvigorlaranjacenouraemelarray = mysqli_fetch_assoc($precoiogurtenaturalvigorlaranjacenouraemelresultado);
       $precoleitefermentadoyakult = "SELECT precoproduto FROM produto WHERE nomeproduto ='leitefermentadoyakult';";
       $precoleitefermentadoyakultresultado = mysqli_query($conexao, $precoleitefermentadoyakult);
       $precoleitefermentadoyakultarray = mysqli_fetch_assoc($precoleitefermentadoyakultresultado);
       $precoiogurtechamytobolinhasdechocolate = "SELECT precoproduto FROM produto WHERE nomeproduto ='iogurtechamytobolinhasdechocolate';";
       $precoiogurtechamytobolinhasdechocolateresultado = mysqli_query($conexao, $precoiogurtechamytobolinhasdechocolate);
       $precoiogurtechamytobolinhasdechocolatearray = mysqli_fetch_assoc($precoiogurtechamytobolinhasdechocolateresultado);
       $precobebidalacteafermentadamorangovigortododiabandeja = "SELECT precoproduto FROM produto WHERE nomeproduto ='bebidalacteafermentadamorangovigortododiabandeja';";
       $precobebidalacteafermentadamorangovigortododiabandejaresultado = mysqli_query($conexao, $precobebidalacteafermentadamorangovigortododiabandeja);
       $precobebidalacteafermentadamorangovigortododiabandejaarray = mysqli_fetch_assoc($precobebidalacteafermentadamorangovigortododiabandejaresultado);
       $precobebidalacteanestlemaxcereal = "SELECT precoproduto FROM produto WHERE nomeproduto ='bebidalacteanestlemaxcereal';";
       $precobebidalacteanestlemaxcerealresultado = mysqli_query($conexao, $precobebidalacteanestlemaxcereal);
       $precobebidalacteanestlemaxcerealarray = mysqli_fetch_assoc($precobebidalacteanestlemaxcerealresultado);
       $precosobremesalacteachocolateechocolatebrancodanettebandeja = "SELECT precoproduto FROM produto WHERE nomeproduto ='sobremesalacteachocolateechocolatebrancodanettebandeja';";
       $precosobremesalacteachocolateechocolatebrancodanettebandejaresultado = mysqli_query($conexao, $precosobremesalacteachocolateechocolatebrancodanettebandeja);
       $precosobremesalacteachocolateechocolatebrancodanettebandejaarray = mysqli_fetch_assoc($precosobremesalacteachocolateechocolatebrancodanettebandejaresultado);

    
    echo '
    <form action="" method="post">
    <div class="container ">
      <div class="row ">
          <div class="col-sm-4 ">
              <div class="panel panel-danger ">
                  <div class="panel-heading " style="text-align: center; font-size: 25px; ">IOGURTE NATURAL VIGOR LARANJA, CENOURA E MEL  
                  </div>
                  <div class="panel-body "><img src="../../images/iorgute_natural.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                  <div class="panel-footer ">Preço por: R$'.implode(",",$precoiogurtenaturalvigorlaranjacenouraemelarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="iogurtenaturalvigorlaranjacenouraemel"> <br> A unidade contém aproximadamente: 170g
                  </div>
              </div>
          </div>
          <div class="col-sm-4 ">
              <div class="panel panel-danger ">
                  <div class="panel-heading " style="text-align: center; font-size: 25px; ">LEITE FERMENTADO YAKULT COM 6 UNIDADES </div>
                  <div class="panel-body "><img src="../../images/yakuut.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                  <div class="panel-footer ">Preço por: R$'.implode(",",$precoleitefermentadoyakultarray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="leitefermentadoyakult"> <br> A unidade contém aproximadamente: 180 g 
                  </div>
              </div>

          </div>
          <div class="col-sm-4 ">
              <div class="panel panel-danger ">
                  <div class="panel-heading " style="text-align: center; font-size: 25px;">IOGURTE CHAMYTO BOLINHA CHOCOLATE PRETO E BR BD 
                 </div>
                  <div class="panel-body "><img src="../../images/chamyto.jpg" class="img-responsive " style="width:100%; " alt="Image "></div>
                  <div class="panel-footer ">Preço: R$'.implode(",",$precoiogurtechamytobolinhasdechocolatearray).' <br> <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="iogurtechamytobolinhasdechocolate"> <br> A unidade contém aproximadamente: 130g
                  </div>
              </div>
          </div>
      </div>
  </div><br>

  <div class="container ">
      <div class="row ">
          <div class="col-sm-4 ">
              <div class="panel panel-danger ">
                  <div class="panel-heading " style="text-align: center; font-size: 25px; ">BEBIDA LÁCTEA FERMENTADA MORANGO VIGOR TODO DIA BANDEJA 6 UNIDADES
                  </div>
                  <div class="panel-body "><img src="../../images/bebidalacteafermentadamorangovigortododiabandeja.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                  <div class="panel-footer ">Preço por pacote: R$'.implode(",",$precobebidalacteafermentadamorangovigortododiabandejaarray).' <br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="bebidalacteafermentadamorangovigortododiabandeja"> <br> A unidade contém aproximadamente: 540g 
                  </div>
              </div>
          </div>
          <div class="col-sm-4 ">
              <div class="panel panel-danger ">
                  <div class="panel-heading " style="text-align: center; font-size: 25px; ">BEBIDA LÁCTEA NESTLÉ  MAX CEREAL       </div>
                  <div class="panel-body "><img src="../../images/bebidalacteanestlemaxcereal.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                  <div class="panel-footer ">Preço por quilo: R$'.implode(",",$precobebidalacteanestlemaxcerealarray).'<br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="bebidalacteanestlemaxcereal"> <br> A unidade contém aproximadamente :260ml</div>
              </div>
          </div>
          <div class="col-sm-4 ">
              <div class="panel panel-danger ">
                  <div class="panel-heading " style="text-align: center; font-size: 25px; ">SOBREMESA LÁCTEA CHOCOLATE E CHOCOLATE BRANCO DANETTE BANDEJA 8 UNIDADES LEVE MAIS PAGUE MENOS                    </div>
                  <div class="panel-body "><img src="../../images/sobremesalacteachocolateechocolatebrancodanettebandeja.jpg" class="img-responsive " style="width:100% " alt="Image "></div>
                  <div class="panel-footer ">Preço por pacote : R$'.implode(",",$precosobremesalacteachocolateechocolatebrancodanettebandejaarray).'<br>
                    <input type="submit" class="colocarcarrinhopag" value="ADICIONAR AO CARRINHO" name="sobremesalacteachocolateechocolatebrancodanettebandeja"> <br> A unidade contém aproximadamente:  720g</div>
              </div>
          </div>
      </div>
  </div>
  </form>
  ';
  ?>
  <div class="sessoespag " style="text-align: center; ">
        <ul class="pagination ">
            <li><a href="../../sessoes/frios/frios.php">1</a></li>
            <li class="active"><a href="../../sessoes/frios/frios2.php ">2</a></li>
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