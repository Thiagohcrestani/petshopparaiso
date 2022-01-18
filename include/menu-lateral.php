<div id="lateral">
    <div id="menu">
        <ul class="box">
            <li><a href="index_menu.php">Página Inicial</a></li>
        </ul>
        <h3 class="link-titulo">Usuário</h3>
        <ul class="box">
            <li><a href="Usuario.php">Novo Usuário</a></li>
            <li><a href="PesquisaUsuario.php">Editar Usuário</a></li>
        </ul>
        <h3 class="link-titulo">Clientes</h3>
        <ul class="box">
            <li><a href="Cliente.php">Novo Cliente</a></li>
            <li><a href="PesquisaCliente.php">Editar Clientes</a></li>
            <li><a href="PesquisaUsuario.php">Agendamentos</a></li>
        </ul>

    </div>
    <font size="" face="verdana" color="white"><?php echo $_SESSION["nome"]; ?></font>
    <button onclick="window.location.href='logoff.php'" class="btn btn-sm btn-danger" type="button">Sair</button>
</div>