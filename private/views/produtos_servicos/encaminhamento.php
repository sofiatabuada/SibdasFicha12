<?php include '../../includes/header.php'; ?>
<?php include '../../includes/nav.php'; ?>

<div class="container-fluid">
    <div class="row">

        <?php include '../../includes/sidebar.php'; ?>

        <!-- Conteúdo -->
        <main class="col-md-9 col-lg-10 p-4">

            <h2>
                <i class="fa-solid fa-user-plus me-2"></i>
                Avaliação de Condições de Saúde
            </h2>

            <hr>

            <p>
                Utilize este formulário para selecionar as condições de saúde relevantes do cliente.
                As informações escolhidas irão gerar uma recomendação personalizada para o plano de treino.
            </p>

            <!-- Card centrado -->
            <div class="card mt-4 p-4 shadow mx-auto" style="max-width: 500px;">

                <h4 class="mb-3">
                    <i class="fa-solid fa-dumbbell me-2"></i>
                    Avaliação
                </h4>

                <form oninput="avaliarCondicoes()">

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="temProblemasCostas">
                        <label class="form-check-label">Problemas de costas</label>
                    </div>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="checkbox" id="estaGravida">
                        <label class="form-check-label">Grávida</label>
                    </div>

                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="temDiabetes">
                        <label class="form-check-label">Diabético/a</label>
                    </div>

                    <!-- Resultado -->
                    <div id="mensagem" class="mt-3 fw-bold text-center"></div>

                </form>

            </div>

        </main>

    </div>
</div>

<script src="/isep-ginasio/private/includes/funcoes.js"></script>
<?php include '../../includes/footer.php'; ?>