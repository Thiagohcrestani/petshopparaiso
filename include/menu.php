  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index_menu.php"><img src="img/logo.png" width="150" height="50" alt="login"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent" ">
    <ul class=" navbar-nav mr-auto">

      <li class="nav-item dropdown" >
        <a class="nav-link dropdown-toggle"  href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Usuário
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" color="white" href="Usuario.php">Novo Usuário</a>
          <a class="dropdown-item" color="white" href="pesquisaUsuario.php">Editar Usuário</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cliente
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" color="white" href="Cliente.php">Novo Cliente</a>
          <a class="dropdown-item" color="white" href="pesquisaCliente.php">Editar Cliente</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pet
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" color="white" href="Pet.php">Novo Pet</a>
          <a class="dropdown-item" color="white" href="pesquisaPet.php">Editar Pet</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Agendamentos
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" color="white" href="Agendamento.php">Banhos e tosas</a>
          <a class="dropdown-item" color="white" href="pesquisaAgendamento.php">Editar Agendamento Banhos e tosas</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" color="white" href="Vacina.php">Vacina</a>
          <a class="dropdown-item" color="white" href="pesquisaVacina.php">Editar Agendamento Vacina</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pacotes
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" color="white" href="Pacote.php">Novo Pacote</a>
          <a class="dropdown-item" color="white" href="pesquisaPacote.php">Editar Pacote</a>
        </div>
      </li>
      <span class="navbar-text">
        <a type="button" href="Calendario.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
            <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z" />
            <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
          </svg> Calendário</a>
      </span>
      </ul>
    </div>

    <span class="navbar-text">

      <font size="" face="verdana" color="white" align="right"><?php echo $_SESSION["nome"]; ?></font>
      <button onclick="window.location.href='logoff.php'" class="btn btn-sm btn-danger" type="button">Sair</button>
    </span>
  </nav>