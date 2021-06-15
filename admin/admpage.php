<?php
session_start();



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
    .removercarrinho{
    color: red;
    background:none;
    border:none;
    text-decoration: none;
  }
  .removercarrinho:hover{
    font-size: 18px;
    transition:500ms;
    text-decoration: none;
}

.atualizarproduto{
  color: orangered;
  border:none;
  background-color:#0a284c;
  border-radius:10px;
  font-size: 13px;
  padding:0px
}
.carinhoitens{
  display: flex;
  height: 30px;
  margin-top:15px;
}
.admcontent{
  display: flex;
  height:100vh;
}

.admmenu{
  display: inline-block;
  background-color: #F5F5F7;
  width:300px;
  height:100%;
  border-radius:5px;
  font-size:25px;
  text-align: center;
  align-items: center;
  /* position:absolute; */
}

.admmenuitems{
    font-size:20px;
    text-decoration: none;
    color:#2e93ff;
  }
  
  .admmenuitems:hover{
    /* font-size:25px; */
    transition:500ms;
    text-decoration: none;
    color:rgb(0,86,179);

}
.admmenuitemsclicked{
    font-size:25px;
    text-decoration: none;
    color:rgb(0,86,179);
    background-color: #999999;
  }

.admconteudo{
}


</style>

</head>
<body>

  <header>
    <div class="header1">
      <a href="../../principal.php">
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
        <div class="admconteudo"></div>
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