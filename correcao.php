<?php
include 'conexao.php';

$sql = "SELECT * FROM veiculos";
$resultado = $conexaoOrigem->query($sql);

if ($resultado && $resultado->num_rows > 0) {
   while ($linha = $resultado->fetch_assoc()) {
        $id = $linha['id'];
        $modelo = trim($linha['modelo']);

        if (empty($modelo)) {
            continue;
        }

        $modeloCorrigido = str_replace(',', '', $modelo);

        if ($modeloCorrigido !== $modelo) {
            $updateSql = $conexaoOrigem->prepare("UPDATE veiculos SET modelo = ? WHERE id = ?");
            $updateSql->bind_param('si', $modeloCorrigido, $id);
            $updateSql->execute();

            echo "Modelo ID $id corrigido de '$modelo' para '$modeloCorrigido'<br>";
        }
   }
} else { 
    echo "Nada consta nos registros";
}

$conexaoOrigem->close();

?>