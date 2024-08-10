<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target = $_POST['target']; // Directly using the user input without escaping
    $output = shell_exec("ping -c 4 $target 2>&1"); // Redirecting errors to output
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ping a Host</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 800px; margin: 0 auto; padding-top: 50px; }
        .output { background-color: #f4f4f4; padding: 10px; }
    </style>
</head>
<body>
<div class="container">
    <h2>Ping a Host</h2>
    <form method="post" action="">
        <label for="target">Target IP/Hostname:</label><br>
        <input type="text" id="target" name="target" required><br><br>
        <input type="submit" value="Ping">
    </form>
    <?php if (isset($output)) { echo "<pre class='output'>$output</pre>"; } ?>
    <a href="system_details.php">Back to System Details</a><br><br>
    <a href="logout.php">Logout</a>
</div>
</body>
</html>
