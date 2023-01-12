<?php

try {

    $host = "localhost";
    $dbname = "id20130288_login_db";

    $dsn = "mysql:host=$host;dbname=$dbname";
    $username = "id20130288_root";
    $password = "}kwtK()S@BbsfnN0";
    
    $conn = new PDO($dsn, $username, $password);
    
    $conn->query("USE $dbname");

} catch (\PDOException $e) {
    die("Connection Error: " . $e->getMessage());
}

?>