<?php
require "config.php";
require_admin();

if (isset($_GET["ban"])) {
    $id = (int)$_GET["ban"];
    $pdo->prepare("UPDATE users SET status='banned' WHERE id=?")->execute([$id]);
}

if (isset($_GET["delete"])) {
    $id = (int)$_GET["delete"];
    $pdo->prepare("DELETE FROM users WHERE id=?")->execute([$id]);
}

$users = $pdo->query("SELECT * FROM users ORDER BY id DESC")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
<title>Users</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "nav.php"; ?>

<h1>Users</h1>

<table>
<tr><th>ID</th><th>User</th><th>Email</th><th>IP</th><th>Status</th><th>Action</th></tr>
<?php foreach ($users as $u): ?>
<tr>
<td><?= $u["id"] ?></td>
<td><?= htmlspecialchars($u["username"]) ?></td>
<td><?= htmlspecialchars($u["email"]) ?></td>
<td><?= $u["ip_address"] ?></td>
<td><?= $u["status"] ?></td>
<td>
<a href="?ban=<?= $u["id"] ?>">Ban</a> |
<a href="?delete=<?= $u["id"] ?>" onclick="return confirm('Delete user?')">Delete</a>
</td>
</tr>
<?php endforeach; ?>
</table>

</body>
</html>
