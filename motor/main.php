<?php
include "../connect.php";
if(isset($_GET['codigo'])) $codigo = $_GET['codigo'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>tvcabo</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../side_nav.css">
    <link rel="stylesheet" href="main_style.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body onload='lerBaseDados("<?=$codigo?>")'>
    <?php
        include "../side_bar.php";
    ?>
    <section class="home-section">
        <nav>
            <?php
                include "../nav.php";
            ?>

            <div class='profile-container'>
                <div class="profile-details" id="estado">
                </div>
            </div>
        </nav>

        <div class="home-content">
        <div class="overview-boxes">
                <?php
                        $sql = "SELECT * FROM `geradores` WHERE `geradores`.`codigo`='" .$codigo ."'";
                        $res = mysqli_query($strcon, $sql) or 
                        die("Erro ao tentar consultar a BD");
                        
                        //Obtendo os dados por meio de um loop while
                    if($registro = mysqli_fetch_array($res)){
                        echo "
                        <div class='box' id='box-info'>
                        <img src='../image/$codigo.PNG' alt='IMG Controller'>
                            <div class='right-side'>
                                <div class='number'>" .$registro['modelo'] ."</div>
                               <div class='box-text'>ID: " .$registro['codigo'] ."</div>
                               <div class='box-text'> Estado do Motor/Gerador: Em repouso </div>
                               <div class='box-text'> Estado da rede: Rede On</div>
                               <div class='box-text'> Estado da carga: Conectada a rede </div>
                               <div class='box-text'> Estado do Modo: Auto</div>
                            </div>
                        </div>";
                    }
                       mysqli_close($strcon);
                ?> 
                <div class='box' id='box-info' style="display: inline-block;    background: rgba(0, 0, 0, 0);">
                    <div class="sub-box-button" >
                        <div class="widget" style="left: 40px; top: 460px;">
                            <div style="width: 85px; height: 85px;">
                                <img id="img_trasnferir_para_rede" class="buttonWidget_enabled" src="../button-img/Trasferir_para_Rede.png" title="Trasferir para Rede" style="width: 85px; height: 85px;">
                            </div>
                            <div style="display: inline-block;">
                                <div style="display: flex; align-items: center;">
                                    <div class="led led_trasnferir_para_rede"></div><span>Dijuntor da rede</span>
                                </div>
                                <div style="display: flex; align-items: center;">
                                    <div class="led led_trasnferir_para_rede"></div> <span>Rede disponível</span>
                                </div>
                            </div>
                        </div>
                        <div class="widget" style="left: 400px; top: 460px;">
                            <div style="width: 85px; height: 85px;">
                                <img id="img_transferir_para_gerador" class="buttonWidget_enabled" src="../button-img/Transferir_para_Gerador.png" title="Transferir para Gerador" style="width: 85px; height: 85px;">
                            </div>
                            <div style="display: inline-block;">
                                <div style="display: flex; align-items: center;">
                                    <div class="led led_transferir_para_gerador"></div><span>Dijuntor do gerador</span>
                                </div>
                                <div style="display: flex; align-items: center;">
                                    <div class="led led_transferir_para_gerador"></div> <span>Gerador disponível</span>
                                </div>
                            </div>                            
                        </div>
                    </div>
                    <div class="sub-box-button" >
                        <div class="widget" style="left: 640px; top: 560px;">
                            <div style="width: 85px; height: 85px;">
                                <img class="buttonWidget_enabled" src="../button-img/Start.png" title="Start" style="width: 85px; height: 85px;">
                            </div>

                        </div>
                        <div class="widget" style="left: 40px; top: 560px;">
                            <div style="width: 85px; height: 85px;">
                                <img class="buttonWidget_enabled" src="../button-img/Parar.png" title="Parar" style="width: 85px; height: 85px;">
                            </div>
                        </div>
                        <div class="widget" style="left: 280px; top: 560px;">
                            <div style="width: 85px; height: 85px;">
                                <img id="img_teste" class="buttonWidget_enabled" src="../button-img/Teste.png" title="Teste" style="width: 85px; height: 85px;">
                                <div class="led led_teste"></div>
                            </div>
                        </div>
                        <div class="widget" style="left: 160px; top: 560px;">
                            <div style="width: 85px; height: 85px;">
                                <img id="img_manual" class="buttonWidget_enabled" src="../button-img/Manual.png" title="Manual" style="width: 85px; height: 85px;">
                                <div class="led led_manual"></div>
                            </div>
                        </div>
                        <div class="widget" style="left: 400px; top: 560px;">
                            <div style="width: 85px; height: 85px;">
                                <img id="img_auto" class="buttonWidget_enabled" src="../button-img/Auto.png" title="Auto" style="width: 85px; height: 85px;">
                                <div class="led led_auto"></div>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
            <div class="overview-boxes">
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Bateria</div>
                        <div class="number" id="bateria">13.4V</div>
                        <div class="indicator">
                            <i class='bx bx-up-arrow-alt'></i>
                            <span class="text">Up from yesterday</span>
                        </div>
                    </div>
                    <i class='bx bxs-car-battery cart'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Combustível</div>
                        <div class="number" id="combustivel">97%</div>
                        <div class="indicator">
                            <i class='bx bx-up-arrow-alt'></i>
                            <span class="text">Up from yesterday</span>
                        </div>
                    </div>
                    <i class='bx bxs-hot cart two'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Óleo</div>
                        <div class="number" id="pressao">0.0bar</div>
                        <div class="indicator">
                            <i class='bx bx-up-arrow-alt'></i>
                            <span class="text">Up from yesterday</span>
                        </div>
                    </div>
                    <i class='bx bxs-filter-alt cart three'></i>
                </div>
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Temperatura</div>
                        <div class="number" id="temperatura">+20&deg;C</div>
                        <div class="indicator">
                            <i class='bx bx-down-arrow-alt down'></i>
                            <span class="text">Down From Today</span>
                        </div>
                    </div>
                    <i class='bx bxs-thermometer cart four'></i>
                </div>
            </div>
        </div>
    </section>
    <footer><!--New-->
        <p>&copy; 2022 - Site criado por <a href="#">Gerson Jaime</a> para a <a href="#">tvcabo</a>.</p>
    </footer>
    <script src="script.js"></script>		
</body>
</html>
