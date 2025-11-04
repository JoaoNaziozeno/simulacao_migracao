<?php
include 'conexao.php';
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body class="bg-light">


  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand">Tabela Migrada</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="menu">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <button class="btn btn-danger ms-2" data-bs-toggle="modal" data-bs-target="#modalExcluir">
              Excluir Veículos
            </button>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <section class="py-5 text-center">
    <h1 class="mb-4">Itens migrados sislogin2</h1>
    <div class="row justify-content-center g-4" style="max-width: 1000px; margin: 0 auto;">
        <?php
        $sql = "SELECT * FROM veiculos2 ORDER BY id DESC";
        $result = $conexaoDestino->query($sql);

        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $foto = !empty($row['foto']) ? "uploads/{$row['foto']}" : "https://dummyimage.com/400x250/cccccc/000000&text=Sem+Imagem";

            echo '<div class="col-md-4">
                    <div class="card h-100 shadow">
                      <img src="'.$foto.'" class="card-img-top" alt="Carro">
                      <div class="card-body">
                        <h5 class="card-title">'.$row['marca'].' '.$row['modelo'].' '.$row['ano'].'</h5>
                        <p class="card-text">
                          Motor '.$row['combustivel'].' <br>'.$row['cambio'].' <br>'.$row['quilometragem'].' km
                        </p>
                        <p class="fw-bold text-success">R$ '.number_format($row['preco'], 2, ',', '.').'</p>
                        <a href="#" class="btn btn-primary">Comprar</a>
                      </div>
                    </div>
                  </div>';
          }
        } else {
          echo '<div class="col-12 text-center">
                  <p class="lead">Nenhum veículo disponível no momento.</p>
                </div>';
        }
        ?>
    </div>
  </section>


  <div class="modal fade" id="modalExcluir" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content shadow-lg">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title">Excluir veículos</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p>Selecione o veículo que deseja excluir:</p>
        <div class="modal-footer">
          <form action="excluir.php" method="get">
            <div class="mb-3">
              <select name="id" class="form-select" required>
                <option value=""> -- Escolha um veículo -- </option>
                <?php

                $sqlTodos = "SELECT id, marca, modelo, ano FROM veiculos2 ORDER BY marca";
                $resultTodos = $conexaoDestino->query($sqlTodos);

                while ($v =   $resultTodos->fetch_assoc()) {
                echo   '<option value="'.$v['id'].'">'.$v['marca'].' '.$v['modelo'].' '.$v['ano'].'</option>';
                }

                $conexaoDestino->close();
                ?>
              </select>
            </div>
          </form>
        </div>
      
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>