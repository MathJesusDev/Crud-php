<?php
require __DIR__ . '/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $deletar = new Deletar();
    $deletar->delTask($pdo, $id);

    header("Location: index.php");
    exit;
} else {
    echo "Essa tarefa não existe";
    exit;
}

class Deletar {
    public function delTask($pdo, $id) {
        $stmt = $pdo->prepare("DELETE FROM tasks WHERE id = ?");
        $stmt->execute([$id]);
    }
}
?>