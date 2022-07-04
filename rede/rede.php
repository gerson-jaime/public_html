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
    <link rel="stylesheet" href="rede.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body onload="lerBaseDados()">
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
                        <img src='../image/EDM.PNG' alt='IMG EDM'>
                            <div class='right-side'>
                                <div class='number'>EDM</div>
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
            <div class="phase-boxes">
                <div class="sub-phase-boxes box">
                    <div class='horizontal_line'></div>
                    <section id="section_R">
                        <h2 id="header_R">R N</i></h2>
                        <div class='sub_section'>
                            <div>
                                <div class="skill">
                                    <div class="outer">
                                        <div class="inner">
                                            <div id="number" class="val_tensao_R">
                                            </div>
                                        </div>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="160px" height="160px">
                                        <defs>
                                            <linearGradient id="GradientColor">
                                                <stop offset="0%" stop-color="#094e7949" />
                                                <stop offset="100%" stop-color="#0A2558" />
                                            </linearGradient>
                                        </defs>
                                        <circle cx="80" cy="80" r="70" stroke-linecap="round" id="circle" class="circ_tensao_R" />
                                    </svg>
                                </div>
                                <div class="skill">
                    
                                    <div class="outer">
                                        <div class="inner">
                                            <div id="number" class="val_corrente_R">
                                            </div>
                                        </div>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="160px" height="160px">
                                        <defs>
                                            <linearGradient id="GradientColor">
                                                <stop offset="0%" stop-color="#e91e63" />
                                                <stop offset="100%" stop-color="#673ab7" />
                                            </linearGradient>
                                        </defs>
                                        <circle cx="80" cy="80" r="70" stroke-linecap="round" id="circle" class="circ_corrente_R" />
                                    </svg>
                                </div>
                            </div>
                            <!--Novo-->
                            <div class="info" id="info_R">
                                <p class="infoHeader"><i class='bx bx-chip'></i> Dados da fase</p>
                                <div class="elementos">
                                    <div class="grandeza">
                                        <ul type="none">
                                            <li> <span>&#10023;</span> Potência
                                            <li> <span>&#10023;</span> Energia
                                            <li> <span>&#8737;</span> Factor de potência
                                            <li> <span>&#8767;</span> Frequência
                                        </ul>
                                    </div>
                                    <div class="valores" id="tensoes_R">
                                        <ul type="none">
                                            <li><span id="potencia_R">0</span> W </li>
                                            <li><span id="energia_R">0</span> Wh</li>
                                            <li><span id="factor_R">0</span> </li>
                                            <li><span id="frequencia_R">0</span> Hz</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="section_S">
                        <h2 id="header_S">S N</h2>
                        <div class='sub_section'>
                            <div>
                                <div class="skill">
                                    <div class="outer">
                                        <div class="inner">
                                            <div id="number" class="val_tensao_S">
                                            </div>
                                        </div>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="160px" height="160px">
                                        <defs>
                                            <linearGradient id="GradientColor">
                                                <stop offset="0%" stop-color="#e91e63" />
                                                <stop offset="100%" stop-color="#673ab7" />
                                            </linearGradient>
                                        </defs>
                                        <circle cx="80" cy="80" r="70" stroke-linecap="round" id="circle" class="circ_tensao_S" />
                                    </svg>
                                </div>
                                <div class="skill">
                                    <div class="outer">
                                        <div class="inner">
                                            <div id="number" class="val_corrente_S">
                                            </div>
                                        </div>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="160px" height="160px">
                                        <defs>
                                            <linearGradient id="GradientColor">
                                                <stop offset="0%" stop-color="#e91e63" />
                                                <stop offset="100%" stop-color="#673ab7" />
                                            </linearGradient>
                                        </defs>
                                        <circle cx="80" cy="80" r="70" stroke-linecap="round" id="circle" class="circ_corrente_S" />
                                    </svg>
                    
                                </div>
                            </div>
                            <!--Novo-->
                            <div class="info" id="info_S">
                                <p class="infoHeader"><i class='bx bx-chip'></i> Dados da fase</p>
                                <div class="elementos">
                                    <div class="grandeza">
                                        <ul type="none">
                                            <li> <span>&#10023;</span> Potência
                                            <li> <span>&#10023;</span> Energia
                                            <li> <span>&#8737;</span> Factor de potência
                                            <li> <span>&#8767;</span> Frequência
                                        </ul>
                                    </div>
                                    <div class="valores" id="tensoes_S">
                                        <ul type="none">
                                            <li><span id="potencia_S">0</span> W </li>
                                            <li><span id="energia_S">0</span> Wh</li>
                                            <li><span id="factor_S">0</span> </li>
                                            <li><span id="frequencia_S">0</span> Hz</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section id="section_T">
                        <h2 id="header_T">T N</h2>
                        <div class='sub_section'>
                            <div>
                                <div class="skill">
                                    <div class="outer">
                                        <div class="inner">
                                            <div id="number" class="val_tensao_T">
                                            </div>
                                        </div>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="160px" height="160px">
                                        <defs>
                                            <linearGradient id="GradientColor">
                                                <stop offset="0%" stop-color="#e91e63" />
                                                <stop offset="100%" stop-color="#673ab7" />
                                            </linearGradient>
                                        </defs>
                                        <circle cx="80" cy="80" r="70" stroke-linecap="round" id="circle" class="circ_tensao_T" />
                                    </svg>
                                </div>
                                <div class="skill">
                                    <div class="outer">
                                        <div class="inner">
                                            <div id="number" class="val_corrente_T">
                                            </div>
                                        </div>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" version="1.1" width="160px" height="160px">
                                        <defs>
                                            <linearGradient id="GradientColor">
                                                <stop offset="0%" stop-color="#e91e63" />
                                                <stop offset="100%" stop-color="#673ab7" />
                                            </linearGradient>
                                        </defs>
                                        <circle cx="80" cy="80" r="70" stroke-linecap="round" id="circle" class="circ_corrente_T" />
                                    </svg>
                                </div>
                            </div>
                            <div class="info" id="info_T">
                                <p class="infoHeader"><i class='bx bx-chip'></i> Dados da fase</p>
                                <div class="elementos">
                                    <div class="grandeza">
                                        <ul type="none">
                                            <li> <span>&#10023;</span> Potência
                                            <li> <span>&#10023;</span> Energia
                                            <li> <span>&#8737;</span> Factor de potência
                                            <li> <span>&#8767;</span> Frequência
                                        </ul>
                                    </div>
                                    <div class="valores" id="tensoes_T">
                                        <ul type="none">
                                            <li><span id="potencia_T">0</span> W </li>
                                            <li><span id="energia_T">0</span> Wh</li>
                                            <li><span id="factor_T">0</span> </li>
                                            <li><span id="frequencia_T">0</span> Hz</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                 
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
