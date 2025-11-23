<?php
include "config.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Adicionar Tarefa</title>

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

    <button class="theme-toggle" onclick="alternarTema()" title="Alternar tema">🌓 Tema</button>
  </div>
</header>

<main class="container">
  <div class="card" style="max-width:720px;margin:0 auto;">
    <h1>Adicionar Nova Tarefa</h1>

    <form action="add_action.php" method="POST">

      <div class="field">
        <label>Título</label>
        <input type="text" name="titulo" required placeholder="Digite o título da tarefa">
      </div>

      <div class="field">
        <label>Descrição</label>
        <textarea name="descricao" rows="4" required placeholder="Digite uma descrição"></textarea>
      </div>

      <div class="field">
        <label>Status</label>
        <select name="status" required>
          <option value="pendente">Pendente</option>
          <option value="concluida">Concluída</option>
        </select>
      </div>

      <button class="btn" type="submit">Salvar</button>

    </form>
  </div>
</main>

<footer>
  <div class="container">Feito por Ramon • Projeto Acadêmico To-Do List</div>
</footer>

<script src="js/tema.js"></script>
</body>
</html>
