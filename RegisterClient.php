<?php
session_start();
?>

<?php
        $servername = "localhost:3306"; 
        $username = "root";
        $password = "";
        $dbname = "bd_mercadinho";



      try {

        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      }
      catch(PDOException $e)
      {
        echo"erro na conexao" . $e->getMessage();
        
      }
      
      ?>

      <?php
      $conexao = mysqli_connect($servername,$username,$password,$dbname) or die ( 'Nao foi possiviel conectar');

      $_SESSION['algumusuariologado'] = false;

if (isset($_POST['emaillogin']) and (isset($_POST['senhalogin']))) {

$emaillogin = mysqli_real_escape_string($conexao, $_POST['emaillogin']);
$senhalogin = mysqli_real_escape_string($conexao, $_POST['senhalogin']);


$query = "select * from cliente where emailcliente ='{$emaillogin}' and senhacliente=md5('{$senhalogin}');";

$result = mysqli_query($conexao,$query);
$row = mysqli_num_rows($result);
if ($row == 1) {
  $queryname = "select nomecliente from cliente where emailcliente ='{$emaillogin}' and senhacliente=md5('{$senhalogin}');";

  $resultname = mysqli_query($conexao, $queryname);
  $resultnamearray = mysqli_fetch_assoc($resultname);


  $querytipo = "select tipocliente from cliente where emailcliente ='{$emaillogin}' and senhacliente=md5('{$senhalogin}');";
  $resulttipo = mysqli_query($conexao, $querytipo);
  $resulttipoarray = mysqli_fetch_assoc($resulttipo);

  if (implode($resulttipoarray) == 'admin') {
    $_SESSION['usuariotipo'] = 'admin';
  }else{
    $_SESSION['usuariotipo'] = 'normal';
  }

    $_SESSION['emaillogado'] = $emaillogin;
    $_SESSION['usuarionome'] = $resultnamearray;
    $_SESSION['usuariologado'] = $queryname;
    $_SESSION['algumusuariologado'] = true;
}else{
  echo "<script type='text/javascript'>alert('Dados nao conferem');</script>";
}

}




$_SESSION['usuario_existe'] = false;
if (isset($_POST['cadastrarregistrar'])) {


$nomeregistrar = mysqli_real_escape_string($conexao, trim($_POST['nomeregistrar']));
$emailregistrar = mysqli_real_escape_string($conexao, trim($_POST['emailregistrar']));
$senharegistrar = mysqli_real_escape_string($conexao, trim(md5($_POST['senharegistrar'])));

$sql = "select count(*) as total from bd_mercadinho.cliente where emailcliente = '$emailregistrar';";
$result = mysqli_query($conexao,$sql);
$row = mysqli_fetch_assoc($result);

if ($row['total'] == 1){
  $_SESSION['usuario_existe'] = true; 
  
}else{
  $_SESSION['usuario_existe'] = false;
}



if (!$row['total'] == 1){
  $adminregistro = mb_strpos($_POST['senharegistrar'],'admin');
  if ($adminregistro !== false) {
    $sql = "INSERT INTO bd_mercadinho.cliente (nomecliente,emailcliente,senhacliente,tipocliente) VALUE ('$nomeregistrar','$emailregistrar','$senharegistrar','admin');";

    if($conexao->query($sql) === true ){
      $_SESSION['status_cadastro'] = true;
    }else{
      $_SESSION['status_cadastro'] = false;
    }
    
  }else{

  $sql = "INSERT INTO bd_mercadinho.cliente (nomecliente,emailcliente,senhacliente,tipocliente) VALUE ('$nomeregistrar','$emailregistrar','$senharegistrar','normal');";

  if($conexao->query($sql) === true ){
    $_SESSION['status_cadastro'] = true;
  }else{
    $_SESSION['status_cadastro'] = false;
  }
  
}
}
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mercadin</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">

    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Inconsolata&display=swap" rel="stylesheet">

<style>

  /* .logineregistro{
    width: 100%;
    display:flex;
    margin:auto;
  }
.loginnn{
 padding-left: 2%;
  width: 50%;
  text-align: center;
  font-family: 'Inconsolata', monospace;
  border-left: 2px double #000000;

}
.cadastro{
  width: 50%;

}
.logado{
  width: 150px;
  height: 50px;
  font-size:15px;
  text-align:center;
  color:white;
  border-radius:5px;
  background-color: #740306;
} */

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



    </div>

          <!-- <div class='logado'>Logado com:</div> -->
          
         
          
        </div>
      </header>

    <div class="logineregistro">

    <div class="cadastro">

   <form name="formCadastro" action=""  method="post" onsubmit="return verificaRegistro()">
              <h1>Registro de cliente</h1>
              <div class="registertitle">Nome Completo:</div>
              <div class="name">
                  <input type="text" class="form-control" id="Name" placeholder="Seu nome completo" name="nomeregistrar">
              </div>
              <div class="registertitle">Email:</div>
              <div class="email">
              <input type="email" class="form-control" id="Email" aria-describedby="emailHelp" placeholder="Seu email" name="emailregistrar">
              </div>
              <div class="registertitle">Sua senha:</div>
              <div class="name">
                  <input type="password" class="form-control" id="Password" placeholder="Senha" name="senharegistrar">
              </div>
              <div class="registertitle">Confirmar senha:</div>
              <div class="name">
                  <input type="password" class="form-control" id="ConfirmPassword" placeholder="Senha" name="confirmeregistrar">
              </div>
              <div class="btnRegister">
              <button type="submit" class="btn btn-primary btn-block" name="cadastrarregistrar">Cadastrar</button>
          </div>
          <?php 
          if ($_SESSION['usuario_existe']) {
            echo "EMAIL JÁ FOI CADASTRADO! TENTE UM NOVO!";
          }else{ 
          echo " ";
        }
          ?>
    </form>

    </div>

      <div class="loginnn">
              <form name="formCadastro" action=""  method="post">
                  <h1>Login</h1>
                  <div class="registertitle">Email:</div>
                  <div class="email">
                  <input type="email" class="form-control" id="Email"       aria-describedby="emailHelp" placeholder="Seu email" name="emaillogin" >
                  </div>
                  <div class="registertitle">Sua senha:</div>
                  <div class="name">
                      <input type="password" class="form-control" id="Password"       placeholder="Senha" name="senhalogin" >
                  </div>
                  <div class="btnRegister">
                  <button type="submit" class="btn btn-primary btn-block" width=>Login</      button>
                </div>
                  </form>
          </div>  

      </div>


  <script>

  function verificaRegistro() {
  var x = document.forms["formCadastro"]["senharegistrar"].value;
  var y = document.forms["formCadastro"]["confirmeregistrar"].value;
  if (x != y) {
    alert("Senha diferentes");
    return false;
  }
}


</script>
    
    <script src="front.js"></script>
</body>
</html>