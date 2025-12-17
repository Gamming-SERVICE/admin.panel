<?php
require "config.php";
require_admin();

if (isset($_GET["delete"])) {
    $name = $_GET["delete"];
    $pdo->prepare("DELETE FROM subdomains WHERE name=?")->execute([$name]);
}

$subs = $pdo->query("
SELECT s.*, u.username 
FROM subdomains s 
LEFT JOIN users u ON u.id=s.user_id
ORDER BY s.created_at DESC
")->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
<title>Subdomains</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "nav.php"; ?>

<h1>Subdomains</h1>

<table>
<tr><th>Name</th><th>Owner</th><th>NS</th><th>Status</th><th>Action</th></tr>
<?php foreach ($subs as $s): ?>
<tr>
<td><?= htmlspecialchars($s["name"]) ?>.int.yt</td>
<td><?= htmlspecialchars($s["username"]) ?></td>
<td><?= htmlspecialchars($s["ns"]) ?></td>
<td><?= $s["status"] ?></td>
<td>
<a href="?delete=<?= $s["name"] ?>" onclick="return confirm('Delete subdomain?')">Delete</a>
</td>
</tr>
<?php endforeach; ?>
</table>

</body>
</html>
