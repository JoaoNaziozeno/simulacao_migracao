<?php
include 'conexao.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $sql = "DELETE FROM veiculos2 WHERE id = $id";

    if ($conexaoDestino->query($sql) === TRUE) {
        header("Location: visual.php?excluido=1");
        exit;
    } else {
        echo "Erro ao excluir veículo: " . $conexaoDestino->error;
    }
} else {
    echo "ID inválido.";
}
?>