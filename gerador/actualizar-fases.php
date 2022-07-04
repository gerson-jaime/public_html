<?php
include "../connect.php";
if(isset($_GET['codigo'])) $codigo = $_GET['codigo'];

$sql ="SELECT * FROM " .$codigo ." WHERE `id` = (SELECT MAX(`id`) FROM " .$codigo .");";
$res = mysqli_query($strcon, $sql) or die("Erro ao tentar consultar a BD");

//Obtendo os dados por meio de um loop while
while($registro = mysqli_fetch_array($res)){
$tensao_R = $registro['tensao_R'];
$corrent_R = $registro['corrente_R'];
$potencia_R= $registro['potencia_R'];
$energia_R = $registro['energia_R'];
$frequencia_R = $registro['frequencia_R'];
$factor_R = $registro['factor_R'];

$tensao_S = $registro['tensao_S'];
$corrent_S = $registro['corrente_S'];
$potencia_S= $registro['potencia_S'];
$energia_S = $registro['energia_S'];
$frequencia_S = $registro['frequencia_S'];
$factor_S = $registro['factor_S'];

$tensao_T = $registro['tensao_T'];
$corrent_T = $registro['corrente_T'];
$potencia_T= $registro['potencia_T'];
$energia_T = $registro['energia_T'];
$frequencia_T = $registro['frequencia_T'];
$factor_T = $registro['factor_T'];
}
mysqli_close($strcon);

$fase_r = ["nome" => "R","tensao" => $tensao_R + 0,"corrente" => $corrent_R + 0, 
           "potencia" => $potencia_R + 0,"energia" => $energia_R + 0, 
           "frequencia" => $frequencia_R + 0,"factor" => $factor_R + 0];
$fase_s = ["nome" => "S","tensao" => $tensao_S + 0,"corrente" => $corrent_S + 0, 
           "potencia" => $potencia_S + 0,"energia" => $energia_S + 0, 
           "frequencia" => $frequencia_S + 0,"factor" => $factor_S + 0];
$fase_t = ["nome" => "T","tensao" => $tensao_T + 0,"corrente" => $corrent_T + 0, 
           "potencia" => $potencia_T + 0,"energia" => $energia_T + 0, 
           "frequencia" => $frequencia_T + 0,"factor" => $factor_T + 0];

$fases = [$fase_r, $fase_s, $fase_t];         
$JSON = json_encode($fases);
echo $JSON;
?>