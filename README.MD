# README — Módulo de Autenticação e Gestão (CRUD Admin)

## 1. Contexto do Módulo de Autenticação (`login.php` / `proc-login.php`)

### Objetivo
Autenticar usuários no sistema de forma centralizada a partir de uma única tela de login, tratando de maneira distinta o acesso do **Administrador (Root)** e dos **Usuários do Banco (Clientes e Vendedores)**.

### Regras de Negócio e Implementação
* **Login Master (Admin Root):**
  * Verificação realizada diretamente no código através de credenciais fixas (`$email_admin` e `$senha_admin`).
  * Não depende de registros na tabela MySQL nem utiliza o ID `0`.
  * Cria as variáveis de sessão correspondentes.
  * Redireciona diretamente para o painel administrativo (`../painel-admin.php`).

* **Login de Usuários Comuns / Vendedores (`php-proc/login.php`):**
  * Realiza a consulta `SELECT` na tabela de `usuarios` ou `vendedores` validando e-mail e senha (`usu_senha` ou `vend_senha`).
  * Tratamento Inteligente para Vendedores (PF vs PJ): Durante a criação da sessão do vendedor, utiliza-se a função SQL `IFNULL(vend_nome, vend_razao_social) as nome` para garantir que tanto Pessoas Físicas (que usam Nome) quanto Jurídicas (que usam Razão Social) sejam recebidas corretamente no painel.
  * Redireciona para os painéis específicos (`../painel-cliente.php` ou `../painel-vendedor.php`).

---

## 2. Módulo de Administração e CRUD (Status: Concluído)

O Painel Administrativo agora possui controle total sobre as principais entidades da plataforma, com uma interface gráfica moderna e padronizada através de uma Navbar de navegação global.

### Funcionalidades Implementadas:

1. **Segurança de Acesso Admin (`painel-admin.php` e CRUDs)**
   * Validação em todas as páginas restritas confirmando a sessão `$_SESSION['tipo_usuario'] === 'admin'`.
   * Bloqueio e redirecionamento de usuários comuns para a `index.php`.

2. **Gestão de Vendedores (CRUD Completo)**
   * **Create (`admin-vendedor-novo.php` / `singin-vendedor.php`):** Formulário dinâmico que alterna entre Pessoa Física (CPF/Nascimento) e Pessoa Jurídica (CNPJ/Razão Social/IE). Inclui a captação obrigatória da senha (`vend_senha`) para permitir o acesso do vendedor.
   * **Read (`admin-vendedores.php`):** Listagem em tabela estruturada com as principais informações do vendedor.
   * **Update (`admin-vendedor-editar.php`):** Tela de edição permitindo atualização dos dados cadastrais e a alteração opcional da senha de acesso.
   * **Delete:** Remoção de vendedores no banco de dados.

3. **Gestão de Clientes (`admin-clientes.php`)**
   * Visualização da listagem de todos os usuários cadastrados e funcionalidade de exclusão.

4. **Gestão do Catálogo Global de Produtos (`admin-produtos.php`)**
   * Tabela global de produtos com dados de nome, preço e descrição, acompanhada de opção de remoção pelo administrador.

5. **Relatórios e Dashboard (`admin-relatorios.php`)**
   * Tela para acompanhamento gerencial das vendas realizadas, com totalizadores de receita e quantidade de produtos vendidos.
   * O `painel-admin.php` atua como um Dashboard Inicial com os *cards* de estatísticas gerais do sistema.

6. **Padronização Visual**
   * A interface de todo o módulo administrativo utiliza um design limpo, sem barra lateral, adotando um menu de topo (Navbar interativa e responsiva), mantendo a navegação consistente para o admin.