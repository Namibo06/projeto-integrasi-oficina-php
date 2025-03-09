<?php

define("DSN", "mysql:host=localhost;dbname=db_user_register");
define("USER", "root");
define("PASSWORD", "1234");

try {
    $pdo = new PDO(DSN,USER,PASSWORD); 
} catch (\Exception $e) {
    die("Erro na conexão: " . $e->getMessage());
}
