<?php
include "../connect.php";

//Recebendo dados do formulario
$form_email = $_POST['email'];
$form_senha = $_POST['senha'];
$form_tipo_login = $_POST['tipo_login'];

$sql = "SELECT email, senha, tipo_login FROM `usuarios` WHERE email = '$form_email';";
$res = mysqli_query($strcon, $sql) or die("Erro ao tentar consultar a BD");

//Obtendo os dados por meio de um loop while
while($registro = mysqli_fetch_array($res)){
    if($form_email == $registro['email']){
        if($form_senha == $registro['senha']){
            header("Location:../cadastro_gerador/listar.php");
            exit();
        } 
    }
    header("Location:../index.html");
    exit();
}
mysqli_close($strcon);
?>
