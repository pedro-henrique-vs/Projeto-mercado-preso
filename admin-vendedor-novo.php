<?php
session_start();
// Trava de Segurança
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Vendedor - Painel Admin</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
                body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; background-color: #f4f6f9; color: #333333; }
        .navbar { background-color: #1e293b; color: #ffffff; display: flex; align-items: center; justify-content: space-between; padding: 15px 40px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .navbar .logo { font-size: 1.5rem; font-weight: bold; color: #ffffff; text-decoration: none; }
        .navbar .logo span { color: #4f46e5; }
        .nav-links { list-style: none; display: flex; gap: 20px; margin: 0; padding: 0; }
        .nav-links a { color: #cbd5e1; text-decoration: none; font-size: 1rem; padding: 8px 12px; border-radius: 8px; transition: background-color 0.2s, color 0.2s; }
        .nav-links a:hover, .nav-links a.active { background-color: rgba(79, 70, 229, 0.2); color: #818cf8; }
        .logout-btn { background-color: #ef4444; color: white; padding: 8px 16px; text-decoration: none; border-radius: 8px; font-weight: 600; transition: background-color 0.2s; }
        .logout-btn:hover { background-color: #dc2626; }
        .main-content { padding: 40px; max-width: 1200px; margin: 0 auto; display: flex; flex-direction: column; }
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
        .type-selector { display: flex; gap: 10px; margin-bottom: 20px; }
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

        <nav class="navbar">
        <a href="index.php" class="logo">Mercado<span>Preso</span></a>
        <ul class="nav-links">
            <li><a href="painel-admin.php">Dashboard Inicial</a></li>
            <li><a href="admin-vendedores.php" class="active">Gerenciar Vendedores</a></li>
            <li><a href="admin-produtos.php">Catálogo Global</a></li>
            <li><a href="admin-relatorios.php">Relatórios</a></li>
        </ul>
        <a href="php-proc/logout.php" class="logout-btn">Sair</a>
    </nav>

    <main class="main-content">
        <header>
            <h1>Novo Vendedor</h1>
            <a href="admin-vendedores.php" style="text-decoration: none; color: #4f46e5; font-weight: 600;">← Voltar</a>
        </header>

        <div class="form-container">
            <form action="php-proc/admin-add-vendedor.php" method="POST">
                <div class="form-group" style="margin-bottom: 20px;">
                    <label for="tipo_pessoa">Tipo de Pessoa</label>
                    <select id="tipo_pessoa" name="tipo_pessoa" onchange="toggleType()">
                        <option value="PF">Pessoa Física</option>
                        <option value="PJ">Pessoa Jurídica</option>
                    </select>
                </div>

                <!-- Seção PF -->
                <div id="sectionPF" class="dynamic-section active">
                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label>Nome Completo</label>
                            <input type="text" name="nome">
                        </div>
                        <div class="form-group full-width">
                            <label>Email</label>
                            <input type="email" name="email_pf">
                        </div>
                        <div class="form-group">
                            <label>CPF</label>
                            <input type="text" name="cpf">
                        </div>
                        <div class="form-group">
                            <label>Data de Nascimento</label>
                            <input type="date" name="data_nascimento">
                        </div>
                    </div>
                </div>

                <!-- Seção PJ -->
                <div id="sectionPJ" class="dynamic-section">
                    <div class="form-grid">
                        <div class="form-group full-width">
                            <label>Razão Social</label>
                            <input type="text" name="razao_social">
                        </div>
                        <div class="form-group full-width">
                            <label>Nome Fantasia</label>
                            <input type="text" name="nome_fantasia">
                        </div>
                        <div class="form-group">
                            <label>CNPJ</label>
                            <input type="text" name="cnpj">
                        </div>
                        <div class="form-group">
                            <label>Inscrição Estadual</label>
                            <input type="text" name="inscricao_estadual">
                        </div>
                        <div class="form-group full-width">
                            <label>Email Comercial</label>
                            <input type="email" name="email_pj">
                        </div>
                    </div>
                </div>

                <div style="margin-top: 30px; margin-bottom: 10px; font-weight: bold; border-bottom: 1px solid #cbd5e1; padding-bottom: 5px;">Endereço</div>
                <div class="form-grid">
                    <div class="form-group">
                        <label>CEP *</label>
                        <input type="text" name="cep" required>
                    </div>
                    <div class="form-group">
                        <label>Logradouro *</label>
                        <input type="text" name="logradouro" required>
                    </div>
                    <div class="form-group">
                        <label>Número *</label>
                        <input type="text" name="numero" required>
                    </div>
                    <div class="form-group">
                        <label>Bairro *</label>
                        <input type="text" name="bairro" required>
                    </div>
                </div>

                <div style="margin-top: 30px; margin-bottom: 10px; font-weight: bold; border-bottom: 1px solid #cbd5e1; padding-bottom: 5px;">Acesso</div>
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label>Senha de Acesso *</label>
                        <input type="password" name="senha" required>
                    </div>
                </div>

                <button type="submit" class="btn-submit">Salvar Vendedor</button>
            </form>
        </div>
    </main>

</body>
</html>
