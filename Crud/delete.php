<?php

// deleta um registro do banco de dados
require_once '../Database/database.php';

$title = 'Crud simples em PHP - Deletar Usuário';

if ($_GET) {
    $id = $_GET['id'];
   if ($id){
    $database -> delUser($user);    
    }
}

header("Location: index.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <body class="container">
    <title>CRUD Simples - Deletar Usuário</title>
</head>

<body class="container">
    <h1><?php echo $title ?></h1>

    <form action="delete.php" method="post">
        <div class="mb-3">
            <label for="id" class="form-label">ID do Usuário</label>
            <input type="number" class="form-control" id="id" name="id" required>
        </div>

        <button type="submit" class="btn btn-danger">Deletar</button>
        <a href="index.php" class="btn-secondary">Cancelar</button>
</body>

</html>