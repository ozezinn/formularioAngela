<?php
require_once '../model/conexao.php';
include '../view/cliente.html';

// Verifica se o método de requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém e sanitiza os dados do POST
    $nomeCliente = isset($_POST['nome']) ? $_POST['nome'] : '';
    $cpfCliente = isset($_POST['cpf']) ? $_POST['cpf'] : '';
    $telefoneCliente = isset($_POST['telefone']) ? $_POST['telefone'] : '';
    $emailCliente = isset($_POST['email']) ? $_POST['email'] : '';

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