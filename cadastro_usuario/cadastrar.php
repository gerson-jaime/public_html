<?php
include "../connect.php";

//Recebendo dados do formulario
$nome = $_POST['nome'];
$sobrenome = $_POST['sobrenome'];
$email = $_POST['email'];
$contacto = $_POST['contacto'];
$senha = $_POST['senha'];
$tipo_login = $_POST['tipo_login'];

$sql = "INSERT INTO `usuarios` ( `nome`, `sobrenome`, `email`, `contacto`, `senha`, `tipo_login`)";
$sql .= "VALUES ('$nome', '$sobrenome', '$email', '$contacto', '$senha', '$tipo_login ');";

mysqli_query($strcon, $sql) or die("Erro ao cadastrar o cliente!");
mysqli_close($strcon);
header("Location:cadastro.php");
exit();
?>
