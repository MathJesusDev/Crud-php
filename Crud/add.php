<?php

// Cria um novo registro no banco de dados
require_once '../Database/database.php';
$title = 'Crud simples em PHP - Adicionar Usuário';

if ($_POST) {
    $id = $_POST['id'];
    $name_first = $_POST['name_first'];
    $name_last = $_POST['name_last'];
    $email = $_POST['email'];
    $bday = $_POST['birthday'];

    $database -> addUser($name_first, $name_last, $email, $bday);

    header("Location: index.php");
}

?>

<!DOCTYPE html>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <body class="container">
    <title>CRUD Simples - Adicionar Usuário</title>
</head>

<body class="container">
    
    <h1><?php echo $title ?></h1>
</body>

    <form action="add.php" method="post">

        <div class="mb-3">
            <label for="name_first" class="form-label">Primeiro Nome</label>
            <input type="text" class="form-control" id="name_first" name="name_first" placeholder="Nome" required>
        </div>

        <div class="mb-3">
            <label for="name_last" class="form-label">Sobrenome</label>
            <input type="text" class="form-control" id="name_last" name="name_last" placeholder="Sobrenome" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
        </div>

        <div class="mb-3">
            <label for="birthday" class="form-label">Data de Nascimento</label>
            <input type="date" class="form-control" id="bday" name="birthday" placeholder="Data de Nascimento" required>

        <div class="mb-3">
        <button type="submit" class="btn btn-primary">Adicionar</button>
        <a href="index.php" class="btn-secondary">Cancelar</button>
        </div>
</body>
</html>