<?php
session_start();
header('Content-Type: text/html; charset=iso-8859-1');
ini_set('default_charset','UTF-8');

error_reporting(E_ERROR | E_PARSE);

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

if (!$_SESSION['emaillogado']) {
  header('Location: carrinho.php');
}

error_reporting(E_ERROR | E_PARSE);
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
    date_default_timezone_set('America/Sao_Paulo');
    $agora = date('d/m/Y H:i');

  if (isset($_SESSION['carrinho'])){
    $pedidocontagem=0;
    foreach ($_SESSION['carrinho'] as $value){
      
      $pedidoparabanco .= " | "; 
      $pedidoparabanco .= $_SESSION['carrinho'][$pedidocontagem];
      $pedidoparabanco .= " Qtd: "; 
      $pedidoparabanco .= $_SESSION['quantidadeproduto'][$pedidocontagem];   
      $pedidoparabanco .= "  ||  "; 
      $pedidocontagem = $pedidocontagem + 1;
    }
    $pedidohtml = explode("||", $pedidoparabanco);
    
}
if (isset($_POST['confirmarpedido'])){

   $nomecartao = md5($_POST['nomecartao']);
   $numerocartao = md5($_POST['numerocartao']);
   $datacartao = md5($_POST['datacartao']);
   $cvvcartao = md5($_POST['cvvcartao']);
   $cepentrega = $_POST['cepentrega'];
   $cidadeentrega = $_POST['cidadeentrega'];
   $complementoentrega = $_POST['complementoentrega'];
   $entregatelefone = $_POST['entregatelefone'];
   $totalvalorpedido = $_SESSION['totalvalor'];
   $emailpedido = $_SESSION['emaillogado'];
  
  $query = "INSERT INTO bd_mercadinho.pedido (emailpedido,nomecartaopedido, numerocartaopedido, datacartao, cvvcartaopedido, cepentregapedido, cidadeentregapedido, complementoentregapedido, telefoneentregapedido, statuspedido, itemspedido, datapedido,totalvalorpedido) VALUES ('$emailpedido','$nomecartao','$numerocartao','$datacartao','$cvvcartao','$cepentrega','$cidadeentrega','$complementoentrega','$entregatelefone','Iniciado','{$pedidoparabanco}','$agora','$totalvalorpedido');";
  
  
  if (mysqli_query($conexao, $query)) {
    
  }else{
  echo "Error: " . $sql . "<br>" . mysqli_error($conexao);
  }
  unset($_POST['confirmarpedido']);
  header('Location: clientepagepedidos.php');
}
  

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagamento</title>


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
.pagamentopage{
    display:flex;
}
.pagamento {
  padding-top: 30px;
  width: 500px;
  height:90%;
  position: relative;
  text-align: center;
  background: #495057;
  border-radius: 10px;
  margin-bottom:25px;
}

.pedidoitems{
  display:flex;
}

.pedidoitemsname{
  width: 40%;
}
.pedidoitemsprice{
  width: 20%;
}

.pedidoitemsqtd{
  width: 20%;
}
.pedidoitemssubtotal{
  width: 20%;
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

    <body>
    <div class="pagamentopage">
        <div class="pagamento-form">
            <form action="" method="post">

            <div class="pagamento">
                <strong>MÉTODO DE PAGAMENTO</strong> <br>
                    <div class="bandeira">
                        <a href="#"><img src="images/pix.png" alt="" height="80px"  width="80px"></a>
                        <a href="#"><img src="images/mastercard-removebg-preview.png"   alt="" height="50px" width="80px"></a>

                        <a href="#"><img src="images/elo.png" alt="" height="70px"  width="80px"></a> <br>
                    </div>

                    <label for="nome"><strong>RESPONSÁVEL PELO CARTÃO</strong></label> <input type="text" name="nomecartao" class="portador" placeholder="Nome no cartão" size="20px" required="required">

                    <label for="numero"><strong>NÚMERO DO CARTÃO</strong></label> <br> <input type="text" name="numerocartao" class="numero" size="20px" maxlength="16" placeholder="XXXX XXXX XXXX XXXX" required="required">
                    
                    <label for="data"><strong>DATA DE EXPIRAÇÃO</strong></label> <br>
                    <input type="month" name="datacartao" class="data" required="required">
                    <br>

                    <label for="cvv"><strong>CVV</strong></label> <br>
                    <input type="text" name="cvvcartao" class="cvv" placeholder="xxx" required="required">
            
            </div>
            
            
            
            
        </div>
        <div class="localentrega">

        <div class="pagamento" style="margin-top:20px;">
                <strong>ENTREGA</strong> <br><br>
                    
                    <label for="nome"><strong>CEP</strong></label> 
                    
                    <input type="text" name="cepentrega" class="portador" placeholder="CEP" size="20px" maxlength="16" required="required">

                    <label for="numero"><strong>Cidade</strong></label> <br> 
                    <input type="text" name="cidadeentrega" class="numero" size="20px" maxlength="250" placeholder="Salvador, Bahia, Brasil" required="required">
                    


                    <label for="cvv"><strong>Complemento</strong></label> <br>
                    <input type="text" name="complementoentrega" class="cvv" placeholder="Rua Caminho 2, Numero 05, Apartamento 222, predio 2" required="required">

                    <label for="cvv"><strong>Telefone para contato</strong></label> <br>
                    <input type="text" name="entregatelefone" class="cvv" placeholder="4002-8922" required="required">

                    <input type="submit" value="Confirmar Pedido" name="confirmarpedido">
            
            </div>

        </div>
            </form>
        <div class="pagamento" style="margin-top:20px;margin-left:20px;">
                <strong>Pedido</strong> <br><br>
                    
                    <?php
                    $posicao = 0;
                        foreach ($_SESSION['carrinho'] as $value){                                                                              
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
                            
                           
                            <div class="pedidoitems" style="height:75px;">
                            <div class="pedidoitemsname" style="widht:25%;">'. implode(",",$nomerealarray) .' </div>
                            <div class="pedidoitemsprice" id="5" style="widht:5%;">R$:' . implode(",",$precoarray)  .'</div>
                            <div class="pedidoitemsqtd">Qtd : '.$_SESSION['quantidadeproduto'][$posicao].'</div>
                            <div class="pedidoitemssubtotal" id="cartitemssubtotal">R$'. $subtotal . '</div></div>
                            
                            
                            
                            
                          
                            ';
                            $posicao = $posicao + 1;
                            $total += $subtotal;
                            $_SESSION['totalvalor'] = $total;
                            // $_SESSION['totalvalor'] += $subtotal;
                            // echo $_SESSION['totalvalor'];
                            // echo $total;
                        
                        
                          }


                    ?>
                <div class="carttotalprice">

R$
<?php
echo $_SESSION['totalvalor'];
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