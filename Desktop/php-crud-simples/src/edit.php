<?php
require __DIR__ . '/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo "Essa tarefa não existe.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $edit = new Edit();
    $edit->editTask($pdo, $id, $title, $description);
}

class Edit {
    public function editTask($pdo, $id, $title, $description) {
        $stmt = $pdo->prepare("UPDATE tasks SET title = ?, description = ? WHERE id = ?");
        $stmt->execute([$title, $description, $id]);
        header("Location: index.php");
        exit;
    }
}

$stmt = $pdo->prepare("SELECT * FROM tasks WHERE id = ?");
$stmt->execute([$id]);
$task = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Editar Tarefa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container py-5">
    <h1 class="mb-4">✏️ Editar Tarefa</h1>
    <form action="edit.php?id=<?= $id ?>" method="post">
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($task['title']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <input type="text" class="form-control" id="description" name="description" value="<?= htmlspecialchars($task['description']) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Salvar</button>
        <button type="button" class="btn btn-secondary" onclick="window.location.href='index.php'">Voltar</button>
    </form>
</div>

</body>
</html>