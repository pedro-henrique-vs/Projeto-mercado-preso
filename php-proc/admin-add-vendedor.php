<?php
session_start();
include_once("conexao.php");

// Trava de Segurança
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo_pessoa = mysqli_real_escape_string($conn, $_POST['tipo_pessoa']);
    $cep = mysqli_real_escape_string($conn, $_POST['cep']);
    $logradouro = mysqli_real_escape_string($conn, $_POST['logradouro']);
    $numero = mysqli_real_escape_string($conn, $_POST['numero']);
    $bairro = mysqli_real_escape_string($conn, $_POST['bairro']);

    if ($tipo_pessoa === 'PF') {
        $nome = mysqli_real_escape_string($conn, $_POST['nome']);
        $email = mysqli_real_escape_string($conn, $_POST['email_pf']);
        $cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
        $data_nasc = mysqli_real_escape_string($conn, $_POST['data_nascimento']);
        
        $query = "INSERT INTO vendedores (vend_nome, vend_email, vend_cpf, vend_dtnasc, tipo_pessoa, vend_cep, vend_logradouro, vend_numero, vend_bairro) 
                  VALUES ('$nome', '$email', '$cpf', '$data_nasc', '$tipo_pessoa', '$cep', '$logradouro', '$numero', '$bairro')";
    } else {
        $razao_social = mysqli_real_escape_string($conn, $_POST['razao_social']);
        $nome_fantasia = mysqli_real_escape_string($conn, $_POST['nome_fantasia']);
        $cnpj = mysqli_real_escape_string($conn, $_POST['cnpj']);
        $inscricao = mysqli_real_escape_string($conn, $_POST['inscricao_estadual']);
        $email = mysqli_real_escape_string($conn, $_POST['email_pj']);
        
        $query = "INSERT INTO vendedores (vend_razao_social, vend_nomefantasia, vend_cnpj, vend_inscricao_estadual, vend_email, tipo_pessoa, vend_cep, vend_logradouro, vend_numero, vend_bairro) 
                  VALUES ('$razao_social', '$nome_fantasia', '$cnpj', '$inscricao', '$email', '$tipo_pessoa', '$cep', '$logradouro', '$numero', '$bairro')";
    }

    if (mysqli_query($conn, $query)) {
        header("Location: ../admin-vendedores.php?msg=sucesso");
    } else {
        echo "Erro: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
