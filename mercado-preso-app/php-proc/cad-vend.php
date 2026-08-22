<?php
session_start();
include_once("conexao.php");

// Tipo de Pessoa (PF ou PJ)
$tipo_pessoa = $_POST['tipo_pessoa'];

// Pessoa Física (PF)
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$data_nascimento = $_POST['data_nascimento'];

// Pessoa Jurídica (PJ)
$razao_social = $_POST['razao_social'];
$nome_fantasia = $_POST['nome_fantasia'];
$cnpj = $_POST['cnpj'];
$inscricao_estadual = $_POST['inscricao_estadual'];

// E-mail
$email = $_POST['email'];

// Endereço
$cep = $_POST['cep'];
$logradouro = $_POST['logradouro'];
$numero = $_POST['numero'];
$bairro = $_POST['bairro'];

$sql = "INSERT INTO vendedores (
    vend_nome, 
    vend_email, 
    vend_cpf, 
    vend_dtnasc, 
    vend_razao_social, 
    vend_nomefantasia, 
    vend_cnpj, 
    vend_inscricao_estadual, 
    vend_cep, 
    vend_numero, 
    vend_logradouro, 
    vend_bairro, 
    tipo_pessoa
) VALUES (
    '$nome', 
    '$email', 
    '$cpf', 
    '$data_nascimento', 
    '$razao_social', 
    '$nome_fantasia', 
    '$cnpj', 
    '$inscricao_estadual', 
    '$cep', 
    '$numero', 
    '$logradouro', 
    '$bairro', 
    '$tipo_pessoa'
)";

$result = mysqli_query($conn, $sql);

?>