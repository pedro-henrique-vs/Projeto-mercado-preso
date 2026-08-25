<?php
session_start();
include_once("php-proc/conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Vendedor - MercadoPreso</title>
    <style>
        /* ==========================================================================
           1. RESET E ESTRUTURA GLOBAL
           ========================================================================== */
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background-color: #f4f6f9;
            color: #333333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* ==========================================================================
           2. ESTILIZAÇÃO DO CABEÇALHO (HEADER)
           ========================================================================== */
        .main-header {
            background-color: #ffffff;
            width: 100%;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
            position: sticky;
            top: 0;
            z-index: 1000;
            padding: 16px 24px;
        }

        .header-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        /* Logo MercadoPreso */
        .logo a {
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
            text-decoration: none;
        }

        .logo span {
            color: #4f46e5;
        }

        /* Navegação e remoção dos marcadores de lista (bullets) */
        .nav-links {
            display: flex;
            align-items: center;
            gap: 20px;
            list-style: none; /* Remove as bolinhas da lista */
            margin: 0;
            padding: 0;
        }

        .nav-links a {
            text-decoration: none;
            color: #64748b;
            font-weight: 500;
            font-size: 0.95rem;
            transition: color 0.2s ease;
        }

        .nav-links a:hover {
            color: #4f46e5;
        }

        /* Botão Voltar ao Início */
        .btn-inicio {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background-color: #4f46e5;
            color: #ffffff !important;
            padding: 10px 18px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.95rem;
            text-decoration: none;
            transition: background-color 0.2s ease, transform 0.1s ease;
        }

        .btn-inicio:hover {
            background-color: #4338ca;
        }

        .btn-inicio:active {
            transform: scale(0.97);
        }

        /* ==========================================================================
           3. CONTAINER PRINCIPAL E CARD DO FORMULÁRIO
           ========================================================================== */
        .main-content {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 40px 20px;
        }

        .form-container {
            background-color: #ffffff;
            width: 100%;
            max-width: 700px;
            padding: 32px;
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        }

        h1 {
            font-size: 1.75rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 24px;
            text-align: center;
        }

        .section-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #4f46e5;
            margin: 24px 0 16px 0;
            padding-bottom: 8px;
            border-bottom: 2px solid #e2e8f0;
        }

        /* ==========================================================================
           4. SELETOR DE TIPO (PESSOA FÍSICA / JURÍDICA VIA CSS)
           ========================================================================== */
        .type-selector {
            display: flex;
            gap: 16px;
            margin-bottom: 24px;
            background-color: #f8fafc;
            padding: 8px;
            border-radius: 8px;
            border: 1px solid #cbd5e1;
        }

        .type-option {
            flex: 1;
            text-align: center;
        }

        .type-option input[type="radio"] {
            display: none;
        }

        .type-option label {
            display: block;
            padding: 10px;
            font-weight: 600;
            color: #64748b;
            cursor: pointer;
            border-radius: 6px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Alterna a cor do botão radio via :has */
        .type-selector:has(#typePF:checked) label[for="typePF"],
        .type-selector:has(#typePJ:checked) label[for="typePJ"] {
            background-color: #4f46e5;
            color: #ffffff;
        }

        /* Controle de exibição das seções dinâmicas sem JS */
        .dynamic-section {
            max-height: 0;
            opacity: 0;
            overflow: hidden;
            transform: translateY(-10px);
            transition: max-height 0.4s ease, opacity 0.3s ease, transform 0.3s ease;
            pointer-events: none;
        }

        form:has(#typePF:checked) #sectionPF,
        form:has(#typePJ:checked) #sectionPJ {
            max-height: 1000px;
            opacity: 1;
            transform: translateY(0);
            pointer-events: auto;
        }

        /* ==========================================================================
           5. GRID E CAMPOS DE FORMULÁRIO
           ========================================================================== */
        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 16px;
        }

        .full-width {
            grid-column: span 2;
        }

        .field-group {
            display: flex;
            flex-direction: column;
        }

        label {
            font-size: 0.875rem;
            font-weight: 600;
            color: #475569;
            margin-bottom: 6px;
        }

        input {
            width: 100%;
            padding: 12px 14px;
            font-size: 1rem;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            background-color: #f8fafc;
            outline: none;
            transition: border-color 0.2s ease, box-shadow 0.2s ease;
        }

        input:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.15);
            background-color: #ffffff;
        }

        input::placeholder {
            color: #94a3b8;
        }

        button[type="submit"] {
            width: 100%;
            padding: 14px;
            font-size: 1rem;
            font-weight: 600;
            color: #ffffff;
            background-color: #4f46e5;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-top: 32px;
            transition: background-color 0.2s ease, transform 0.1s ease;
        }

        button[type="submit"]:hover {
            background-color: #4338ca;
        }

        button[type="submit"]:active {
            transform: scale(0.98);
        }

        /* Responsividade para telas menores */
        @media (max-width: 640px) {
            .header-container {
                flex-direction: column;
                gap: 12px;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }

            .full-width {
                grid-column: span 1;
            }
        }
    </style>
</head>
<body>

    <!-- CABEÇALHO SUPERIOR -->
    <header class="main-header">
        <div class="header-container">
            <div class="logo">
                <a href="index.php">Mercado<span>Preso</span></a>
            </div>

            <nav>
                <ul class="nav-links">
                    <li><a href="products.php">Produtos</a></li>
                    <li><a href="signin-vendedor.php">Área do Vendedor</a></li>
                    <li>
                        <a href="index.php" class="btn-inicio">
                            &#8592; Voltar ao Início
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- CONTEÚDO PRINCIPAL (FORMULÁRIO CENTRALIZADO) -->
    <main class="main-content">
        <div class="form-container">
            <h1>Cadastro de Vendedor</h1>

            <form action="php-proc/cad-vend.php" method="POST">
                
                <!-- Seleção PF / PJ -->
                <div class="type-selector">
                    <div class="type-option">
                        <input type="radio" id="typePF" name="tipo_pessoa" value="PF" checked>
                        <label for="typePF">Pessoa Física</label>
                    </div>
                    <div class="type-option">
                        <input type="radio" id="typePJ" name="tipo_pessoa" value="PJ">
                        <label for="typePJ">Pessoa Jurídica</label>
                    </div>
                </div>

                <!-- Seção Pessoa Física -->
                <div id="sectionPF" class="dynamic-section">
                    <div class="section-title">Dados Pessoais</div>
                    <div class="form-grid">
                        <div class="field-group full-width">
                            <label for="nome">Nome Completo</label>
                            <input type="text" id="nome" name="nome" placeholder="Digite seu nome completo">
                        </div>
                        <div class="field-group full-width">
                            <label for="razao_social">Email</label>
                            <input type="text" id="razao_social" name="email" placeholder="Insira seu email...">
                        </div>
                        <div class="field-group">
                            <label for="cpf">CPF</label>
                            <input type="text" id="cpf" name="cpf" placeholder="000.000.000-00">
                        </div>
                        <div class="field-group">
                            <label for="data_nascimento">Data de Nascimento</label>
                            <input type="date" id="data_nascimento" name="data_nascimento">
                        </div>
                    </div>
                </div>

                <!-- Seção Pessoa Jurídica -->
                <div id="sectionPJ" class="dynamic-section">
                    <div class="section-title">Dados da Empresa</div>
                    <div class="form-grid">
                        <div class="field-group full-width">
                            <label for="razao_social">Razão Social</label>
                            <input type="text" id="razao_social" name="razao_social" placeholder="Razão social da empresa">
                        </div>
                        <div class="field-group full-width">
                            <label for="nome_fantasia">Nome Fantasia</label>
                            <input type="text" id="nome_fantasia" name="nome_fantasia" placeholder="Nome comercial">
                        </div>
                        <div class="field-group">
                            <label for="cnpj">CNPJ</label>
                            <input type="text" id="cnpj" name="cnpj" placeholder="00.000.000/0001-00">
                        </div>
                        <div class="field-group">
                            <label for="inscricao_estadual">Inscrição Estadual</label>
                            <input type="text" id="inscricao_estadual" name="inscricao_estadual" placeholder="IE ou Isento">
                        </div>
                        <div class="field-group full-width">
                            <label for="razao_social">Email</label>
                            <input type="text" id="razao_social" name="email" placeholder="Insira o email comercial...">
                        </div>
                    </div>
                </div>

                <!-- Seção Endereço -->
                <div class="section-title">Endereço</div>
                <div class="form-grid">
                    <div class="field-group">
                        <label for="cep">CEP *</label>
                        <input type="text" id="cep" name="cep" placeholder="00000-000" required>
                    </div>
                    <div class="field-group">
                        <label for="logradouro">Logradouro *</label>
                        <input type="text" id="logradouro" name="logradouro" placeholder="Rua, Av, etc." required>
                    </div>
                    <div class="field-group">
                        <label for="numero">Número *</label>
                        <input type="text" id="numero" name="numero" placeholder="Nº" required>
                    </div>
                    <div class="field-group">
                        <label for="bairro">Bairro *</label>
                        <input type="text" id="bairro" name="bairro" placeholder="Seu bairro" required>
                    </div>
                </div>

                <!-- Botão Enviar -->
                <button type="submit">Cadastrar Vendedor</button>
            </form>
        </div>
    </main>

</body>
</html>