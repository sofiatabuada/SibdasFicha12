<?php
require_once __DIR__ . '/../../includes/funcoes.php';
redirect_if_not_logged();

$erros = [];
$erro_sistema = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome      = $_POST["nome_cliente"]      ?? "";
    $morada    = $_POST["morada_cliente"]    ?? "";
    $cp        = $_POST["cp_cliente"]        ?? "";
    $cidade    = $_POST["cid_cliente"]       ?? "";
    $telefone  = $_POST["tel_cliente"]       ?? "";
    $email     = $_POST["email_cliente"]     ?? "";
    $sexo      = $_POST["radio_gender"]      ?? "";
    $dnasc     = $_POST["dnasc_cliente"]     ?? "";
    $estado    = $_POST["estaciv_cliente"]   ?? "";
    $sistema   = $_POST["campo_opcao"]       ?? "";
    $profissao = $_POST["profissao_cliente"] ?? "";

    $nome      = trim($nome);
    $morada    = trim($morada);
    $cp        = trim($cp);
    $cidade    = trim($cidade);
    $telefone  = trim($telefone);
    $email     = trim($email);
    $estado    = trim($estado);
    $sistema   = trim($sistema);
    $profissao = trim($profissao);
    $dnasc     = trim($dnasc);

    if (empty($nome)) {
        $erros[] = "O campo Nome é obrigatório.";
    } elseif (preg_match('/\d/', $nome)) {
        $erros[] = "O campo Nome não pode conter números.";
    }

    if (empty($morada)) $erros[] = "O campo Morada é obrigatório.";

    if (empty($cp)) {
        $erros[] = "O campo Código Postal é obrigatório.";
    } elseif (!preg_match('/^\d{4}-\d{3}$/', $cp)) {
        $erros[] = "Código Postal inválido (ex: 4000-007).";
    }

    if (empty($cidade)) $erros[] = "O campo Cidade é obrigatório.";

    if (empty($telefone)) {
        $erros[] = "O campo Telefone é obrigatório.";
    } elseif (!preg_match('/^9\d{8}$/', $telefone)) {
        $erros[] = "O número de telefone não é válido. Deve começar por 9 e ter 9 dígitos.";
    }

    if (empty($email)) {
        $erros[] = "O campo Email é obrigatório.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erros[] = "O endereço de email não é válido.";
    }

    if (empty($_POST['radio_gender'])) {
        $erros[] = "O campo Género é obrigatório.";
    }

    if (empty($dnasc)) {
        $erros[] = "O campo Data de Nascimento é obrigatório.";
    } elseif (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $dnasc)) {
        $erros[] = "Formato de data inválido. Use AAAA-MM-DD.";
    } else {
        $partes = explode('-', $dnasc);
        if (!checkdate((int)$partes[1], (int)$partes[2], (int)$partes[0])) {
            $erros[] = "Data de nascimento inválida.";
        }
    }

    if (empty($estado) || $estado === "Escolha uma opção") $erros[] = "Estado civil não selecionado.";
    if (empty($sistema)) $erros[] = "Sistema de saúde não preenchido.";
    if (empty($profissao)) $erros[] = "Profissão é obrigatória.";

    if (empty($erros)) {
        $nome      = ucwords(strtolower($nome));
        $cidade    = ucfirst(strtolower($cidade));
        $email     = strtolower($email);
        $sistema   = strtoupper($sistema);
        $profissao = ucwords(strtolower($profissao));

        try {
            $ligacao = new PDO(
                "mysql:host=" . MYSQL_HOST . ";dbname=" . MYSQL_DATABASE . ";charset=utf8",
                MYSQL_USERNAME,
                MYSQL_PASSWORD
            );

            $sql = "INSERT INTO clientes (
                nome, sexo, data_nascimento, email, telefone,
                morada, cidade, cliente_ativo, sistema_saude
            ) VALUES (
                :nome, :sexo, :dnasc, :email, :telefone,
                :morada, :cidade, '1', :sistema
            )";

            $stmt = $ligacao->prepare($sql);
            $stmt->execute([
                ':nome'     => $nome,
                ':sexo'     => $sexo,
                ':dnasc'    => $dnasc,
                ':email'    => $email,
                ':telefone' => $telefone,
                ':morada'   => $morada,
                ':cidade'   => $cidade,
                ':sistema'  => $sistema
            ]);

            header("Location: lista.php");
            exit;
        } catch (PDOException $err) {
            $erro_sistema = "Erro ao gravar os dados: " . $err->getMessage();
        }

        $ligacao = null;
    }
}
?>

<?php include '../../includes/header.php'; ?>
<?php include '../../includes/nav.php'; ?>

<div class="container-fluid">
    <div class="row">

        <?php include '../../includes/sidebar.php'; ?>

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

                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="texto_nome" class="form-label">Nome Completo</label>
                                    <input type="text" class="form-control" id="texto_nome" name="nome_cliente"
                                        value="<?= htmlspecialchars($_POST['nome_cliente'] ?? '') ?>" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-12">
                                    <label for="texto_endereco" class="form-label">
                                        Morada <small>(NºPorta, Andar)</small>
                                    </label>
                                    <input type="text" class="form-control" id="texto_endereco" name="morada_cliente"
                                        value="<?= htmlspecialchars($_POST['morada_cliente'] ?? '') ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-2">
                                    <label for="texto_cp" class="form-label">Código Postal</label>
                                    <input type="text" name="cp_cliente" class="form-control" id="texto_cp"
                                        value="<?= htmlspecialchars($_POST['cp_cliente'] ?? '') ?>">
                                </div>
                                <div class="col-md-3">
                                    <label for="texto_cidade" class="form-label">Cidade</label>
                                    <input type="text" class="form-control" id="texto_cidade" name="cid_cliente"
                                        value="<?= htmlspecialchars($_POST['cid_cliente'] ?? '') ?>" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="texto_cliente" class="form-label">Telefone</label>
                                    <input type="text" class="form-control" id="texto_cliente" name="tel_cliente"
                                        value="<?= htmlspecialchars($_POST['tel_cliente'] ?? '') ?>" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="texto_email" class="form-label">Email</label>
                                    <input type="email" name="email_cliente" class="form-control" id="texto_email"
                                        value="<?= htmlspecialchars($_POST['email_cliente'] ?? '') ?>">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label class="form-label d-block">Sexo</label>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="radio_gender" id="radio_m" value="m"
                                            <?= (($_POST['radio_gender'] ?? '') === 'm') ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="radio_m">Masculino</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="form-check-input" name="radio_gender" id="radio_f" value="f"
                                            <?= (($_POST['radio_gender'] ?? '') === 'f') ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="radio_f">Feminino</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="data_nasc" class="form-label">Data de nascimento</label>
                                    <input type="text" class="form-control" id="data_nasc" name="dnasc_cliente"
                                        value="<?= htmlspecialchars($_POST['dnasc_cliente'] ?? '') ?>" required>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="texto_estcivil" class="form-label">Estado Civil</label>
                                    <select name="estaciv_cliente" id="texto_estcivil" class="form-select">
                                        <option value="">Escolha uma opção</option>
                                        <option value="solt" <?= (($_POST['estaciv_cliente'] ?? '') == 'solt') ? 'selected' : '' ?>>Solteiro</option>
                                        <option value="casd" <?= (($_POST['estaciv_cliente'] ?? '') == 'casd') ? 'selected' : '' ?>>Casado</option>
                                        <option value="ufat" <?= (($_POST['estaciv_cliente'] ?? '') == 'ufat') ? 'selected' : '' ?>>União de Facto</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="texto_SSaude" class="form-label">Sistema de Saúde</label>
                                    <input type="text" class="form-control" id="texto_SSaude" name="campo_opcao"
                                        list="sistemasaude"
                                        value="<?= htmlspecialchars($_POST['campo_opcao'] ?? '') ?>">
                                    <datalist id="sistemasaude">
                                        <option value="SNS">
                                        <option value="ADSE">
                                        <option value="SMAS">
                                        <option value="CTT">
                                        <option value="PSP">
                                    </datalist>
                                </div>
                                <div class="col-md-4">
                                    <label for="profissao" class="form-label">Profissão</label>
                                    <input type="text" class="form-control" id="profissao" name="profissao_cliente"
                                        value="<?= htmlspecialchars($_POST['profissao_cliente'] ?? '') ?>">
                                </div>
                            </div>

                            <div class="mt-3 d-flex justify-content-end">
                                <a href="lista.php" class="btn btn-secondary me-2">
                                    <i class="fa-solid fa-xmark me-1"></i> Cancelar
                                </a>
                                <button type="submit" class="btn btn-success">
                                    <i class="fa-regular fa-floppy-disk me-1"></i> Guardar
                                </button>
                            </div>

                            <?php if (!empty($erros)): ?>
                                <div class="alert alert-danger mt-3" role="alert">
                                    <strong>Foram encontrados os seguintes erros:</strong>
                                    <ul class="mb-0">
                                        <?php foreach ($erros as $erro): ?>
                                            <li><?= htmlspecialchars($erro) ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty($erro_sistema)): ?>
                                <div class="alert alert-danger mt-3" role="alert">
                                    <strong>Erro:</strong>
                                    <p><?= htmlspecialchars($erro_sistema) ?></p>
                                </div>
                            <?php endif; ?>

                        </form>

                    </div>
                </div>
            </div>

        </main>

    </div>
</div>

<script>
    flatpickr("#data_nasc", {
        dateFormat: "Y-m-d"
    });
</script>

<?php include '../../includes/footer.php'; ?>