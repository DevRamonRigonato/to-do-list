<?php
include "config.php";

$id = $_GET['id'];

$sql = "DELETE FROM tasks WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('Tarefa deletada com sucesso!');
        window.location.href='tabela.php';
    </script>";
} else {
    echo "<script>
        alert('Erro ao deletar tarefa!');
        window.location.href='tabela.php';
    </script>";
}
?>
