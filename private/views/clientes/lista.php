<?php
require_once __DIR__ . '/../../includes/funcoes.php';
redirect_if_not_logged();

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

            <?php if (!empty($erro)) : ?>
                <p class="text-center text-danger"><?= $erro ?></p>
            <?php else : ?>

                <div class="table-responsive">
                    <table id="tabela-clientes" class="table table-bordered table-striped align-middle tabela-clientes">

                        <thead class="table-dark">
                            <tr>
                                <th style="width: 18%">Nome <i class="fa-solid fa-sort ms-1" style="opacity: 0.5;"></i></th>
                                <th style="width: 10%">Sexo <i class="fa-solid fa-sort ms-1" style="opacity: 0.5;"></i></th>
                                <th style="width: 12%">Data Nascimento <i class="fa-solid fa-sort ms-1" style="opacity: 0.5;"></i></th>
                                <th style="width: 20%">Email <i class="fa-solid fa-sort ms-1" style="opacity: 0.5;"></i></th>
                                <th style="width: 10%">Telefone <i class="fa-solid fa-sort ms-1" style="opacity: 0.5;"></i></th>
                                <th style="width: 20%">Morada <i class="fa-solid fa-sort ms-1" style="opacity: 0.5;"></i></th>
                                <th style="width: 10%" class="text-center">Ações</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php if (empty($resultados)) : ?>
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-3">
                                        Não existem clientes registados.
                                    </td>
                                </tr>
                            <?php else : ?>
                                <?php foreach ($resultados as $cliente) : ?>
                                    <tr>
                                        <td class="align-middle"><?= htmlspecialchars($cliente->nome ?? '') ?></td>

                                        <td class="align-middle">
                                            <?php
                                            $sexo = strtolower($cliente->sexo ?? '');
                                            echo $sexo === 'm' ? 'Masculino' : ($sexo === 'f' ? 'Feminino' : htmlspecialchars($cliente->sexo ?? ''));
                                            ?>
                                        </td>

                                        <td class="align-middle text-center">
                                            <?= substr($cliente->data_nascimento, 0, 10) ?>
                                        </td>

                                        <td class="align-middle"><?= htmlspecialchars($cliente->email ?? '') ?></td>
                                        <td class="align-middle text-center"><?= htmlspecialchars($cliente->telefone ?? '') ?></td>
                                        <td class="align-middle">
                                            <?= htmlspecialchars(($cliente->morada ?? '') . ' - ' . ($cliente->cidade ?? '')) ?>
                                        </td>

                                        <td class="text-center align-middle">
                                            <div class="d-flex justify-content-center gap-2 flex-nowrap">
                                                <a href="detalhes.php?id=<?= $cliente->id ?>" class="btn btn-sm btn-outline-primary">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>

                                                <a href="editar.php?id=<?= $cliente->id ?>" class="btn btn-sm btn-outline-warning">
                                                    <i class="fa-regular fa-pen-to-square"></i>
                                                </a>

                                                <a href="apagar.php?id=<?= $cliente->id ?>" class="btn btn-sm btn-outline-danger">
                                                    <i class="fa-solid fa-trash-can"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>

                    </table>
                </div>

                <div class="col">
                    <p class="mb-5">Total: <strong><?= count($resultados) ?></strong></p>
                </div>

            <?php endif; ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tabela-clientes').DataTable({
            pageLength: 5,
            pagingType: "full_numbers",
            language: {
                decimal: "",
                emptyTable: "Sem dados disponíveis na tabela.",
                info: "Mostrando _START_ até _END_ de _TOTAL_ registos",
                infoEmpty: "Mostrando 0 até 0 de 0 registos",
                infoFiltered: "(Filtrando _MAX_ total de registos)",
                lengthMenu: "Mostrando _MENU_ registos por página.",
                loadingRecords: "Carregando...",
                processing: "Processando...",
                search: "Filtrar:",
                zeroRecords: "Nenhum registro encontrado.",
                paginate: {
                    first: "Primeira",
                    last: "Última",
                    next: "Seguinte",
                    previous: "Anterior"
                }
            }
        });
    });
</script>

<?php include '../../includes/footer.php'; ?>