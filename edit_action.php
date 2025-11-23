<?php
include "config.php";

$id = $_POST['id'];
$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$status = $_POST['status'];

$sql = "UPDATE tasks 
        SET titulo='$titulo',
            descricao='$descricao',
            status='$status'
        WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('Tarefa atualizada com sucesso!');
        window.location.href='tabela.php';
    </script>";
} else {
    echo "<script>
        alert('Erro ao atualizar tarefa!');
        window.location.href='edit.php?id=$id';
    </script>";
}
?>
