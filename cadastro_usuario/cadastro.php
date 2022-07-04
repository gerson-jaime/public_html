<?php
include "../connect.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql =  "DELETE FROM usuarios WHERE `usuarios`.`id` = '$id';";
    $res = mysqli_query($strcon, $sql) or die("Erro ao tentar consultar a BD");                        
    }
if(isset($_GET['codigo'])) $codigo = $_GET['codigo'];
?>

<!DOCTYPE html>
<html lang="pt">

<head>
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
                   <table class="styled-table">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Senha</th>
                            <th>Login</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                            <?php
                            $sql = "SELECT id, nome, senha, tipo_login FROM `usuarios`;";
                            $res = mysqli_query($strcon, $sql) or die("Erro ao tentar consultar a BD");
                            
                            //Obtendo os dados por meio de um loop while
                            while($registro = $res->fetch_assoc()){
                              echo "<tr>
                                    <td>" .$registro['nome'] ."</td>
                                    <td>" .$registro['senha'] ."</td>
                                    <td>" .$registro['tipo_login'] ."</td>
                                    <td>
                                        <div class='login-button'>
                                        <a href='cadastro.php?id=".$registro['id']."'><button><i class='bx bx-trash'></i></button></a>
                                        <a href=''><button><i class='bx bx-edit'></i></button></a>
                                        </div>
                                    </td>
                                    </tr>";
                            }
                            ?>
                    </tbody>
                </table>
                </div>
                    <div class="form">
                        <form action="cadastrar.php" method="POST" >
                            <div class="form-header">
                                <div class="title">
                                    <h1>Dados do usuário</h1>
                                </div>
                                <div class="login-button">
                                    <button><a href="../index.html">Entrar</a></button>
                                </div>
                            </div>
            
                            <div class="input-group">
                                <div class="input-box">
                                    <label for="nome">Primeiro Nome</label>
                                    <input id="nome" type="text" name="nome" placeholder="Digite seu primeiro nome" required>
                                </div>
            
                                <div class="input-box">
                                    <label for="sobrenome">Sobrenome</label>
                                    <input id="sobrenome" type="text" name="sobrenome" placeholder="Digite seu sobrenome" required>
                                </div>
                                <div class="input-box">
                                    <label for="email">E-mail</label>
                                    <input id="email" type="email" name="email" placeholder="Digite seu e-mail" required>
                                </div>
            
                                <div class="input-box">
                                    <label for="contacto">Celular</label>
                                    <input id="contacto" type="tel" name="contacto" placeholder="(xx) xxxx-xxxx" required>
                                </div>
            
                                <div class="input-box">
                                    <label for="senha">Senha</label>
                                    <input id="senha" type="password" name="senha" placeholder="Digite sua senha" required>
                                </div>
            
            
                                <div class="input-box">
                                    <label for="confirmPassword">Confirme sua Senha</label>
                                    <input id="confirmPassword" type="password" name="confirmPassword" placeholder="Digite sua senha novamente" required>
                                </div>
            
                            </div>
            
                            <div class="gender-inputs">
                                <div class="gender-title">
                                    <h6>Entrar como</h6>
                                </div>
            
                                <div class="gender-group">
                                    <div class="gender-input">
                                        <input id="administrador" type="radio" name="tipo_login" value="admin" checked>
                                        <label for="administrador">Administrador</label>
                                    </div>
            
                                    <div class="gender-input">
                                        <input id="comum" type="radio" name="tipo_login" value="comum">
                                        <label for="comum">Usuário comum</label>
                                    </div>
            
                                </div>
                            </div>
            
                            <div class="continue-button">
                                <button type="submit">Continuar</button>
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