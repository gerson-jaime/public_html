<?php
include "../connect.php";
if(isset($_GET['codigo'])) $codigo = $_GET['codigo'];

//Recebendo dados do formulario
$codigo = $_POST['codigo'];
$modelo = $_POST['modelo'];
$localizacao = $_POST['localizacao'];

$sql = "INSERT INTO `geradores` ( `modelo`, `localizacao`, `codigo`) VALUES ( '$modelo', '$localizacao', '$codigo');";


mysqli_query($strcon, $sql) or die("Erro ao cadastrar o Gerador! &" .$codigo .$modelo .$localizacao);
mysqli_close($strcon);
header("Location:cadastro.php?codigo=<?=$codigo?>");
?>
