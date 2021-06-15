<?php
session_start();



error_reporting(E_ERROR | E_PARSE);
?>

<?php

if (!$_SESSION['emaillogado']) {
  header('Location: principal.php');
}

?>

<?php
  $servername = "localhost:3306"; 
  $username = "root";
  $password = "";
  $dbname = "bd_mercadinho";

  $conexao = mysqli_connect($servername,$username,$password,$dbname) or die ( 'Nao foi possiviel conectar');

//   if (!$_SESSION['emaillogado']) {
//     header('Location: carrinho.php');
//   }     
?>





<?php
if (isset($_POST['confirmarnomecliente'])){
    $query = "UPDATE  `bd_mercadinho`.`cliente` SET `nomecliente` = '{$_POST['novonomecliente']}' WHERE (`emailcliente` = '{$_SESSION['emaillogado']}');";
    mysqli_query($conexao, $query);

}

if (isset($_POST['confirmaremailcliente'])){
    $query = "UPDATE  `bd_mercadinho`.`cliente` SET `emailcliente` = '{$_POST['novoemailcliente']}' WHERE (`emailcliente` = '{$_SESSION['emaillogado']}');";
    mysqli_query($conexao, $query);
}

if (isset($_POST['confirmaremailcliente'])){
    $novasenha = md5($_POST['novasenhacliente']);
    $query = "UPDATE  `bd_mercadinho`.`cliente` SET `senhacliente` = '{$novasenha}' WHERE (`emailcliente` = '{$_SESSION['emaillogado']}');";
    mysqli_query($conexao, $query);
}

if (isset($_POST['excluircliente'])){
    $query = "DELETE FROM  `bd_mercadinho`.`cliente` WHERE (`emailcliente` = '{$_SESSION['emaillogado']}');";
    mysqli_query($conexao, $query);
}



?>

<!DOCTYPE html>
<html lang="pt-br">
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
        <div class="cartheader">
        <?php
        echo "Logado com:".$_SESSION['emaillogado'];
        ?>
        </div>
    </div>

    <div class="header3">
      
      





      
    <a href="carrinho.php"class="shopcart">
        <img class="shopcart" src="https://image.flaticon.com/icons/png/512/126/126510.png" alt="Meu carrinho">
        Carrinho
      </a>
    </div>
    </div>

  </header>
    
    <div class="admcontent2">
    <?php
    echo '
    <form action="" method="post">

    <div class="clienteopcoes">  
    <div class="opcaomudancacliente">Mudar Seu nome</div>
    <div class="nomeatualcliente">'.implode($_SESSION["usuarionome"]).'</div>
    <div class="novonomeatualcliente">
    <input type="text" id="cartitemsqtdinput" class="cartitemsqtdinput" placeholder="Novo Nome" name="novonomecliente">
    </div>
    <div class="confirmaprecoproduto">
    <input type="submit" value="Confirmar" name="confirmarnomecliente">
    </div>
    </div>
    
    <div class="clienteopcoes">  
    <div class="opcaomudancacliente">Mudar Seu email</div>
    <div class="nomeatualcliente">'.$_SESSION['emaillogado'].'</div>
    <div class="novonomeatualcliente">
    <input type="text" id="cartitemsqtdinput" class="cartitemsqtdinput" placeholder="Novo Email" name="novoemailcliente">
    </div>
    <div class="confirmaprecoproduto">
    <input type="submit" value="Confirmar" name="confirmaremailcliente">
    </div>
    </div>
    
    <div class="clienteopcoes">  
    <div class="opcaomudancacliente">Mudar Sua senha</div>
    <div class="nomeatualcliente">'.$_SESSION['emaillogado'].'</div>
    <div class="novonomeatualcliente">
    <input type="text" id="cartitemsqtdinput" class="cartitemsqtdinput" placeholder="Nova Senha" name="novasenhacliente">
    </div>
    <div class="confirmaprecoproduto">
    <input type="submit" value="Confirmar" name="confirmarsenhacliente">
    </div>
    </div>
    
    <div class="clienteirpedidos">  
    <a href="clientepagepedidos.php">
      IR PARA PEDIDOS
      </a>
      </div>

    <div class="clienteopcoes">  
    <input type="submit" class="excluirconta"value="EXCLUIR CONTA" name="excluircliente">
    </div>


    
    
    </form>
    </div>
    
    
    
    ';

    ?>
  



  
</body>
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

</html>