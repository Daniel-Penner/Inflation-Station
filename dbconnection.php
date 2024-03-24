<?php
try {
    $connectionString = "mysql:host=localhost;dbname=db_54925359";
    $username = "54925359";
    $password = "54925359";

    // Create connection
    $pdo = new PDO($connectionString, $username, $password);
} catch(PDOException $e) {
    die ($e->getMessage());
}

