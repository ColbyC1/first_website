<!DOCTYPE html>
<html lang="en">
<head>
    <title>index</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js" defer></script>
    <script src="validation.js" defer></script>
    <style>
    
        h1 {
            font-size: 65px;
            color: red;
        }

        p {
            font-size: 20px;
            color: red;
        }

        #text {
            font-size: 20px;
            color: red;
        }

        label {
            font-size: 15px;
            color: gold;
        }

        #date {
            font-size: 20px;
            color: skyblue;
        }

    </style>
</head>
<body>

    <div align='center'>
        <h1>Home</h1>
        <p> <a href="login.php">Login</a> or sign up below to continue:</p>
    </div>

    <form action="signup_validation.php" id="signup" method="POST" novalidate>

        <div align='center'>
            <label for="first">First name:</label>
            <input type="text" id="first" name="first" required>
        </div>

        <div align='center'>
            <label for="last">Last name:</label>
            <input type="text" id="last" name="last" required>
        </div>

        <div align='center'>
            <label for="age">Age:</label>
            <input type="text" id="age" name="age" required>
        </div>

        <div align='center'>
            <label for="email">E-Mail:</label>
            <input type="text" id="email" name="email" required>
        </div><br>

        <div align='center'>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div align='center'>
            <label for="password_confirm">Repeat password:</label>
            <input type="password" id="password_confirm" name="password_confirm">
        </div><br>

        <div align='center'>
            <button>Submit</button>
            <button type="reset" id="clear">Clear</button>
        </div>

    </form>
    <p id="text" align='center'>
        Everything recorded is for training purposes and will be deleted every 12 hours.<br> 
        Thank you for your cooperation/ participation! :)
    </p>

    <div id='date' align='center'>
        <!-- date -->
    </div>

    <script>
        const date = new Date();
        document.getElementById("date").innerHTML = "Today's date: " + date;
    </script>

</body>
</html>
