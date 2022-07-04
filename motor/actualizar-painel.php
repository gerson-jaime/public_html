<?php
include "../connect.php";

if(isset($_GET['codigo'])) $codigo = $_GET['codigo'];

$sql ="SELECT * FROM " .$codigo ." WHERE `id` = (SELECT MAX(`id`) FROM " .$codigo .");";
$res = mysqli_query($strcon, $sql) or die("Erro ao tentar consultar a BD");

//Obtendo os dados por meio de um loop while
while($registro = mysqli_fetch_array($res)){
$bateria = $registro['bateria'];
$combustivel = $registro['combustivel'];
$pressao = $registro['pressao'];
$temperatura = $registro['temperatura'];
$estado = $registro['estado'];
}
mysqli_close($strcon);

$obj = ["bateria" => $bateria + 0, "combustivel" => $combustivel + 0, "pressao" => $pressao + 0, "temperatura" => $temperatura + 0 , "estado" => $estado];
$JSON = json_encode($obj);
echo $JSON;
?>