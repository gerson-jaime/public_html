
<?php
echo 
"
<div class='sidebar'>
<div class='logo-details'>
    <i class='bx bx-tv'></i>
    <span class='logo_name'>tvcabo</span>
</div>
<ul class='nav-links'>
    <li class='selecionar'>
        <a href='../cadastro_gerador/listar.php?codigo=$codigo'>
            <i class='bx bx-cog'></i>
            <span class='links_name'>Selecionar</span>
        </a>
    </li>
    <li class='motor'>
        <a href='../motor/main.php?codigo=$codigo' >
            <i class='bx bxs-radiation'></i>
            <span class='links_name'>Motor</span>
        </a>
    </li>
    <li class='gerador'>
    <a href='../gerador/main.php?codigo=$codigo' >
        <i class='bx bx-chip'></i>
        <span class='links_name'>Gerador</span>
    </a>
</li>
    <li  class='rede'>
            <a href='../rede/rede.php?codigo=$codigo'>
            <i class='bx bxs-plug'></i>
            <span class='links_name'>Rede</span>
        </a>
    </li>
    <li  class='usuarios'>
           <a href='../cadastro_usuario/cadastro.php?codigo=$codigo'>
            <i class='bx bx-user'></i>
            <span class='links_name'>Usuários</span>
        </a>
    </li>
    <li class='analise'>
        <a href='#'>
            <i class='bx bx-line-chart'></i>
            <span class='links_name'>Análise</span>
        </a>
    </li>
    <li class='suporte'>
        <a href='#'>
            <i class='bx bxs-phone-call'></i>
            <span class='links_name'>Suporte</span>
        </a>
    </li>
    <li class='mensagens'>
        <a href='#'>
            <i class='bx bx-message'></i>
            <span class='links_name'>Mensagens</span>
        </a>
    </li>

    <li class='log_out'>
        <a href='../index.html'>
            <i class='bx bx-log-out'></i>
            <span class='links_name'>Sair</span>
        </a>
    </li>
</ul>
</div>
"
?>