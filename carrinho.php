<?php
session_start();
header('Content-Type: text/html; charset=iso-8859-1');


if (!isset($_SESSION['carrinho'])){
  $_SESSION['carrinho'] = array();  
}

if (!isset($_SESSION['quantidadeproduto'])){
  $_SESSION['quantidadeproduto'] = array();  
}

if (!isset($_SESSION['totalvalor'])){
  $_SESSION['totalvalor'] = 0;  
}else{

}

if(isset($_POST['limparcarrinho'])){
  unset($_SESSION['carrinho']);
  $_SESSION['carrinho'] = array();
  $_SESSION['totalvalor'] = 0; 
}

error_reporting(E_ERROR | E_PARSE);
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




    
    <link rel="stylesheet" href="style.css">
    
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
.carrinhoitens{
  display: flex;
  height: 100px;
  margin-top:25px;
}

.completbuy:hover{
  transform: scale(1.1);
  transition: 500ms;
}


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
        <div class="cartheader">CARRINHO</div>
    </div>

    <div class="header3">
    <form method="post">
        <input type="submit" class="limparcarrinho" value="Limpar" name="limparcarrinho">
        </form>
      
      
 
        <div class="login">
          <button onclick="openLoginForm()" class="btnlogin">Login</button>
        </div>
        <div class="popup-overlay"></div>
        <div class="popup">
          <div class="popup-close" onclick="closeLoginForm()">&times;</div>
          <div class="form">
            <div class="avatar">
              <img src="/images/logo.png" alt="">
            </div>
            <div class="header">
              Login
            </div>
            <div class="element">
              <label for="username">Usuario</label>
              <input type="text" id="username">
            </div>
            <div class="element">
              <label for="password">Senha</label>
              <input type="password" id="password">
            </div>
            <div class="element">
              <button>Login</button>
            </div>
          </div>
        </div>





      
      <a href="/RegisterClient.html" class="register" >Registrar</a>
    </div>

  </header>
  
  


  <div class="cartproduct">
      Produtos
  </div>
  <div class="cartlistitems">
      <div class="cartlistitemstxt">
    <div class="cartitemtxt">Imagem</div>
    <div class="cartitemstxt">Produto</div>
    <div class="cartitemstxt">Valor</div>
    <div class="cartitemstxt">Quantidade</div>
    <div class="cartitemstxt">Remover</div>
    <div class="cartitemstxt">Subtotal</div>
</div>

<?php


if (isset($_SESSION['carrinho'])){ 
  $posicao=0;
  $total = 0;

  foreach ($_SESSION['carrinho'] as $value){
    
    if (isset($_POST['removerdocarrinho'.$value])) {
      unset($_SESSION['carrinho'][$posicao]);
      unset ($_SESSION['quantidadeproduto'][$posicao]);

      echo "<meta HTTP-EQUIV='refresh' CONTENT='0'>";

    }

    if (isset($_POST['atualiza'.$value])) {
      header('Refresh:0');
      $_SESSION['totalvalor'] = $total;
    }

    if (isset($_POST['quantidadeproduto'.$value])){
      $quantidade = $_POST['quantidadeproduto'.$value];
    }else{
      $quantidade = $_SESSION['quantidadeproduto'][$posicao];
    }


    $_SESSION['quantidadeproduto'][$posicao] = $quantidade;
    $nomereal = "SELECT nomerealproduto FROM produto WHERE nomeproduto ='{$value}';";
    $nomerealresultado = mysqli_query($conexao, $nomereal);
    $nomerealarray = mysqli_fetch_assoc($nomerealresultado);

    $preco = "SELECT precoproduto FROM produto WHERE nomeproduto ='{$value}';";
    $precoresultado = mysqli_query($conexao, $preco);
    $precoarray = mysqli_fetch_assoc($precoresultado);



    // echo $subtotal = (floatval(implode(",",$precoarray)) * (floatval(implode(",",$quantidade))) ;
    $subtotal1 = floatval(implode(",",$precoarray));
    $subtotal2 = floatval($_SESSION['quantidadeproduto'][$posicao]);
    $subtotal = $subtotal1 * $subtotal2;

    // echo floatval(implode(",",$precoarray));
    echo '
    <form action="" method="post">
    <div class="carrinhoitens">
    <div class="cartitems">
    <div class="cartitemsimage"><img src="images/'.$value.'.jpg"  style="width:100px " alt="Image "></div>
    <div class="cartitemsname">'. implode(",",$nomerealarray) .' </div>
    <div class="cartitemsprice" id="5">' . implode(",",$precoarray)  .'</div>
    <div class="cartitemsqtd"><input type="number" id="cartitemsqtdinput" min="0"  class="cartitemsqtdinput" placeholder="Qtd" name="quantidadeproduto'.$value.'">'.$_SESSION['quantidadeproduto'][$posicao].'</div>
    <div class="cartitemsremove"><input type="submit" class="removercarrinho" value="Remover" name="removerdocarrinho'.$value.'"></div>
    <div class="cartitemssubtotal" id="cartitemssubtotal">R$'. $subtotal . '</div>
    </div>
    <input type="submit" class="atualizarproduto" value="Atualizar" name="atualizar'.$value.'">

    </div>
    
    
    
  </form>
    ';
    $posicao = $posicao + 1;
    $total += $subtotal;
    $_SESSION['totalvalor'] = $total;
    // $_SESSION['totalvalor'] += $subtotal;
    // echo $_SESSION['totalvalor'];
    // echo $total;


  }
}



?>




    <div class="carttotal">
    TOTAL
    </div>
    <div class="carttotalprice">

      R$
    <?php
    echo $_SESSION['totalvalor'];
    ?>
    </div>

</div> 

<div class="completbuy">
<form action="pagamento.php" method="post">
<input type="submit" value="Completar Compra" class="completbuy" name="completarcompra">
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
</body>
</html>