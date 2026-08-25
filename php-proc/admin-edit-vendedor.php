<?php
session_start();
include_once("conexao.php");

// Trava de Segurança
if (!isset($_SESSION['tipo_usuario']) || $_SESSION['tipo_usuario'] !== 'admin') {
    header("Location: ../index.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['vend_id']) ? intval($_POST['vend_id']) : 0;
    if ($id === 0) {
        header("Location: ../admin-vendedores.php?msg=erro");
        exit();
    }

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
        
        $query = "UPDATE vendedores SET 
                  vend_nome = '$nome', 
                  vend_email = '$email', 
                  vend_cpf = '$cpf', 
                  vend_dtnasc = '$data_nasc', 
                  tipo_pessoa = '$tipo_pessoa', 
                  vend_cep = '$cep', 
                  vend_logradouro = '$logradouro', 
                  vend_numero = '$numero', 
                  vend_bairro = '$bairro',
                  vend_razao_social = NULL,
                  vend_nomefantasia = NULL,
                  vend_cnpj = NULL,
                  vend_inscricao_estadual = NULL
                  WHERE vend_id = $id";
    } else {
        $razao_social = mysqli_real_escape_string($conn, $_POST['razao_social']);
        $nome_fantasia = mysqli_real_escape_string($conn, $_POST['nome_fantasia']);
        $cnpj = mysqli_real_escape_string($conn, $_POST['cnpj']);
        $inscricao = mysqli_real_escape_string($conn, $_POST['inscricao_estadual']);
        $email = mysqli_real_escape_string($conn, $_POST['email_pj']);
        
        $query = "UPDATE vendedores SET 
                  vend_razao_social = '$razao_social', 
                  vend_nomefantasia = '$nome_fantasia', 
                  vend_cnpj = '$cnpj', 
                  vend_inscricao_estadual = '$inscricao', 
                  vend_email = '$email', 
                  tipo_pessoa = '$tipo_pessoa', 
                  vend_cep = '$cep', 
                  vend_logradouro = '$logradouro', 
                  vend_numero = '$numero', 
                  vend_bairro = '$bairro',
                  vend_nome = NULL,
                  vend_cpf = NULL,
                  vend_dtnasc = NULL
                  WHERE vend_id = $id";
    }

    if (mysqli_query($conn, $query)) {
        header("Location: ../admin-vendedores.php?msg=sucesso");
    } else {
        echo "Erro: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
