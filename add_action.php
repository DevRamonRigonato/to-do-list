<?php
include "config.php";

$titulo = $_POST['titulo'];
$descricao = $_POST['descricao'];
$status = $_POST['status'];

$sql = "INSERT INTO tasks (titulo, descricao, status) 
        VALUES ('$titulo', '$descricao', '$status')";

if ($conn->query($sql) === TRUE) {
    echo "<script>
        alert('Tarefa adicionada com sucesso!');
        window.location.href='tabela.php';
    </script>";
} else {
    echo "<script>
        alert('Erro ao adicionar tarefa!');
        window.location.href='add.php';
    </script>";
}
?>
