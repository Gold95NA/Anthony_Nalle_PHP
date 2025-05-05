<?php

session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $pdo = new PDO("mysql:host=localhost;dbname=patient_ehr", 'root', '');


    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");

    $stmt->execute([$_POST['username']]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($_POST['password'], $user['password_hash'])) {

        $_SESSION['username'] = $user['username'];

        header('Location: search.php');

        exit();

    } else {

        $error = "Invalid login.";

    }  
}

?>

<!DOCTYPE html>

<html>

<head>

    <title>Login</title>

    <style>
        
        body {

            background:rgb(12, 12, 12);

            padding: 2em;

            text-align: left;

            color: #ffffff;

            font-family: Arial, Helvetica, sans-serif;

        }

        h1 {

            display: flex;

            justify-content: center;

        }
        
        </style>

</head>

<body>

<h1>Login</h1>

<form method="POST">

    <label>Username:</label><input name="username" required><br><br>

    <label>Password:</label><input type="password" name="password" required><br><br>

    <button type="submit">Login</button>

</form>

<?php if ($error): ?><p style="color:red;"><?= $error ?></p><?php endif; ?>

</body>

</html>