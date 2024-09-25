<?php
require_once '../model/conexao.php';
include '../view/endereco.html';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $ufEndC = addslashes($_POST['uf']);
    $cidadeEndC = addslashes($_POST['cidade']);
    $bairroEndC = addslashes($_POST['bairro']);
    $ruaEndC = addslashes($_POST['rua']);
    $cepEndC = addslashes($_POST['cep']);
    $tipoEndC = addslashes($_POST['tipo']);
    $observacaoC = addslashes($_POST['observacao']);
    $numeroEndC = addslashes($_POST['numero']);
    $complementoC = addslashes($_POST['complemento']);

    // Criação da conexão e inserção no banco de dados
    $enderecoC = new Conexao();

    if ($enderecoC->insereEndereco($ufEndC, $cidadeEndC, $bairroEndC, $ruaEndC, $cepEndC, $tipoEndC, $observacaoC, $numeroEndC, $complementoC)) {
        echo "<br><br>";
        echo "<div class='endereco'><h2>ENDEREÇO CADASTRADO COM SUCESSO</h2></div>";
    } else {
        echo "<br><br>";
        echo "<div class='endereco'><h2>ERRO AO CADASTRAR O ENDEREÇO</h2></div>";
    }
}
?>
