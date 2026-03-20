<?php include '../../includes/header.php'; ?>
<?php include '../../includes/nav.php'; ?>

<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <?php include '../../includes/sidebar.php'; ?>

        <!-- Conteúdo -->
        <main class="col-md-9 col-lg-10 p-4">

            <h2>
                <i class="fa-solid fa-calculator me-2"></i>
                Cálculo de IMC
            </h2>

            <hr>

            <p>
                Esta funcionalidade permite calcular o Índice de Massa Corporal (IMC),
                uma medida utilizada para avaliar se o peso de uma pessoa está adequado à sua altura.
            </p>

            <!-- Card -->
            <div class="card mt-4 p-4 shadow mx-auto" style="max-width: 500px;">

                <h4 class="mb-3">
                    <i class="fa-solid fa-heart-pulse me-2"></i>
                    Calculadora de IMC
                </h4>

                <form>

                    <div class="mb-3">
                        <label for="peso" class="form-label">Peso (kg)</label>
                        <input type="number" id="peso" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="altura" class="form-label">Altura (m)</label>
                        <input type="number" id="altura" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Resultado</label>
                        <p id="indicadorIMC" class="mt-2 fw-bold"></p>
                    </div>

                </form>

            </div>

        </main>

    </div>
</div>

<script src="/isep-ginasio/private/includes/funcoes.js"></script>
<?php include '../../includes/footer.php'; ?>