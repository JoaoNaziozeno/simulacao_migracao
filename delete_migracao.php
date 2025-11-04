<?php
include'conexao.php';


$deleteSql = "DELETE FROM veiculos2 WHERE idOrigem IS NOT NULL";
if ($conexaoDestino->query($deleteSql) === TRUE) {
    echo "Dados migrados deletados com sucesso.";
} else {
    echo "Erro ao deletar dados migrados: " . $conexaoDestino->error;
}
$conexaoDestino->close();


?>