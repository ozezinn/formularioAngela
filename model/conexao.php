<?php
class Conexao {
    private $pdo;
    private $host = "localhost";
    private $dbname = "lojaCamisa";
    private $user = "root";
    private $senha = "";

    public function __construct() {
        try {
            $this->pdo = new PDO("mysql:dbname=".$this->dbname.";host=".$this->host, $this->user, $this->senha);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "ERRO DE CONEXAO NO PDO: " . $e->getMessage();
            exit();
        } catch (Exception $e) {
            echo "ERRO nao passou da conexao: " . $e->getMessage();
            exit();
        }
    }

    public function insereEndereco($ufEndC, $cidadeEndC, $bairroEndC, $ruaEndC, $cepEndC, $tipoEndC, $observacaoC, $numeroEndC, $complementoC) {
        $insere = $this->pdo->prepare("INSERT INTO endereco (uf, cidade, bairro, rua, cep, tipo, observacao, numeroReside, complemento) 
                                       VALUES (:uf, :cidade, :bairro, :rua, :cep, :tipo, :observacao, :numeroEnd, :complemento)");

        $insere->bindValue(":uf", $ufEndC);
        $insere->bindValue(":cidade", $cidadeEndC);
        $insere->bindValue(":bairro", $bairroEndC);
        $insere->bindValue(":rua", $ruaEndC);
        $insere->bindValue(":cep", $cepEndC);
        $insere->bindValue(":tipo", $tipoEndC);
        $insere->bindValue(":observacao", $observacaoC);
        $insere->bindValue(":numeroEnd", $numeroEndC); 
        $insere->bindValue(":complemento", $complementoC);
        
        $insere->execute();
    }
    public function insereCliente($nomeCliente, $cpfCliente, $telefoneCliente, $emailCliente) {
        $insere = $this->pdo->prepare("INSERT INTO cliente (nome, cpf, telefone, email) 
                                       VALUES (:nome, :cpf, :telefone, :email)");

        $insere->bindValue(":nome", $nomeCliente);
        $insere->bindValue(":cpf", $cpfCliente);
        $insere->bindValue(":telefone", $telefoneCliente);
        $insere->bindValue(":email", $emailCliente);

        $insere->execute();
    }

    
    public function insereProduto($nomeProduto, $modeloProduto, $tecidoProduto, $marcaProduto, $corProduto) {
        
            $insere = $this->pdo->prepare("INSERT INTO produto (nome, modelo, tecido, marca, cor) 
            VALUES (:nome, :modelo, :tecido, :marca, :cor)");
    
            $insere->bindValue(":nome", $nomeProduto);
            $insere->bindValue(":modelo", $modeloProduto);
            $insere->bindValue(":tecido", $tecidoProduto);
            $insere->bindValue(":marca", $marcaProduto);
            $insere->bindValue(":cor", $corProduto);
            $insere->execute();
    }
}

?>
