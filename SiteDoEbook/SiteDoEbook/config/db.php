<?php
$host = 'ep-flat-snow-ack6uo9t-pooler.sa-east-1.aws.neon.tech';
$dbname = 'neondb';
$user = 'neondb_owner';
$password = 'npg_CnwG7hvA3YLj';
$endpoint_id = "ep-flat-snow-ack6uo9t";
$dsn = "pgsql:host=$host;dbname=$dbname;user=$user;password=$password;sslmode=require;options='endpoint=$endpoint_id'";
try {
    $pdo = new PDO($dsn);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>