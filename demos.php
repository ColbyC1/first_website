<?php 

session_start();

if (isset($_SESSION["user_id"])) {

    include "connection.php";
	$conn = new PDO($dsn, $username, $password);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$sql = "SELECT * FROM users WHERE id = {$_SESSION["user_id"]} ";
	$result = $conn->query($sql);
	$user = $result->fetch();
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Demos</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
	<style>

        h1 {
          font-size: 75px;
          color: red;
        }
    
        h2 {
          font-size: 25px;
          color: gold;
        }

    </style>
</head>
<body>
	<?php if (isset($user)): ?>
		
		<div align='center'>
			<h1>Demos</h1>
			<h2>Welcome <?= htmlspecialchars($user["first_name"]) ?>!</h2><br>

			<button>
				<a href="madLibs.html">madLibs</a>
			</button><br>

			<button>
				<a href="rps.html">RPS</a>
			</button><br>

			<button>
				<a href="survey.html">Survey</a>
			</button><br>

			<button>
				<a href="trivia.html">Trivia</a>
			</button><br><br>

			<button>
				<a href="logout.php">Logout</a>
			</button>

		</div>

	<?php else: ?>
		<div align='center'>
			<h1>Logout successful</h1>

			<button>
				<a href="login.php">Login</a>
			</button>

			<button>
				<a href="index.php">Sign Up</a>
			</button>
		</div>
	<?php endif; ?>

</body>
</html>