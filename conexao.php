<?php

$host = "localhost";
$user = "root";
$passaword = "";

$bancoOrigem = "sislogin";
$conexaoOrigem = new mysqli($host, $user, $passaword, $bancoOrigem);

$bancoDestino = "sislogin2";
$conexaoDestino = new mysqli($host, $user, $passaword, $bancoDestino);

$sql = "SELECT * FROM veiculos";
$resultado = $conexaoOrigem->query($sql);


// verifica e guarda a quantidade de linhas na tabela origem veiculos 
if ($resultado->num_rows > 0) {
    $dadosVeiculos =[];

    while ($linha = $resultado->fetch_assoc()) {
        $dadosVeiculos[] = $linha;
    }
    echo "<pre>";
    print_r($dadosVeiculos);
    echo "</pre>";
}

?>