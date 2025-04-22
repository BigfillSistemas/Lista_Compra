<?php
require_once 'includes/config.php';
require_once 'includes/functions.php';

// Processar formulário se enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Location: process/add_item.php');
    exit;
}

$itens = getItens();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <title>Lista</title>
    <meta charset="utf-8">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      .head {
        background-color: black;
        color: white;
        padding: 15px;
        border-radius: 5px;
      }
      .form-container{
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
      }
      th, td {
        text-align: center;
      }
    </style>
  </head>
  <body class="container mt-4">
    <h1 class="text-center head"><b>LISTA DE COMPRA</b></h1>
    
    <!-- Formulário para adicionar novos itens -->
    <div class="form-container">
      <h5>Adicionar Novo Item</h5>
      <form method="POST" action="process/add_item.php">
        <div class="row mb-3">
          <div class="col-md-4">
            <label for="itemDateTime" class="form-label">Data e Hora</label>
            <input type="datetime-local" class="form-control" id="itemDateTime" name="itemDateTime" required>
          </div>
          <div class="col-md-4">
            <label for="itemName" class="form-label">Item</label>
            <input type="text" class="form-control" id="itemName" name="itemName" placeholder="Digite o nome do item" required>
          </div>
          <div class="col-md-4">
            <label for="itemQuantity" class="form-label">Quantidade</label>
            <input type="number" class="form-control" id="itemQuantity" name="itemQuantity" min="1" value="1" required>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Adicionar Item</button>
      </form>
    </div>

    <!-- Tabela de itens -->
    <table class="table table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th scope="col">Data</th>
          <th scope="col">Item</th>
          <th scope="col">Quantidade</th>
          <th scope="col">Ação</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($itens as $item): ?>
        <tr>
          <td><?= htmlspecialchars($item['Data']) ?></td>
          <td><?= htmlspecialchars($item['Item']) ?></td>
          <td><?= htmlspecialchars($item['Quantidade']) ?></td>
          <td>
            <a href="process/delete_item.php?id=<?= $item['Id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este item?')">Excluir</a>
          </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      // Definir data/hora atual como padrão
      document.addEventListener('DOMContentLoaded', function() {
        const now = new Date();
        const timezoneOffset = now.getTimezoneOffset() * 60000;
        const localISOTime = (new Date(now - timezoneOffset)).toISOString().slice(0, 16);
        document.getElementById('itemDateTime').value = localISOTime;
      });
    </script>
  </body>
</html>