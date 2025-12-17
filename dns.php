<?php
require "config.php";
require_admin();
?>
<!DOCTYPE html>
<html>
<head>
<title>DNS</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php include "nav.php"; ?>

<h1>DNS Management</h1>
<p>
DNS records are managed via PowerDNS API / dnsedit.py.<br>
This panel is intentionally read-only for safety.
</p>

</body>
</html>
