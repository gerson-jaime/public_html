<?php

//Base de dados
include "connect.php";
$sql ="SELECT * FROM `G001` WHERE `id` = (SELECT MAX(`id`) FROM `G001`);";
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

$bateria = $registro['bateria'];
$combustivel = $registro['combustivel'];
$pressao = $registro['pressao'];
$temperatura = $registro['temperatura'];
$estado = $registro['estado'];
}

// Messagem
$msg = 'Estado:     '.$estado ."\n";
$msg .='Bateria:    '.$bateria .' V' ."\n";
$msg .='Corrente:  '.$corrent_R  .' A';
$msg = urlencode($msg);

$error = '  Código Inválido' ."\n";
$error .= '------------------------------' ."\n";
$error .= 'ID              NOME' ."\n";
$error .= '------------------------------' ."\n";
$error .= 'G001   -   HIMOINSA' ."\n";
$error .= 'G002   -   LOVATO' ."\n";
$error .= 'G003   -   LOGIC 3200' ."\n";
$error .= 'G004   -   NEXYS'."\n";
$error .= '-----------------------------'."\n";
$error .= '© 2022 - Sistema criado por '."\n";
$error .= 'Gerson Jaime para a tvcabo'."\n";
$error .= '-----------------------------';

$error = urlencode($error);

//Estabelecendo conexao com o telegram
$input = file_get_contents('php://input');
$update = json_decode($input);
$message = $update -> message;
$text = $message -> text;

$chat_id = 5457712188; //$message -> chat -> id;
$token = '5586449022:AAGqg34LtaIHup82Z6QRyLzYmKmavOceN94';


if($text == 'G001' or $text == 'g001' ){
    file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$msg");
}else{
  file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$error");  
}
?>