<?php
include "../connect.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql =  "DELETE FROM `geradores` WHERE `geradores`.`id` = '$id';";
    $res = mysqli_query($strcon, $sql) or die("Erro ao tentar consultar a BD");                        
    }
if(isset($_GET['codigo'])) $codigo = $_GET['codigo'];
else $codigo = 'G001';
?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js" type="text/javascript"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>tvcabo</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../side_nav.css">
    <link rel="stylesheet" href="style_listar.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php
        include "../side_bar.php";
    ?>
    <section class="home-section">
            <nav>
                <?php
                    include "../nav.php";
                ?>
            </nav>
        <div class="home-content">
            <div class="overview-boxes">
                        <?php
                        $sql = "SELECT * FROM `geradores`;";
                        $res = mysqli_query($strcon, $sql) or 
                        die("Erro ao tentar consultar a BD");
                        
                        //Obtendo os dados por meio de um loop while
                        while($registro = mysqli_fetch_array($res)){
                           echo "
                    <div class='box'>
                        <div class='right-side'>
                           <div class='box-topic'>" .$registro['modelo'] ."</div>
                           <div class='number' id='bateria'>" .$registro['codigo'] ."</div>
                           <div class='indicator'>
                               <i class='bx bxs-map'></i>
                               <span class='text'>" .$registro['localizacao'] ."</span>
                           </div>
                        </div>
                        <a href='../gerador/main.php?codigo=".$registro['codigo'] ."'>
                        <i class='bx bx-broadcast cart'></i>
                        </a>
                        <a href='listar.php?id=".$registro['id']."'>
                        <i class='bx bx-trash cart four'></i>
                        </a>
                    </div>";
                    
                        }
                        mysqli_close($strcon);
                        ?>
                    
                    <div class='box'>
                        <div class='right-side'>
                            <div class='box-topic'>Adcionar</div>
                           <div class='number' id='bateria'>novo</div>
                           <div class='indicator'>
                               <i class='bx bx-list-plus'></i>
                               <span class='text'>Gerador</span>
                           </div>
                        </div>
                        <a href='cadastro.php?codigo=<?=$codigo?>'>
                        <i class='bx bxs-plus-circle cart two'></i>
                        </a>
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
