<?php
require_once '../model/conexao.php';
include '../view/produto.html';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nomeProduto = $_POST['nome'];
    $modeloProduto = $_POST['modelo'];
    $tecidoProduto = $_POST['tecido'];
    $marcaProduto = $_POST['marca'];
    $corProduto = $_POST['cor'];

    $produto = new Conexao();

    if ($produto->insereProduto($nomeProduto, $modeloProduto, $tecidoProduto, $marcaProduto, $corProduto)) {
        echo "<br><br>";
        echo "<div class='produto'><h2>PRODUTO CADASTRADO COM SUCESSO</h2></div>";
    } else {
        echo "<div class='produto'><h2>ERRO AO CADASTRAR O PRODUTO</h2></div>";
    }
}
?>
