<?php

$host = "localhost";
$user = "root";
$passaword = "";
$banco = "carro";

$conectar = new mysqli($host, $user, $passaword, $banco);

$sql = "SELECT modelo.id, marca.nome AS nome_marca, modelo.nome AS nome_modelo, modelo.id_marca AS id_marca_modelo
        FROM marca INNER JOIN modelo ON modelo.id_marca = marca.id
        ORDER BY modelo.id ASC";
$resultado = $conectar->query($sql);

if ($resultado->num_rows > 0) {
    echo "<table>
            <tr>
                <th>ID Modelo</th>
                <th>Nome Marca</th>
                <th>Nome Modelo</th>
                <th>ID Marca</th>
            </tr>";

    while ($linha = $resultado->fetch_assoc()) {
        echo "<tr>
                <td>" . $linha['id'] . "</td>
                <td>" . $linha['nome_marca'] . "</td>
                <td>" . $linha['nome_modelo'] . "</td>
                <td>" . $linha['id_marca_modelo'] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "Nenhum resultado encontrado.";
}

$conectar->close();
?>