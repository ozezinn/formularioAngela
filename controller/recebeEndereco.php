<?php
require_once '../model/conexao.php';
include '../view/endereco.html';


$ufEndC = isset($_POST['uf']) ? addslashes($_POST['uf']) : '';
$cidadeEndC = isset($_POST['cidade']) ? addslashes($_POST['cidade']) : '';
$bairroEndC = isset($_POST['bairro']) ? addslashes($_POST['bairro']) : '';
$ruaEndC = isset($_POST['rua']) ? addslashes($_POST['rua']) : '';
$cepEndC = isset($_POST['cep']) ? addslashes($_POST['cep']) : '';
$tipoEndC = isset($_POST['tipo']) ? addslashes($_POST['tipo']) : '';
$observacaoC = isset($_POST['observacao']) ? addslashes($_POST['observacao']) : '';
$numeroEndC = isset($_POST['numero']) ? addslashes($_POST['numero']) : '';
$complementoC = isset($_POST['complemento']) ? addslashes($_POST['complemento']) : '';

// Criação da conexão e inserção no banco de dados
$enderecoC = new Conexao();
$enderecoC->insereEndereco($ufEndC, $cidadeEndC, $bairroEndC, $ruaEndC, $cepEndC, $tipoEndC, $observacaoC, $numeroEndC, $complementoC);

// Mensagem de sucesso
echo "<br><br>";
echo "<div class='endereco'><h2>ENDEREÇO CADASTRADO COM SUCESSO</h2></div>";
?>