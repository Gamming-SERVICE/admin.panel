<?php
require "config.php";
require_admin();

$totalUsers = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
$totalSubs  = $pdo->query("SELECT COUNT(*) FROM subdomains")->fetchColumn();
$banned     = $pdo->query("SELECT COUNT(*) FROM users WHERE status='banned'")->fetchColumn();
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "nav.php"; ?>

<h1>Dashboard</h1>

<div class="grid">
  <div class="box">Users<br><b><?= $totalUsers ?></b></div>
  <div class="box">Subdomains<br><b><?= $totalSubs ?></b></div>
  <div class="box">Banned<br><b><?= $banned ?></b></div>
</div>

</body>
</html>
