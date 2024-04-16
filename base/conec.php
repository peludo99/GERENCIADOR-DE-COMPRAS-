<?php 

try {
    $pdo = new PDO("mysql:dbname=Rose;host=127.0.0.1","root","root");

} catch (PDOException $e) {
    echo "erro";
}

$res = $pdo->prepare("INSERT INTO faturas (nome_fatura, mensalidade, prestacoes, data, nome_dono) VALUES (:nf,:m, :p, :d, :nd)");
$res->bindValue(":nf","pernambucano");
$res->bindValue("m","12.8");
$res->bindValue("p","4");
$res->bindValue("d","2005-12-12");
$res->bindValue("nd","cauan a");
$res->execute();



?>