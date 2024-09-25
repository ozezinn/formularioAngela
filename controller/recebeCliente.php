<?php
include_once '../model/conexao.php';
include '../view/cliente.html';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém e sanitiza os dados do POST
    $nomeCliente = addslashes($_POST['nome']);
    $cpfCliente = addslashes($_POST['cpf']);
    $telefoneCliente = addslashes($_POST['telefone']);
    $emailCliente = addslashes($_POST['email']);

    // Verifica se todos os campos obrigatórios estão preenchidos
    if (empty($nomeCliente) || empty($cpfCliente) || empty($telefoneCliente) || empty($emailCliente)) {
        echo "<div class='cliente'><h2>Por favor, preencha todos os campos obrigatórios.</h2></div>";
        exit();
    }

    // Criação da conexão e inserção no banco de dados
    $clienteC = new Conexao();

    if ($clienteC->insereCliente($nomeCliente, $cpfCliente, $telefoneCliente, $emailCliente)) {
        echo "<br><br>";
        echo "<div class='cliente'><h2>ERRO AO CADASTRAR O CLIENTE</h2></div>";
    } else {
        echo "<div class='cliente'><h2>CLIENTE CADASTRADO COM SUCESSO</h2></div>";
    }
}
?>