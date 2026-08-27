## Relatório de Acompanhamento de Evolução do Sistema - Site de Vendas (PHP)

Nome: Pedro Henrique Vargas da Silva

## 1. Introdução

## Objetivo do Sistema:

Desenvolver um site de vendas estilo mercado livre com enfoque na liberdade dos usuarios se tornarem parte dos vendedores tudo feito com base em PHP.

## Escopo do Projeto:

- Cadastro de usuários (clientes e administradores).
- Catálogo de produtos.
- Carrinho de compras e finalização de pedido.
- Integração com sistema de pagamento (simulado ou real, dependendo do estágio).
- Administração do site (CRUD de produtos, visualização de pedidos, etc.).

## 2. Estrutura do Relatório

O relatório será dividido nas seguintes seções para facilitar o acompanhamento da evolução do sistema:

- 2.1. Tarefas Concluídas
- 2.2. Tarefas em Andamento
- 2.3. Tarefas Pendentes
- 2.4. Desafios Encontrados
- 2.5. Próximos Passos
- 2.6. Observações e Comentários

## 2.1. Tarefas Concluídas

- **Criação do banco de dados:** Estruturação do banco de dados MySQL para armazenar usuários, vendedores, produtos, pedidos e outras informações essenciais.
- **Cadastro de Usuários:** Desenvolvimento do layout das telas para cadastro de novos clientes, vendedores e login.
- **Catálogo de Produtos:** Exibição de produtos na área inicial funcionando como uma vitrine de e-commerce.
- **Carrinho de Compras:** Estrutura base de visualização do carrinho de compras desenvolvida.
- **Cadastro de Vendedores:** Implementação do formulário completo de cadastro de vendedores com campos dinâmicos para Pessoa Física (PF) e Pessoa Jurídica (PJ) e integração com o banco de dados.
- **Tratamento de Dados PHP/MySQL:** Organização e correção do script de inserção no banco de dados com alinhamento rigoroso das colunas da tabela vendedores e tratamento de duplicidade nos formulários HTML.
- **Painel Administrativo (CRUD Completo):** Implementação do acesso majoritário do administrador para que possa adicionar, editar e excluir vendedores (PF/PJ), além de gerenciar clientes cadastrados, visualizar o catálogo global de produtos e acompanhar relatórios de vendas. As interfaces do painel receberam uma padronização visual com Navbar interativa.

## 2.2. Tarefas em Andamento

- Sistema de Pagamento.
- Sistema de Avaliação de Produtos.
- Responsividade: Ajustes finos na responsividade do site para otimização em dispositivos móveis (as páginas de CRUD já possuem estrutura flexível inicial).
- Segurança.

## 2.3. Tarefas Pendentes
*(Nenhuma tarefa formalmente alocada para 'Pendente' além dos próximos passos já estipulados)*

## 2.4. Desafios Encontrados

- A integração do CRUD com a organização disposta em pastas e subpastas.
- A realização das animações em Javascript e formulários dinâmicos.
- Manutenção do padrão visual da nova Navbar (e injeção contínua do estilo) entre arquivos segregados.

## 2.5. Próximos Passos

- Concluir o painel de controle do cliente (Minha Conta) e dos vendedores particulares.
- Finalizar totalmente os fluxos do cadastro de clientes (caso algo falte).
- Concluir todo o design e experiência de usuário (UX/UI) das páginas públicas.
- Estruturar a funcionalidade ou simulação do checkout (pagamento).

## 2.6. Observações e Comentários

- O projeto chegou a ficar um pouco atrasado diante o cronograma original, no entanto a base robusta do CRUD Administrativo recém-entregue alavanca o andamento.
- A implementação de um sistema de pagamento real será uma etapa crucial para finalizar o site de vendas.

## 3. Conclusão

O desenvolvimento do site de vendas encontra-se em fase de consolidação das funcionalidades fundamentais. A base administrativa (CRUD) encontra-se concluída com sucesso. A readequação do plano de trabalho visa assegurar a entrega dos demais módulos (vendedores, pagamento e clientes) com o nível de qualidade e segurança exigido, sem comprometer a integridade da arquitetura proposta.
