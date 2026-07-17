<?php
    $servername = getenv('DB_HOST') ?: "mysql_db";
    $port       = getenv('DB_PORT') ?: "3306";
    $dbname     = getenv('DB_NAME') ?: "KVault";
    $username   = getenv('DB_USER') ?: "app_user";
    $password   = getenv('DB_PASSWORD') ?: "app_password";

    try {
        $dsn = "mysql:host=$servername;port=$port;dbname=$dbname;charset=utf8mb4";
        $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        error_log("Database Connection Error: " . $e->getMessage());
        die("Si è verificato un errore di connessione al database. Riprova più tardi.");
    }
?>