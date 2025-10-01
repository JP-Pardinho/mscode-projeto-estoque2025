<body>
    <header>
        <div class="border-bottom mb-2">
            <div class="container">
                <div class="d-flex flex-wrap justify-content-center align-items-center py-3">
                    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                        <img class="me-2" src="../assets/images/logotipo.svg" width="53">
                        <span class="fs-4">MS Code - Estoque</span>
                    </a>

                    <ul class="nav nav-pills d-flex align-items-center">
                        <li class="nav-item"><a href="/" class="nav-link active" aria-current="page">Início</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Vendas
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/vendas-realizadas">Vendas realizadas</a></li>
                                <li><a class="dropdown-item" href="/nova-venda">Nova venda</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Produtos
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="/tela-produtos">Estoque</a></li>
                                <li><a class="dropdown-item" href="/tela-categorias">Categorias</a></li>
                            </ul>
                        </li>

                        <?php if (isset($_SESSION['usuario_logado'])): ?>
                            <li class="nav-item dropdown">
                                <a id="seta-dropdown" class="nav-link dropdown-toggle d-flex align-items-center text-decoration-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle fs-3 me-2"></i>
                                    <span class="fs-6">
                                        <small>Olá, <?php echo $_SESSION['nome'] ?> :D </small> <br>
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/tela-perfil">Meu perfil</a></li>
                                    <li><a class="dropdown-item " href="/logout">Sair</a></li>
                                </ul>
                            </li>
                        <?php else: ?>
                            <li class="nav-item dropdown">
                                <a id="seta-dropdown" class="nav-link dropdown-toggle d-flex align-items-center text-decoration-none" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-person-circle fs-3 me-2"></i>
                                    <span class="fs-6">
                                        <small>Bem-vindo :D</small> <br>
                                        Entre ou Cadastre-se
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/tela-login">Entrar</a></li>
                                    <li><a class="dropdown-item" href="/tela-cadastro">Cadastrar</a></li>
                                </ul>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>