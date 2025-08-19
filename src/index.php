<?php
require __DIR__ . '/config.php';

$stmt = $pdo->query("SELECT * FROM tasks ORDER BY created_at DESC");
$tasks = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Tarefas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark">
<div class="container my-5">
    <div class="card shadow-sm p-4">
        <h1 class="text-center mb-4">📋 Lista de Tarefas</h1>

        <div class="text-center mb-3">
            <form action="create.php" method="get">
                <button class="btn btn-success">➕ Nova Tarefa</button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle text-center">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Criada em</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!$tasks): ?>
                        <tr>
                            <td colspan="5" class="text-center">Nenhuma tarefa cadastrada.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($tasks as $t): ?>
                        <tr>
                            <td><?= $t['id'] ?></td>
                            <td><?= htmlspecialchars($t['title']) ?></td>
                            <td class="text-break"><?= htmlspecialchars($t['description']) ?></td>
                           <td><?= date('d/m/Y | H:i', strtotime($t['created_at'])) ?></td>
                            <td>
                                
                                <form action="edit.php" method="get" class="d-inline">
                                    <input type="hidden" name="id" value="<?= $t['id'] ?>">
                                    <button class="btn btn-primary btn-sm" type="submit">✏️ Editar</button>
                                </form>
                               
                                <form action="delete.php" method="get" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                                    <input type="hidden" name="id" value="<?= $t['id'] ?>">
                                    <button class="btn btn-danger btn-sm" type="submit">🗑️ Excluir</button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>