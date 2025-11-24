<?php
include "config.php";

if (!isset($_GET['id'])) {
    die("ID inválido.");
}

$id = intval($_GET['id']);
$sql = "SELECT * FROM tasks WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Tarefa não encontrada.");
}

$task = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Editar Tarefa</title>

  <link id="tema" rel="stylesheet" href="css/tema-claro.css">
  <link rel="stylesheet" href="css/style.css">
</head>

<body>

<header>
  <div class="navbar container">
    <div class="brand">✅ To-Do List</div>
    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="tabela.php">Tabela</a></li>
        <li><a href="contato.html">Contato</a></li>
        <li><a href="equipe.html">Equipe</a></li>
      </ul>
    </nav>
    <button class="theme-toggle" onclick="alternarTema()" title="Tema">🌓 Tema</button>
  </div>
</header>

<main class="container">
  <div class="card" style="max-width:700px; margin:0 auto;">
    <h1>Editar Tarefa</h1>

    <!-- ALTERAÇÃO IMPORTANTE AQUI -->
    <form action="edit_action.php" method="POST">
      <input type="hidden" name="id" value="<?= $task['id'] ?>">

      <div class="field">
        <label>Título:</label>
        <input type="text" name="titulo" value="<?= $task['titulo'] ?>" required>
      </div>

      <div class="field">
        <label>Descrição:</label>
        <textarea name="descricao" rows="4" required><?= $task['descricao'] ?></textarea>
      </div>

      <div class="field">
        <label>Status:</label>
        <select name="status" required>
          <option value="pendente" <?= $task['status'] == 'pendente' ? 'selected' : '' ?>>Pendente</option>
          <option value="concluida" <?= $task['status'] == 'concluida' ? 'selected' : '' ?>>Concluída</option>
        </select>
      </div>

      <button class="btn" type="submit">Salvar Alterações</button>
    </form>

  </div>
</main>

<footer>
  <div class="container">Feito por Ramon • Projeto Acadêmico To-Do List</div>
</footer>

<script src="js/tema.js"></script>
</body>
</html>
