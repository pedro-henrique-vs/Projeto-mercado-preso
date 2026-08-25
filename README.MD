# README — Módulo de Autenticação e Planejamento do CRUD Admin

## 1. Contexto do Módulo de Autenticação (`login.php` / `proc-login.php`)

### Objetivo
Autenticar usuários no sistema de forma centralizada a partir de uma única tela de login, tratando de maneira distinta o acesso do **Administrador (Root)** e dos **Usuários do Banco (Clientes e Vendedores)**.

### Regras de Negócio e Implementação
* **Login Master (Admin Root):**
  * Verificação realizada diretamente no código através de credenciais fixas (`$email_admin` e `$senha_admin`).
  * Não depende de registros na tabela MySQL nem utiliza o ID `0`.
  * Cria as variáveis de sessão:
    * `$_SESSION['tipo_usuario'] = 'admin'`
    * `$_SESSION['nome_usuario'] = 'administrador'`
  * Redireciona diretamente para o painel administrativo (`../painel-admin.php`).

* **Login de Usuários Comuns / Vendedores:**
  * Realiza a consulta `SELECT` na tabela de `usuarios` (ou `vendedores`) validando e-mail e senha.
  * Valida o resultado com `mysqli_num_rows($result) > 0` e recupera os dados via `mysqli_fetch_assoc()`.
  * Cria as variáveis de sessão:
    * `$_SESSION['id_cadastrado'] = $usuario['usu_id']`
    * `$_SESSION['nome_usuario'] = $usuario['usu_nome']`
    * `$_SESSION['tipo_usuario'] = 'cliente'` (ou `'vendedor'`)
  * Redireciona para a página inicial (`../index.php`).

---

## 2. Planejamento das Próximas Etapas (CRUD do Admin)

Com a autenticação isolada, o Painel Administrativo terá privilégios totais sobre a gestão da plataforma.

### Ações Pendentes no Módulo Admin:

1. **Trava de Segurança nas Páginas Admin (`painel-admin.php`)**
   * Validar no topo de cada página restrita se `$_SESSION['tipo_usuario'] === 'admin'`.
   * Bloquear e redirecionar usuários comuns e visitantes para a `index.php`.

2. **Gestão de Vendedores (CRUD Completo)**
   * **Create:** Permitir cadastrar vendedores diretamente pelo painel.
   * **Read:** Criar tabela de listagem exibindo dados principais (ID, Nome/Razão Social, E-mail, CNPJ/CPF).
   * **Update:** Formato de edição de dados cadastrais de vendedores existentes.
   * **Delete:** Ação de remoção de vendedores do banco com alerta de confirmação.

3. **Gestão do Catálogo Global de Produtos**
   * Visualização geral de todos os produtos cadastrados no sistema.
   * Moderação (aprovar, editar ou remover produtos publicados por vendedores).

4. **Monitoramento e Relatórios**
   * Painel de controle para acompanhamento de vendas e métricas gerais do sistema.