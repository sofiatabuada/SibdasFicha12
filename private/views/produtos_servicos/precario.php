<?php include '../../includes/header.php'; ?>
<?php include '../../includes/nav.php'; ?>

<div class="container-fluid">
    <div class="row">

        <?php include '../../includes/sidebar.php'; ?>

        <!-- Conteúdo -->
        <main class="col-md-9 col-lg-10 p-4">

            <h2>
                <i class="fa-solid fa-chart-column me-2"></i>
                Preçário Interativo
            </h2>

            <hr>

            <p>Escolha o serviço e a frequência para ver o preço.</p>


            <div class="row mt-4 g-3">

                <div class="col-md-6">
                    <div class="card text-center p-4 shadow" onclick="selecionarServico('PT')"
                        style="cursor:pointer;">
                        <h4>Treino Personalizado (PT)</h4>
                        <p class="text-muted">Clique para escolher</p>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card text-center p-4 shadow" onclick="selecionarServico('AG')"
                        style="cursor:pointer;">
                        <h4>Aulas de Grupo (AG)</h4>
                        <p class="text-muted">Clique para escolher</p>
                    </div>
                </div>

            </div>


            <div id="opcoesPT" class="mt-4" style="display:none;">

                <div class="row g-3">

                    <div class="col-md-3">
                        <div class="card text-center p-3" onclick="mostrarPrecoPT(1)">1x/semana</div>
                    </div>

                    <div class="col-md-3">
                        <div class="card text-center p-3" onclick="mostrarPrecoPT(2)">2x/semana</div>
                    </div>

                    <div class="col-md-3">
                        <div class="card text-center p-3" onclick="mostrarPrecoPT(3)">3x/semana</div>
                    </div>

                    <div class="col-md-3">
                        <div class="card text-center p-3" onclick="mostrarPrecoPT(4)">4x/semana</div>
                    </div>

                </div>

                <p id="resultadoPT" class="text-center fw-bold mt-3"></p>

            </div>


            <div id="opcoesAG" class="mt-4" style="display:none;">

                <div class="row g-3">

                    <div class="col-md-4">
                        <div class="card text-center p-3" onclick="mostrarPrecoAG(1)">1x/semana</div>
                    </div>

                    <div class="col-md-4">
                        <div class="card text-center p-3" onclick="mostrarPrecoAG(2)">2x/semana</div>
                    </div>

                    <div class="col-md-4">
                        <div class="card text-center p-3" onclick="mostrarPrecoAG('Livre')">Livre</div>
                    </div>

                </div>

                <p id="resultadoAG" class="text-center fw-bold mt-3"></p>

            </div>

        </main>

    </div>
</div>

<script src="/isep-ginasio/private/includes/funcoes.js"></script>
<?php include '../../includes/footer.php'; ?>