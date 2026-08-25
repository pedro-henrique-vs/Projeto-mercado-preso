<?php
session_start();
include_once("php-proc/conexao.php");

// Trava de Segurança
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
    header("Location: index.php");
    exit();
}

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id === 0) {
    header("Location: admin-vendedores.php");
    exit();
}

$query = "SELECT * FROM vendedores WHERE vend_id = $id";
$result = mysqli_query($conn, $query);
$vendedor = mysqli_fetch_assoc($result);

if (!$vendedor) {
    header("Location: admin-vendedores.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Vendedor - Painel Admin</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #f4f6f9;
            color: #333333;
            display: flex;
            min-height: 100vh;
        }
        .sidebar {
            width: 250px;
            background-color: #1e293b;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            padding: 20px;
        }
        .sidebar h2 { font-size: 1.5rem; margin-bottom: 30px; text-align: center; }
        .sidebar h2 span { color: #4f46e5; }
        .nav-links { list-style: none; display: flex; flex-direction: column; gap: 15px; }
        .nav-links a {
            color: #cbd5e1; text-decoration: none; font-size: 1rem; padding: 10px; border-radius: 8px; transition: background-color 0.2s;
        }
        .nav-links a:hover, .nav-links a.active { background-color: #4f46e5; color: #ffffff; }
        
        .main-content {
            flex: 1; padding: 40px; display: flex; flex-direction: column;
        }
        header {
            display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; border-bottom: 2px solid #e2e8f0; padding-bottom: 20px;
        }
        .form-container {
            background-color: white; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); padding: 30px; max-width: 800px;
        }
        .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
        .full-width { grid-column: span 2; }
        .form-group { display: flex; flex-direction: column; gap: 8px; }
        label { font-weight: 600; font-size: 0.9rem; color: #475569; }
        input, select {
            padding: 10px; border: 1px solid #cbd5e1; border-radius: 6px; font-size: 1rem;
        }
        .btn-submit {
            background-color: #4f46e5; color: white; border: none; padding: 12px 20px; border-radius: 8px; font-weight: 600; cursor: pointer; margin-top: 20px; width: 100%; transition: background-color 0.2s;
        }
        .btn-submit:hover { background-color: #4338ca; }
        .dynamic-section { display: none; }
        .dynamic-section.active { display: block; }
    </style>
    <script>
        function toggleType() {
            var type = document.getElementById('tipo_pessoa').value;
            if (type === 'PF') {
                document.getElementById('sectionPF').classList.add('active');
                document.getElementById('sectionPJ').classList.remove('active');
            } else {
                document.getElementById('sectionPJ').classList.add('active');
                document.getElementById('sectionPF').classList.remove('active');
            }
        }
    </script>
</head>
<body onload="toggleType()">

    <aside class="sidebar">
        <h2>Mercado<span>Preso</span></h2>
        <ul class="nav-links">
            <li><a href="painel-admin.php">Dashboard Inicial</a></li>
            <li><a href="admin-vendedores.php" class="active">Gerenciar Vendedores</a></li>
            <li><a href="admin-produtos.php">Catálogo Global</a></li>
            <li><a href="admin-relatorios.php">Relatórios</a></li>
        </ul>
    </aside>

    <main class="main-content">
        <header>
            <h1>Editar Vendedor #<?= $vendedor['vend_id'] ?></h1>
            <a href="admin-vendedores.php" style="text-decoration: none; color: #4f46e5; font-weight: 600;">← Voltar</a>
        </header>

        <div class="form-container">
            <form action="php-proc/admin-edit-vendedor.php" method="POST">
                <input type="hidden" name="vend_id" value="<?= $vendedor['vend_id'] ?>">
                
                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="tipo_pessoa">Tipo de Pessoa</label>
                    <select id="tipo_pessoa" name="tipo_pessoa" onchange="toggleType()">
                        <option value="PF" <?= ($vendedor['tipo_pessoa'] == 'PF') ? 'selected' : '' ?>>Pessoa Física</option>
                        <option value="PJ" <?= ($vendedor['tipo_pessoa'] == 'PJ') ? 'selected' : '' ?>>Pessoa Jurídica</option>
                    </select>
                </div>

                <!-- Seção PF -->
                <div id="sectionPF" class="dynamic-section">
                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label>Nome Completo</label>
                            <input type="text" name="nome" value="<?= htmlspecialchars($vendedor['vend_nome'] ?? '') ?>">
                        </div>
                        <div class="form-group full-width">
                            <label>Email</label>
                            <input type="email" name="email_pf" value="<?= htmlspecialchars($vendedor['tipo_pessoa'] == 'PF' ? $vendedor['vend_email'] : '') ?>">
                        </div>
                        <div class="form-group">
                            <label>CPF</label>
                            <input type="text" name="cpf" value="<?= htmlspecialchars($vendedor['vend_cpf'] ?? '') ?>">
                        </div>
                        <div class="form-group">
                            <label>Data de Nascimento</label>
                            <input type="date" name="data_nascimento" value="<?= htmlspecialchars($vendedor['vend_dtnasc'] ?? '') ?>">
                        </div>
                    </div>
                </div>

                <!-- Seção PJ -->
                <div id="sectionPJ" class="dynamic-section">
                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label>Razão Social</label>
                            <input type="text" name="razao_social" value="<?= htmlspecialchars($vendedor['vend_razao_social'] ?? '') ?>">
                        </div>
                        <div class="form-group full-width">
                            <label>Nome Fantasia</label>
                            <input type="text" name="nome_fantasia" value="<?= htmlspecialchars($vendedor['vend_nomefantasia'] ?? '') ?>">
                        </div>
                        <div class="form-group">
                            <label>CNPJ</label>
                            <input type="text" name="cnpj" value="<?= htmlspecialchars($vendedor['vend_cnpj'] ?? '') ?>">
                        </div>
                        <div class="form-group">
                            <label>Inscrição Estadual</label>
                            <input type="text" name="inscricao_estadual" value="<?= htmlspecialchars($vendedor['vend_inscricao_estadual'] ?? '') ?>">
                        </div>
                        <div class="form-group full-width">
                            <label>Email Comercial</label>
                            <input type="email" name="email_pj" value="<?= htmlspecialchars($vendedor['tipo_pessoa'] == 'PJ' ? $vendedor['vend_email'] : '') ?>">
                        </div>
                    </div>
                </div>

                <div style="margin-top: 30px; margin-bottom: 10px; font-weight: bold; border-bottom: 1px solid #cbd5e1; padding-bottom: 5px;">Endereço</div>
                <div class="form-grid">
                    <div class="form-group">
                        <label>CEP *</label>
                        <input type="text" name="cep" value="<?= htmlspecialchars($vendedor['vend_cep'] ?? '') ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Logradouro *</label>
                        <input type="text" name="logradouro" value="<?= htmlspecialchars($vendedor['vend_logradouro'] ?? '') ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Número *</label>
                        <input type="text" name="numero" value="<?= htmlspecialchars($vendedor['vend_numero'] ?? '') ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Bairro *</label>
                        <input type="text" name="bairro" value="<?= htmlspecialchars($vendedor['vend_bairro'] ?? '') ?>" required>
                    </div>
                </div>

                <button type="submit" class="btn-submit">Atualizar Vendedor</button>
            </form>
        </div>
    </main>

</body>
</html>
