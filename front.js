

function verificaRegistro() {
  var x = document.forms["formCadastro"]["senha"].value;
  var y = document.forms["formCadastro"]["confirme"].value;
  if (x != y) {
    alert("Senha diferentes");
    return false;
  }
}
