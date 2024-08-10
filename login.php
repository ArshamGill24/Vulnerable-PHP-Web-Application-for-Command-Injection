<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Array of hard-coded credentials
    $users = [
        'admin' => 'password',
        'user1' => 'pass123',
        'user2' => 'securepassword',
        'user3' => 'mypassword',
    ];

    // Check if the provided username exists and the password matches
    if (isset($users[$username]) && $users[$username] === $password) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username; // Store the username in the session
        header('Location: system_details.php');
        exit();
    } else {
        $error = "Invalid credentials!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 300px; margin: 0 auto; padding-top: 100px; }
        .error { color: red; }
    </style>
</head>
<body>
<div class="container">
    <h2>Login</h2>
    <form method="post" action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
    <?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
</div>
</body>
</html>
