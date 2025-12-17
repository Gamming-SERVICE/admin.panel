<?php
require "config.php";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $u = $_POST["username"] ?? "";
    $p = $_POST["password"] ?? "";

    if (isset($ADMINS[$u]) && $ADMINS[$u] === $p) {
        $_SESSION["admin"] = $u;
        header("Location: dashboard.php");
        exit;
    } else {
        $error = "Invalid admin credentials";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<link rel="stylesheet" href="style.css">
</head>
<body class="center">
<form method="post" class="card">
<h2>INTENT Admin</h2>
<input name="username" placeholder="Username" required>
<input name="password" type="password" placeholder="Password" required>
<button>Login</button>
<p class="error"><?= htmlspecialchars($error) ?></p>
</form>
</body>
</html>
