<?php
require_once __DIR__ . '/../../includes/funcoes.php';
redirect_if_not_logged(); // Inicia a sessão (se necessário) e verifica se o utilizador está autenticado
?>

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
                                    <i class="fa-solid fa-users me-2"></i> Inserir novo cliente
                                </strong>
                            </h2>

                            <hr>

                            <form action="#" method="post" novalidate>

                                <div class="mb-3">
                                    <label for="texto_nome" class="form-label">Nome Completo</label>
                                    <input type="text" class="form-control" name="nome_cliente" id="texto_nome"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="texto_endereco" class="form-label">
                                        Morada <small>(NºPorta, Andar)</small>
                                    </label>
                                    <input type="text" class="form-control" name="morada_cliente" id="texto_endereco">
                                </div>

                                <div class="mb-3">
                                    <label for="texto_cp" class="form-label">Código Postal</label>
                                    <input type="text" class="form-control" name="cp_cliente" id="texto_cp" required>
                                </div>

                                <div class="mb-3">
                                    <label for="texto_cidade" class="form-label">Cidade</label>
                                    <input type="text" class="form-control" name="cid_cliente" id="texto_cidade"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="texto_cliente" class="form-label">Telefone</label>
                                    <input type="text" class="form-control" name="tel_cliente" id="texto_cliente"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="texto_email" class="form-label">Email</label>
                                    <input type="email" class="form-control" name="email_cliente" id="texto_email"
                                        required>
                                </div>

                                <!-- Sexo corrigido -->
                                <div class="mb-3">
                                    <label class="form-label d-block">Sexo</label>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="radio_gender" id="radio_m"
                                            value="m" checked>
                                        <label class="form-check-label" for="radio_m">Masculino</label>
                                    </div>

                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="radio_gender" id="radio_f"
                                            value="f">
                                        <label class="form-check-label" for="radio_f">Feminino</label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="texto_dnasc" class="form-label">Data de nascimento</label>
                                    <input type="date" class="form-control" name="dnasc_cliente" id="texto_dnasc"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="texto_estcivil" class="form-label">Estado Civil</label>

                                    <select name="estaciv_cliente" id="texto_estcivil" class="form-select">
                                        <option selected>Escolha uma opção</option>
                                        <option value="solt">Solteiro</option>
                                        <option value="casd">Casado</option>
                                        <option value="ufat">União de Facto</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="texto_SSaude" class="form-label">Sistema de Saúde</label>

                                    <input type="text" class="form-control" name="campo_opcao" id="texto_SSaude"
                                        list="sistemasaude">

                                    <datalist id="sistemasaude">
                                        <option value="SNS">
                                        <option value="ADSE">
                                        <option value="SMAS">
                                        <option value="CTT">
                                        <option value="PSP">
                                    </datalist>
                                </div>

                                <div class="mt-3">
                                    <a href="lista.php" class="btn btn-secondary me-2">
                                        <i class="fa-solid fa-xmark me-1"></i> Cancelar
                                    </a>

                                    <button type="submit" class="btn btn-success">
                                        <i class="fa-regular fa-floppy-disk me-1"></i> Guardar
                                    </button>
                                </div>

                                <!-- ALERT escondido -->
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