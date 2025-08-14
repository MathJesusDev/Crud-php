<?php
require_once "../database/database.php";

$users = $database->getUsers(); // Obtém os usuários do banco de dados
$title = "Crud simples em PHP - Usuários";

use Database\database;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <body class="container">
    <title>CRUD Simples em PHP - Usuários</title>
</head>

<body class="container">
    <h1><?php echo $title ?></h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Email</th>
                <th>Data de Nascimento</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['id']; ?></td>
                <td><?php echo $user['name']; ?></td>
                <td><?php echo $user['name_first']; ?></td>
                <td><?php echo $user['name_last']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td><?php echo $user['bday']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $user['id']; ?>" class="btn btn-primary">Edit</a>
                    <a href="delete.php?id=<?php echo $user['id']; ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="add.php" class="btn btn-success">Add User</a>

</body>