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
      if (isset($_POST["todospedidos"])) {
        $query = "SELECT * FROM pedido WHERE (`emailpedido` = '{$_SESSION['emaillogado']}');";       
}
      else if (isset($_POST["iniciadospedidos"])) {
        $query = "SELECT * FROM pedido WHERE (`emailpedido` = '{$_SESSION['emaillogado']}') AND (`statuspedido` = 'Iniciado');";
                 
}
else if (isset($_POST["emanalisepedidos"])) {
         $query = "SELECT * FROM pedido WHERE (`emailpedido` = '{$_SESSION['emaillogado']}') AND (`statuspedido` = 'EmAnalise');";
                   
}
else if (isset($_POST["emseparacaopedidos"])) {
          $query = "SELECT * FROM pedido WHERE (`emailpedido` = '{$_SESSION['emaillogado']}') AND (`statuspedido` = 'EmSeparacao');";
                   
}
else  if (isset($_POST["emtransportepedidos"])) {
          $query = "SELECT * FROM pedido WHERE (`emailpedido` = '{$_SESSION['emaillogado']}') AND (`statuspedido` = 'EmTransporte');";
                  
}
else  if (isset($_POST["finalizadopedidos"])) {
         $query = "SELECT * FROM pedido WHERE (`emailpedido` = '{$_SESSION['emaillogado']}') AND (`statuspedido` = 'Finalizado');";
                  
}else{
    $query = "SELECT * FROM pedido WHERE (`emailpedido` = '{$_SESSION['emaillogado']}');";      
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
  <div class="selecionaprodutos">


        <form action="" method="post">
          <input type="submit" value="TODOS"  class="selecionaprodutosbotoes" name="todospedidos">
          <input type="submit" value="INICIADOS"  class="selecionaprodutosbotoes" name="iniciadospedidos">
          <input type="submit" value="EM ANALISE"  class="selecionaprodutosbotoes" name="emanalisepedidos">
          <input type="submit" value="EM SEPARACAO"  class="selecionaprodutosbotoes" name="emseparacaopedidos">
          <input type="submit" value="EM TRANSPORTE"   class="selecionaprodutosbotoes" name="emtransportepedidos">
          <input type="submit" value="FINALIZADO"  class="selecionaprodutosbotoes" name="finalizadopedidos">
        </form>

    </div>

    <div class="produtosselecionados">

        <div class="pedidoscliente">
            <div class="numeropedido">Numero do pedido</div>
            <div class="valorpedido">Valor do Pedido</div>
            <div class="statuspedido">Status do pedido</div>
            <div class="itensdopedido">
            Itens do pedido
            </div>
            <div class="avaliarpedido">
            Avalie sua compra
            </div>  
        </div>
    
  <div class="admcontent2">
        <form action="" method="post">
            <?php
            if ($result = mysqli_query($conexao, $query)) {
            
                /* fetch associative array */
            while ($row = mysqli_fetch_assoc($result)) {

              if (isset($_POST['confirmar'.$row["idpedido"]])) {
                $queryy = "UPDATE  `bd_mercadinho`.`pedido` SET `avaliacaopedido` = '{$_POST['notapedido'.$row['idpedido']]}' WHERE (`idpedido` = '{$row['idpedido']}');";
                mysqli_query($conexao, $queryy);

              header('Refresh:0');
              echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
            
          }
            
                  $itens = $row["itemspedido"];
            
                echo '
            
                
                <div class="pedidoscliente">
                  <div class="numeropedido">'.$row["idpedido"].'</div>
                  <div class="valorpedido">R$:'.$row["totalvalorpedido"].'</div>
                  <div class="statuspedido">'.$row["statuspedido"].'</div>
                  <div class="itensdopedido">'.implode(explode("||",$itens)).'
                  
                  </div>
                  <div class="avaliarpedido">
                  <input type="number" id="cartitemsqtdinput" min="0" max="10" step="1" class="avaliarpedidoinput" placeholder="Nota" name="notapedido'.$row["idpedido"].'">
                  <input type="submit" value="Confirmar" name="confirmar'.$row["idpedido"].'">
                  '.$row["avaliacaopedido"].'
                  </div>
                </div>
                <div class="pedidoscliente2">
                  Codigo de Rastreamento:
                  <div class="rastreamentoinput">
                  '.$row["codigorastreamento"].'
                  </div> 
                </div>

              </form>


              ';
            
            
            
            
            }

            /* free result set */
            mysqli_free_result($result);
            }
        
            ?>
      </div>
  </div>
  



  

          <footer>
            <div class="footercontact">Contatos:
              <br>3434-3434 <br>8484-8484 <br>contato@espacomercado.com.br
            </div>
            <div class="footername">Mercadinho Qualquer S.A <br> Caminho 02-Quadra 05,      Cajazeiras, Salvador, BA <br> CEP: 41335-360 <br> CNPJ: 80.033.928/0001-01      <br>Inscrição Estadual: 186124-17</div>
            <div class="footersociais">
              <div class="footersociaistitle">  Sociais:  </div>  
              <div class="footersociaistype"><a href="" class="footersociaistype"><img      src="https://image.flaticon.com/icons/png/512/87/87390.png" class="footerimg"     alt=""> Instagram</a></div>
              <div class="footersociaistype"><a href="" class="footersociaistype"><img      src="https://cdn2.iconfinder.com/data/icons/font-awesome/1792/    facebook-official-512.png" class="footerimg" alt=""> Facebook</a></div>
              <div class="footersociaistype"><a href="" class="footersociaistype"><img      src="https://img.icons8.com/ios/452/twitter-squared.png" class="footerimg"      alt=""> Twitter</a></div>
            </div>
          </footer>
    <script src="front.js"></script>
</body>
</html>