-- Script para povoar o banco de dados com vendedores e usuários de teste
-- Inserindo 5 Vendedores (Mix de Pessoa Física e Pessoa Jurídica)

INSERT INTO `vendedores` (`vend_nome`, `vend_email`, `vend_dtnasc`, `vend_razao_social`, `vend_nomefantasia`, `vend_inscricao_estadual`, `vend_cep`, `vend_numero`, `vend_logradouro`, `vend_bairro`, `tipo_pessoa`, `vend_cpf`, `vend_cnpj`) VALUES
('Lucas Almeida', 'lucas.almeida@gmail.com', '1990-05-15', NULL, NULL, NULL, '01001-000', '100', 'Praça da Sé', 'Sé', 'PF', '111.222.333-44', NULL),
(NULL, 'contato@techstore.com.br', NULL, 'Tech Store Comercio Eletronico LTDA', 'TechStore', '123456789', '02002-000', '200', 'Rua Voluntários da Pátria', 'Santana', 'PJ', NULL, '11.222.333/0001-44'),
('Mariana Costa', 'mariana.costa@hotmail.com', '1985-08-22', NULL, NULL, NULL, '03003-000', '300', 'Avenida Paulista', 'Bela Vista', 'PF', '555.666.777-88', NULL),
(NULL, 'vendas@modafit.com.br', NULL, 'Moda Fit Vestuarios SA', 'ModaFit', '987654321', '04004-000', '400', 'Rua Funchal', 'Vila Olímpia', 'PJ', NULL, '55.666.777/0001-88'),
('Carlos Pereira', 'carlos.pereira@yahoo.com', '1978-11-30', NULL, NULL, NULL, '05005-000', '500', 'Avenida Brigadeiro Faria Lima', 'Pinheiros', 'PF', '999.000.111-22', NULL);


-- Inserindo 10 Usuários (Clientes)

INSERT INTO `usuarios` (`usu_nome`, `usu_email`, `usu_senha`, `usu_cpf`, `usu_telefone`, `usu_data_nasc`, `usu_cadastro_completo`) VALUES
('João Silva', 'joao.silva@gmail.com', 'senha123', '01234567890', '11987654321', '1992-01-10', 1),
('Ana Souza', 'ana.souza@hotmail.com', 'senha123', '12345678901', '11976543210', '1994-03-25', 1),
('Pedro Santos', 'pedro.santos@yahoo.com', 'senha123', '23456789012', '11965432109', '1988-07-14', 1),
('Fernanda Lima', 'fernanda.lima@outlook.com', 'senha123', '34567890123', '11954321098', '1990-12-05', 1),
('Roberto Oliveira', 'roberto.oliveira@gmail.com', 'senha123', '45678901234', '11943210987', '1985-09-30', 1),
('Juliana Alves', 'juliana.alves@hotmail.com', 'senha123', '56789012345', '11932109876', '1995-11-20', 1),
('Marcos Rodrigues', 'marcos.rodrigues@yahoo.com', 'senha123', '67890123456', '11921098765', '1993-02-18', 1),
('Camila Fernandes', 'camila.fernandes@outlook.com', 'senha123', '78901234567', '11910987654', '1989-06-08', 1),
('Rafael Costa', 'rafael.costa@gmail.com', 'senha123', '89012345678', '11909876543', '1987-04-12', 1),
('Beatriz Martins', 'beatriz.martins@hotmail.com', 'senha123', '90123456789', '11898765432', '1991-10-28', 1);
