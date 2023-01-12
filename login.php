<?php

$is_invalid = false;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
    
    include "connection.php";
    
	$conn = new PDO($dsn, $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
    $sql = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $sql->execute([$_POST['email']]);
    $user = $sql->fetch();
    
    if ($user && password_verify($_POST['password'], $user["password_hash"])) {
        
        session_start();
		session_regenerate_id();
			
		$_SESSION["user_id"] = $user["id"];
			
		header("Location: demos.php");
		exit;
		
    } 
    
    $is_invalid = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
	<style>
	
		h1 {
            font-size: 65px;
            color: red;
        }

        label {
            font-size: 15px;
            color: gold;
        }

    </style>
</head>
<body>

	<div align='center'>
		<h1>Login</h1>

		<?php if ($is_invalid): ?>
			<em>Invalid Login</em>
		<?php endif; ?>
	</div><br>

	<form method="post">
		<div align='center'>
			<label for="email">E-Mail:</label>
			<input type="text" id="email" name="email">
		</div>

		<div align='center'>
			<label for="password">Password:</label>
			<input type="password" id="password" name="password">
		</div><br>

		<div align='center'>
			<button type="submit" id="submit">
				Login
			</button>
		</div>
	</form>

</body>
</html>
