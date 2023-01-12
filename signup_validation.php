<?php

if (empty($_POST["first"])) {
	die("First name is required.");
}

if (empty($_POST["last"])) {
	die("Last name is required.");
}

if (! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
	die("Valid email is required.");
}

if (strlen($_POST["password"]) < 8) {
	die("Password must be at least 8 characters long.");
}

if (! preg_match("/[a-z]/i", $_POST["password"])) {
	die("Password must contain at least one letter.");
}

if (! preg_match("/[0-9]/i", $_POST["password"])) {
	die("Password must contain at least one number.");
}

if ($_POST["password"] !== $_POST["password_confirm"]) {
	die("Password must match.");
}

if(!empty($_POST['first']) && 
	!empty($_POST['last']) && 
	!empty($_POST['age']) && 
	!empty($_POST['email']) &&
	!empty($_POST['password'])) {

	$first = $_POST['first'];
	$last = $_POST['last'];
	$age = $_POST['age'];
	$email = $_POST['email'];
	$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
	
	include "connection.php";
	
	try {
	    
	    $conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = $conn->prepare("INSERT INTO users (first_name, last_name, age, email, password_hash) 
        VALUES (?, ?, ?, ?, ?)");
        
        $sql->bindValue(1, $first, PDO::PARAM_STR);
        $sql->bindValue(2, $last, PDO::PARAM_STR);
        $sql->bindValue(3, $age, PDO::PARAM_INT);
        $sql->bindValue(4, $email, PDO::PARAM_STR);
        $sql->bindValue(5, $password_hash, PDO::PARAM_STR);
        
        $sql->execute();
        header("Location: login_link.php");
            
    } catch (PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
    }
}