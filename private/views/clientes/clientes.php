<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ISEP Ginásio</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="../../assets/img/gym125.png" type="image/png">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Titillium+Web:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700&display=swap"
        rel="stylesheet">

    <!-- Font Awesome (local) -->
    <link rel="stylesheet" href="../../assets/fontawesome/all.min.css">

    <!-- estilos -->
    <link rel="stylesheet" href="../../assets/css/app.css">
</head>

<body>
    <!-- Navbar -->
    <header class="bng-navbar-menu">

        <div>
            <!-- Logo e Nome -->
            <a href="../../index.php">
                <img src="../../assets/img/gym125_white.png" alt="Logo do ISEP Ginásio">
            </a>
            <h3>ISEP Ginásio</h3>
        </div>

        <div class="col-6 text-end p-3">
                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa-regular fa-user me-2"></i> Utilizador
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#"><i class="fa-solid fa-key me-2"></i>Alterar password</a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="login_form.html"><i
                                    class="fa-solid fa-right-from-bracket me-2"></i>Sair</a></li>
                    </ul>
                </div>
            </div>

    </header>

    <!-- Sidebar -->
    <aside class="col-md-3 col-lg-2 bg-secondary text-white p-3 min-vh-100">

        <h4>Menu</h4>

        <nav>

            <a href="lista.php" class="nav-link text-white px-0 mb-2 d-block">
                <i class="fas fa-users"></i> &ensp; Clientes
            </a>

            <a href="../agendamento/agendamento.html" class="nav-link text-white px-0 mb-2 d-block">
                <i class="fas fa-calendar-alt"></i> &ensp; Agendamento de treinos
            </a>

            <a href="../plano_treino/plano_treino.html" class="nav-link text-white px-0 mb-2 d-block">
                <i class="fas fa-dumbbell"></i> &ensp; Planos de Treino
            </a>

            <a href="../equipamentos/equipamentos.html" class="nav-link text-white px-0 mb-2 d-block">
                <i class="fas fa-cogs"></i> &ensp; Equipamentos
            </a>

            <a href="../produtos_servicos/produtos_servicos.html" class="nav-link text-white px-0 mb-2 d-block">
                <i class="fas fa-box-open"></i> &ensp; Produtos e Serviços
            </a>

        </nav>

    </aside>

    <!-- Conteúdo Principal -->
    <main class="content">
        <section>
            <h2>Gestão de Clientes</h2>
            <p>Aqui poderá consultar, adicionar, editar e remover os clientes do ginásio.</p>
        </section>
    </main>

</body>

</html>