<?php
require_once __DIR__ . '/../../includes/funcoes.php';
redirect_if_not_logged(); // Inicia a sessão (se necessário) e verifica se o utilizador está autenticado

try {
    $ligacao = new PDO(
        "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE . ";charset=utf8",
        MYSQL_USERNAME,
        MYSQL_PASSWORD
    );

    $ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $resultados = $ligacao->query("SELECT * FROM clientes")->fetchAll(PDO::FETCH_OBJ);

    $erro = '';
} catch (PDOException $err) {
    $erro = "Erro na ligação à base de dados";
    $resultados = [];
}

$ligacao = null;
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/nav.php'; ?>

<div class="container-fluid">
    <div class="row">
        <?php include '../../includes/sidebar.php'; ?>

        <!-- Conteúdo Principal -->
        <div class="col-md-9 col-lg-10 p-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="mb-0">
                    <i class="fa-solid fa-address-book me-2"></i>
                    <strong>Listagem de Clientes</strong>
                </h2>
                <a href="novo.php" class="btn btn-success">
                    <i class="fa-solid fa-plus me-1"></i> Novo cliente
                </a>
            </div>
            <hr>
            <p class="text-muted">Não existem clientes registados.</p>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">

                    <thead class="table-dark">
                        <tr>
                            <th>Nome</th>
                            <th>Sexo</th>
                            <th>Data nascimento</th>
                            <th>Email</th>
                            <th>Telefone</th>
                            <th>Morada</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if (empty($resultados)) : ?>
                            <tr>
                                <td colspan="7" class="text-center text-muted">
                                    Não existem clientes registados.
                                </td>
                            </tr>
                        <?php else : ?>
                            <?php foreach ($resultados as $cliente) : ?>
                                <tr>
                                    <td class="align-middle"><?= htmlspecialchars($cliente->nome ?? '') ?></td>
                                    <td class="align-middle text-center"><?= htmlspecialchars($cliente->sexo ?? '') ?></td>
                                    <td class="align-middle text-center"><?= date('d/m/Y', strtotime($cliente->data_nascimento ?? '')) ?></td>
                                    <td class="align-middle"><?= htmlspecialchars($cliente->email ?? '') ?></td>
                                    <td class="align-middle text-center"><?= htmlspecialchars($cliente->telefone ?? '') ?></td>
                                    <td class="align-middle"><?= htmlspecialchars(($cliente->morada ?? '') . ', ' . ($cliente->cidade ?? '')) ?></td>

                                    <td class="text-center align-middle">
                                        <a href="detalhes.php?id=<?= $cliente->id ?>" class="btn btn-sm btn-outline-primary me-1">
                                            <i class="fa-solid fa-eye"></i>
                                        </a>

                                        <a href="editar.php?id=<?= $cliente->id ?>" class="btn btn-sm btn-outline-warning me-1">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </a>

                                        <a href="apagar.php?id=<?= $cliente->id ?>" class="btn btn-sm btn-outline-danger">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>

                </table>
            </div>
        </div>


    </div>
</div>

<?php include '../../includes/footer.php'; ?>