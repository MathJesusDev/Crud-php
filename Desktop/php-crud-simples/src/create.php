<?php
require __DIR__ . '/config.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $create = new Create();
    $create->addTask($pdo, $title, $description);
}

class Create {
    public function addTask($pdo, $title, $description) {
        $stmt = $pdo->prepare("INSERT INTO tasks (title, description) VALUES (?, ?)");
        $stmt->execute([$title, $description]);
         $_SESSION['success'] = "Tarefa adicionada com sucesso";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Tarefas - Crud Simples</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container py-5">
    <h1 class="mb-4">➕ Adicionar Tarefa</h1>

        <?php if (isset($_SESSION['success'])): ?>
    <div id="alert-success" class="alert alert-success position-fixed top-50 start-50 translate-middle text-center" role="alert">
        <?= $_SESSION['success'] ?>
    </div>
    <?php unset($_SESSION['success']);?>
        <?php endif; ?>

<script>
    const alert = document.getElementById('alert-success');
    if(alert) {
        setTimeout(() => {
            alert.style.transition = "opacity 0.3s ease";
            alert.style.opacity = "0";
            setTimeout(() => alert.remove(), 1000);
        }, 1100);
    }
</script>

    <form action="create.php" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Título" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Descrição" required>
        </div>

        <button type="submit" class="btn btn-primary">Adicionar</button>
        <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php'">Voltar</button>
    </form>
</div>

</body>