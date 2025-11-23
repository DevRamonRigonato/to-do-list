<?php
include "config.php";
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Tabela de Tarefas</title>

  <!-- Tema claro/escuro -->
  <link id="tema" rel="stylesheet" href="css/tema-claro.css">

  <!-- Estilo principal -->
  <link rel="stylesheet" href="css/style.css">
</head>

<body>
<header>
  <div class="navbar container">
    <div class="brand">✅ To-Do List</div>
    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a class="active" href="tabela.php">Tabela</a></li>
        <li><a href="contato.html">Contato</a></li>
        <li><a href="equipe.html">Equipe</a></li>
      </ul>
    </nav>
    <button class="theme-toggle" onclick="alternarTema()" title="Alternar tema">🌓 Tema</button>
  </div>
</header>

<main class="container">

  <div class="card">
    <h1>Tarefas Cadastradas</h1>

    <div style="text-align:center; margin-bottom:15px;">
      <a href="add.php" class="btn-add">+ Adicionar Nova Tarefa</a>
    </div>

    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Descrição</th>
            <th>Status</th>
            <th>Data de Criação</th>
            <th>Ações</th>
          </tr>
        </thead>

        <tbody>
          <?php
          $sql = "SELECT * FROM tasks ORDER BY id DESC";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {

              echo "<tr>";
              echo "<td>".$row['id']."</td>";
              echo "<td>".$row['titulo']."</td>";
              echo "<td>".$row['descricao']."</td>";
              echo "<td>".$row['status']."</td>";
              echo "<td>".$row['data_criacao']."</td>";

              echo "<td>
                      <a class='btn-edit' href='edit.php?id=".$row['id']."'>Editar</a> |
                      <a class='btn-delete' href='delete.php?id=".$row['id']."'>Deletar</a>
                    </td>";

              echo "</tr>";
            }
          } else {
            echo "<tr><td colspan='6' class='no-items'>Nenhuma tarefa encontrada.</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>

  </div>

</main>

<footer>
  <div class="container">Feito por Ramon • Projeto Acadêmico To-Do List</div>
</footer>

<script src="js/tema.js"></script>
</body>
</html>
