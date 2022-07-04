<?php
include "connect.php";

//Conectando ao banco de dados:
$strcon = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName) or 
die("Nao foi possivel conectar ao MySQL");

 //$_POST is a PHP Superglobal that assists us to collect/access the data, that arrives in the form of a post request made to this script.
  if(isset($_POST['tensao_R']) && isset($_POST['corrente_R'])){
        // "sendval" and "sendval2" are query parameters accessed from the HTTP POST Request made by the NodeMCU.
        $tensao_R = $_POST['tensao_R'];
        $corrente_R = $_POST['corrente_R'];
        $potencia_R= $_POST['potencia_R'];
        $energia_R = $_POST['energia_R'];
        $frequencia_R = $_POST['frequencia_R'];
        $factor_R = $_POST['factor_R'];
        
        $tensao_S = $_POST['tensao_S'];
        $corrente_S = $_POST['corrente_S'];
        $potencia_S= $_POST['potencia_S'];
        $energia_S = $_POST['energia_S'];
        $frequencia_S = $_POST['frequencia_S'];
        $factor_S = $_POST['factor_S'];

        $tensao_T = $_POST['tensao_T'];
        $corrente_T = $_POST['corrente_T'];
        $potencia_T= $_POST['potencia_T'];
        $energia_T = $_POST['energia_T'];
        $frequencia_T = $_POST['frequencia_T'];
        $factor_T = $_POST['factor_T'];

        $bateria = $_POST['bateria'];
        $combustivel = $_POST['combustivel'];
        $pressao = $_POST['pressao'];
        $temperatura = $_POST['temperatura'];
        $estado = $_POST['estado'];

        // Update your tablename here
                
                /*
                $sql = "UPDATE `gerador_001` SET";
                $sql .= "`tensao_R` = '$tensao_R', `corrente_R` = '$corrente_R',";
                $sql .= "`potencia_R` = '$potencia_R', `energia_R` = '$energia_R',";
                $sql .= "`frequencia_R` = '$frequencia_R', `factor_R` = '$factor_R',";

                $sql .= "`tensao_S` = '$tensao_S', `corrente_S` = '$corrente_S',";
                $sql .= "`potencia_S` = '$potencia_S', `energia_S` = '$energia_S',";
                $sql .= "`frequencia_S` = '$frequencia_S', `factor_S` = '$factor_S',";

                $sql .= "`tensao_T` = '$tensao_T', `corrente_T` = '$corrente_T',";
                $sql .= "`potencia_T` = '$potencia_T', `energia_T` = '$energia_T',";
                $sql .= "`frequencia_T` = '$frequencia_T', `factor_T` = '$factor_T',";

                $sql .= "`bateria` = '$bateria', `combustivel` = '$combustivel',";
                $sql .= "`pressao` = '$pressao', `temperatura` = '$temperatura',";
                $sql .= "`estado` = '$estado'";

                $sql .= "WHERE `gerador_001`.`id` = 1";
                */
            
                
                $sql = "INSERT INTO `gerador_001` (`tensao_R`, `corrente_R`, `potencia_R`, `energia_R`, `frequencia_R`, `factor_R`,";
                $sql .= "`tensao_S`, `corrente_S`, `potencia_S`, `energia_S`, `frequencia_S`, `factor_S`,";
                $sql .= "`tensao_T`, `corrente_T`, `potencia_T`, `energia_T`, `frequencia_T`, `factor_T`,";
                $sql .= "`bateria`, `combustivel`, `pressao`, `temperatura`, `estado`) ";
                $sql .= "VALUES ('$tensao_R', '$corrente_R', '$potencia_R', '$energia_R', '$frequencia_R', '$factor_R',";
                $sql .= "'$tensao_S', '$corrente_S', '$potencia_S', '$energia_S', '$frequencia_S', '$factor_S',";
                $sql .= "'$tensao_T', '$corrente_T', '$potencia_T', '$energia_T', '$frequencia_T', '$factor_T',";
                $sql .= "'$bateria', '$combustivel', '$pressao', '$temperatura', '$estado')";
                mysqli_query($strcon, $sql) or die("Erro ao adicionar o rgisto!");
                echo "MySQL";
    }
    // Close MySQL connection
    mysqli_close($strcon);
    
    // Messagem

$error =  'Bateria Fraca' ."\n";
$error .= '----------------' ."\n";
$error .= 'ID:  G001' ."\n";
$error .= '----------------' ."\n";
$error .= 'Estado:     '.$estado ."\n";
$error .='Bateria:    '.$bateria .' V' ."\n";
$error .='Corrente:  '.$corrente_R  .' A';

$error = urlencode($error);

//Estabelecendo conexao com o telegram
$input = file_get_contents('php://input');
$update = json_decode($input);
$message = $update -> message;
$text = $message -> text;

$chat_id = 5457712188;//$message -> chat -> id;
$token = '5471927718:AAG1sN1_uQM7Kj6lvb6OFnwjCWU46Hi0Dhw';

if($bateria < 10 ){
    file_get_contents("https://api.telegram.org/bot$token/sendMessage?chat_id=$chat_id&text=$error");
}
?>

