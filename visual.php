<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visual</title>
</head>
<body>
    <h1 class="mb-4">Itens migrados sislogin2</h1>
    <div class="row g-4">
      <?php
      $sql = "SELECT * FROM veiculos2 ORDER BY id DESC";
      $result = $conn->query($sql);

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
      
      $conn->close();
      ?>

    </div>
</body>
</html>