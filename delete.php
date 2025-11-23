<?php
$id = $_GET['id'];
?>

<script>
    if (confirm("Tem certeza que deseja deletar esta tarefa?")) {
        window.location.href = "delete_action.php?id=<?php echo $id; ?>";
    } else {
        window.location.href = "tabela.php";
    }
</script>
