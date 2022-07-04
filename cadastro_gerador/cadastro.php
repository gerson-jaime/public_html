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
    <link rel="stylesheet" href="style_cadastro.css">
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
                    <div class="container">
                        <div class="form-image">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d57408.39
                            093455771!2d32.456408399999994!3d-25.934422499999997!2m3!1f0!2f0!3f0!3m2!1i1024
                            !2i768!4f13.1!3m3!1m2!1s0x1ee685eaf8463a1d%3A0x31a02ab3bc2dc83c!2sMatola!5e0!3m2!
                            1spt-PT!2smz!4v1654787523040!5m2!1spt-PT!2smz"   width="100%" height="100%"
                            style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                        </div>
                        <div class="form">
                            <form action="cadastrar.php?codigo=<?=$codigo?>" method="POST" >
                                <div class="form-header">
                                    <div class="title">
                                        <h1>Dados do gerador</h1>
                                    </div>
                                </div>
                
                                <div class="input-group">
                                    <div class="input-box">
                                        <label for="codigo">Código</label>
                                        <input id="codigo" type="text" name="codigo" placeholder="GXXX" required>
                                    </div>
                                    
                                    <div class="input-box">
                                        <label for="nome">Modelo</label>
                                        <input id="nome" type="text" name="modelo" placeholder="Digite o modelo" required>
                                    </div>
                
                                    <div class="input-box">
                                        <label for="sobrenome">Localização</label>
                                        <input id="sobrenome" type="text" name="localizacao" placeholder="Digite a localização " required>
                                    </div>
                                </div>
                                <div class="continue-button">
                                <a id='btnVoltar' href='listar.php'>
                                    <i class='bx bx-arrow-back' ></i>    Voltar
                                </a>
                                    <button type="submit">Guardar</button>
                                </div>
                            </form>
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
