<?php include '../../includes/header.php'; ?>
<?php include '../../includes/nav.php'; ?>

<div class="container-fluid">
    <div class="row">

        <?php include '../../includes/sidebar.php'; ?>

        <!-- Conteúdo Principal -->
        <main class="col-md-9 col-lg-10 p-4">

            <div class="d-flex justify-content-center mt-4">
                <div class="card w-100 shadow rounded" style="max-width: 1200px;">
                    <div class="card-body">

                        <h2 class="mb-4">
                            <strong>
                                <i class="fa-solid fa-pen-to-square me-2"></i> Editar cliente
                            </strong>
                        </h2>

                        <hr>

                        <form action="#" method="post" novalidate>

                            <div class="mb-3">
                                <label class="form-label">Nome Completo</label>
                                <input type="text" class="form-control" value="João Silva" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Morada</label>
                                <input type="text" class="form-control" value="Rua das Flores, nº12">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Código Postal</label>
                                <input type="text" class="form-control" value="4000-123" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Cidade</label>
                                <input type="text" class="form-control" value="Porto" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Telefone</label>
                                <input type="text" class="form-control" value="912345678" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" class="form-control" value="joao@email.com" required>
                            </div>

                            <!-- Sexo -->
                            <div class="mb-3">
                                <label class="form-label d-block">Sexo</label>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_gender" value="m"
                                        checked>
                                    <label class="form-check-label">Masculino</label>
                                </div>

                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="radio_gender" value="f">
                                    <label class="form-check-label">Feminino</label>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Data de nascimento</label>
                                <input type="date" class="form-control" value="1995-05-10" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Estado Civil</label>
                                <select class="form-select">
                                    <option>Escolha uma opção</option>
                                    <option value="solt">Solteiro</option>
                                    <option value="casd" selected>Casado</option>
                                    <option value="ufat">União de Facto</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Sistema de Saúde</label>
                                <input type="text" class="form-control" value="SNS">
                            </div>

                            <div class="mt-3">
                                <a href="lista.php" class="btn btn-secondary me-2">
                                    <i class="fa-solid fa-xmark me-1"></i> Cancelar
                                </a>

                                <button type="submit" class="btn btn-warning">
                                    <i class="fa-regular fa-floppy-disk me-1"></i> Guardar alterações
                                </button>
                            </div>

                            <div class="alert alert-danger mt-3 d-none">
                                Erro simples
                            </div>

                        </form>

                    </div>
                </div>
            </div>

        </main>

    </div>
</div>

<?php include '../../includes/footer.php'; ?>