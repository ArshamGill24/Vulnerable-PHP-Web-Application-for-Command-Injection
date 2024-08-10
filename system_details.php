<?php
session_start();
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit();
}

$system_info = shell_exec('uname -a');
$memory_info = shell_exec('free -h');
$disk_info = shell_exec('df -h');
$process_info = shell_exec('ps aux | head -10'); // Displaying top 10 processes for simplicity

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>System Details</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 800px; margin: 0 auto; padding-top: 50px; }
        pre { background-color: #f4f4f4; padding: 10px; }
        .section { margin-bottom: 20px; }
        .nav { margin-bottom: 20px; }
    </style>
</head>
<body>
<div class="container">
    <div class="nav">
        <a href="ping.php">Ping a Host</a> | <a href="logout.php">Logout</a>
    </div>
    <h2>System Details</h2>
    <div class="section">
        <h3>System Info</h3>
        <pre><?php echo $system_info; ?></pre>
    </div>
    <div class="section">
        <h3>Memory Info</h3>
        <pre><?php echo $memory_info; ?></pre>
    </div>
    <div class="section">
        <h3>Disk Info</h3>
        <pre><?php echo $disk_info; ?></pre>
    </div>
    <div class="section">
        <h3>Top Processes</h3>
        <pre><?php echo $process_info; ?></pre>
    </div>
</div>
</body>
</html>
