<?php
class Pessoa
{

    private $pdo;
    // Conexao com o banco de dados
    public function __construct($dbname, $host, $user, $pass)
    {
        try {

            $this->pdo = new PDO("mysql:dbname=" . $dbname . ";host=" . $host, $user, $pass);
        } catch (PDOException $e) {
            Mensagem("Falha ao conectar-se ao banco de dados por favor entre em contato com o administrador!", "danger") . $e;
            echo "<a href='http://wa.me/5581983347589'>entre em contato aqui </a> ";


            exit();
        } catch (Exception $e) {
            Mensagem("ocorreu um erro", "danger") . $e;
            exit();
        }
    }

    // Buscador de dados
    public function buscarDados($nome_dono)
    {
        $res = array();
        $cmd = $this->pdo->prepare("SELECT * FROM faturas WHERE nome_dono = :n ORDER BY Idfatura");
        $cmd->bindValue(":n", $nome_dono);
        $cmd->execute();
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);


        return $res;
    }

    function DeletarFaturas($nome_dono)
    {
        $cmd = $this->pdo->prepare("DELETE FROM faturas
        WHERE prestacoes = 0 and nome_dono = :n;
        ");
        $cmd->bindValue(":n", $nome_dono);
        $cmd->execute();
    }

    public function buscarValor($nome_dono)
    {
        $res =  "";
        $cmd = $this->pdo->prepare("SELECT SUM(mensalidade) FROM `faturas` WHERE nome_dono = :n");
        $cmd->bindValue(":n", $nome_dono);
        $cmd->execute();
        $res = $cmd->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }



    public function AdicionarFatura($nome, $nome_fatura, $mensalidade, $prestacao)
    // tirei a data
    {

        $cmd = $this->pdo->prepare("SELECT idfatura from faturas WHERE nome_dono = :d and nome_fatura = :f and mensalidade=:m and prestacoes=:p");
        $cmd->bindValue(":d", $nome);
        $cmd->bindValue(":f", $nome_fatura);
        $cmd->bindValue(":m", $mensalidade);
        $cmd->bindValue(":p", $prestacao);
        // $cmd->bindValue(":d", $data);
        $cmd->execute();

        if ($cmd->rowCount() > 0) {
            Mensagem("OPS!, Essa Fatura ja foi cadastrada!", "danger");
            exit();
            return false;
        } else {
            $cmd = $this->pdo->prepare("INSERT INTO  faturas (nome_fatura, mensalidade, prestacoes, nome_dono) VALUES(:f, :m, :p,:d)");


            $cmd->bindValue(":f", $nome_fatura);
            $cmd->bindValue(":m", $mensalidade);
            $cmd->bindValue(":p", $prestacao);
            $cmd->bindValue(":d", $nome);
            //  $cmd->bindValue(":d", $data);
            Mensagem("Essa Fatura foi cadastrada!", "success");

            $cmd->execute();


            return true;
        }
    }

    function SubtrairPestacoes($nome_dono)
    {
        $cmd = $this->pdo->prepare("UPDATE faturas SET prestacoes = prestacoes -1 WHERE nome_dono = :n;");
        $cmd->bindValue(":n", $nome_dono);
        $cmd->execute();
    }
}

function Mensagem($mensagem, $tipo)
{

    echo "<div class='alert alert-$tipo' role='alert'>
             $mensagem
             </div>
             <br>";
}
