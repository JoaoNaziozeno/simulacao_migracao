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
foreach ($dadosVeiculos as $veiculo) {
    $id = $veiculo['id'];
    $marca = $veiculo['marca'];
    $modelo = $veiculo['modelo'];
    $ano = $veiculo['ano'];
    $quilometragem = $veiculo['quilometragem'];
    $preco = $veiculo['preco'];
    $cor = $veiculo['cor'];
    $combustivel = $veiculo['combustivel'];
    $cambio = $veiculo['cambio'];
    $portas = $veiculo['portas'];
    $observacoes = $veiculo['observacoes'];
    $data_cadastro = $veiculo['data_cadastro'];

    $sqlInsert = "INSERT INTO veiculos2 (marca, modelo, ano, quilometragem, preco, cor, combustivel, cambio, portas, observacoes, data_cadastro) VALUES ('$marca', '$modelo', '$ano', '$quilometragem', '$preco', '$cor', '$combustivel', '$cambio', '$portas', '$observacoes', '$data_cadastro')";
    //$conexaoDestino->query($sqlInsert);

    if ($conexaoDestino->query($sqlInsert) === TRUE) {
        echo "Registro inserido com sucesso na tabela destino veiculos. <br>";
    } else {
        echo "Erro ao inserir registro na tabela destino veiculos: " . $conexaoDestino->error . "<br>";
    }
}
$conexaoOrigem->close();

?>