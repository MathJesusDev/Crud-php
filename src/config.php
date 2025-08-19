<?php
$host = getenv('DB_HOST') ?: 'db';
$db   = getenv('DB_NAME') ?: 'tasks_db';
$user = getenv('DB_USER') ?: 'app';
$pass = getenv('DB_PASS') ?: 'app123';

$dsn = "mysql:host={$host};dbname={$db};charset=utf8mb4";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo "Erro ao conectar no banco: " . $e->getMessage();
    exit;
}
