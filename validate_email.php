<?php

try {

	include "connection.php";
	$conn = new PDO($dsn, $username, $password);
	$sql = $conn->prepare("SELECT * FROM users WHERE email = ?");
	$sql->bindParam(1, $_GET['email'], PDO::PARAM_STR);

	$sql->execute();

	$num_rows = $sql->rowCount();

	$is_available = $num_rows === 0;

	header("Content-Type: application/json");

	echo json_encode(["available" => $is_available]);

} catch (PDOException $e) {
	echo $sql . "<br>" . $e->getMessage();
}



?>