<?php
    $host = "localhost";
    $port = "5432";
    $dbname = "sevoto_test2";
    $user = "postgres";
 $password = "123456";

    $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";

    try {
        $pdo = new PDO($dsn);
        
    } catch (PDOException $e) {
        echo "<script>alert('Error al conectar a la base de datos: " . $e->getMessage() . "');</script>";
    }
?>
