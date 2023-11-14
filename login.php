<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Connect to the database
    $db = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'toms', 'root');

    // Prepare the SQL statement
    $stmt = $db->prepare('SELECT * FROM users WHERE username = ?');

    // Execute the statement with the username
    $stmt->execute([$_POST['username']]);

    // Fetch the user
    $user = $stmt->fetch();

    // Check if the user exists and the password is correct
    if ($user && password_verify($_POST['password'], $user['password'])) {
        // Set the username session variable
        $_SESSION['username'] = $user['username'];

        // Redirect to the create page
        header('Location: create.php');
        exit;
    } else {
        // Invalid username or password
        echo 'Invalid username or password.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login</title>
    <style>
        body {
            background-color: #f0f0f0;
            font-family: Arial, sans-serif;
        }
        form {
            width: 300px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-top: 20px;
        }
        input {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007BFF;
            color: white;
            border: none;
            margin-top: 20px;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Login</h1>
    <form action="login.php" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username">
        <label for="password">Password</label>
        <input type="password" id="password" name="password">
        <button type="submit">Login</button>
    </form>
</body>
</html>