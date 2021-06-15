<?php
session_start();

header('Content-Type: text/html; charset=iso-8859-1');


error_reporting(E_ERROR | E_PARSE);
?>

<?php
if (!$_SESSION['emaillogado']) {
  header('Location: ../principal.php');
}
if ($_SESSION['usuariotipo'] == 'normal') {
  header('Location: ../principal.php');
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

      if (isset($_POST["todosprodutos"])) {
        $query = "SELECT * FROM produto";       
}
      else if (isset($_POST["bebidasprodutos"])) {
        $query = "SELECT * FROM produto WHERE (`setor` = 'bebidas')";
                 
}
else if (isset($_POST["carneprodutos"])) {
         $query = "SELECT * FROM produto WHERE (`setor` = 'carne')";
                   
}
else if (isset($_POST["friosprodutos"])) {
          $query = "SELECT * FROM produto WHERE (`setor` = 'frios')";
                   
}
else  if (isset($_POST["hortifrutiprodutos"])) {
          $query = "SELECT * FROM produto WHERE (`setor` = 'hortifruti')";
                  
}
else  if (isset($_POST["limpezaprodutos"])) {
          $query = "SELECT * FROM produto WHERE (`setor` = 'limpeza')";
                  
}else{
  $query = "SELECT * FROM produto";
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




    
    <link rel="stylesheet" href="../style.css">
    
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
      <a href="../principal.php">
      <img class="logo" src="https://www.siesesp.org.br/img/Compra-certa-gd.png" alt="">
    </a>
    </div>
    <div class="header2">
        <div class="cartheader">ADMIN</div>
    </div>

    <div class="header3">
      
      
    </div>

  </header>
    

    <div class="admcontent">
        <div class="admmenu">
            MENU ADMIN
            <hr>
            <div class="admmenuitems">
              <a href="../admin/modificarpreco.php" class="admmenuitems">Modificar Precos</a>
                
                <hr>
            </div>
            <div class="admmenuitems">
            <a href="../admin/modificarquantidade.php" class="admmenuitems">Modificar Quantidade</a>
                <hr>
            </div>
            <div class="admmenuitems">
            <a href="../admin/verificarpedidosadmin.php" class="admmenuitems">Verificar Pedidos</a>
                
                <hr>
            </div>

         

        </div>
        <div class="admconteudo">

      <div class="selecionaprodutos">


        <form action="" method="post">
          <input type="submit" value="TODOS"  class="selecionaprodutosbotoes" name="todosprodutos">
          <input type="submit" value="BEBIDAS"  class="selecionaprodutosbotoes" name="bebidasprodutos">
          <input type="submit" value="CARNE"  class="selecionaprodutosbotoes" name="carneprodutos">
          <input type="submit" value="FRIOS"  class="selecionaprodutosbotoes" name="friosprodutos">
          <input type="submit" value="HORTIFRUTI"   class="selecionaprodutosbotoes" name="hortifrutiprodutos">
          <input type="submit" value="LIMPEZA"  class="selecionaprodutosbotoes" name="limpezaprodutos">
        </form>

      </div>

      <div class="produtosselecionados">

        <div class="produto">
            <div class="imagemproduto">Imagem</div>
            <div class="nomeproduto">Nome do Produto</div>
            <div class="precoatualproduto">Valor Atual</div>
            <div class="novoprecoproduto">
            Novo Valor
            </div>
            <div class="confirmaprecoproduto">
            Confirme Alteracao
            </div>
            
        </div>
      <?php




      if ($result = mysqli_query($conexao, $query)) {
      
          /* fetch associative array */
      while ($row = mysqli_fetch_assoc($result)) {

            if (isset($_POST['confirmar'.$row["nomeproduto"]])) {
                $queryy = "UPDATE  `bd_mercadinho`.`produto` SET `precoproduto` = '{$_POST['novovalor'.$row['nomeproduto']]}' WHERE (`nomeproduto` = '{$row['nomeproduto']}');";
                mysqli_query($conexao, $queryy);

              header('Refresh:0');
              echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";
            
          }

          echo '

          <form action="" method="post">
          <div class="produto">
            <div class="imagemproduto"><img src="../images/'.$row["nomeproduto"].'.jpg"  style="width:100px " alt="Image "></div>
            <div class="nomeproduto">'.$row["nomerealproduto"].'</div>
            <div class="precoatualproduto">R$:'.$row["precoproduto"].'</div>
            <div class="novoprecoproduto">
            <input type="number" id="cartitemsqtdinput" min="0"  step="0.01" class="cartitemsqtdinput" placeholder="Novo Valor" name="novovalor'.$row["nomeproduto"].'">
            </div>
            <div class="confirmaprecoproduto">
            <input type="submit" value="Confirmar" name="confirmar'.$row["nomeproduto"].'">
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

        </div>
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
</body>
</html>