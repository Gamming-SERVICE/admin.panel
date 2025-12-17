<?php
// config.php

session_start();

/* ===== DATABASE ===== */
$DB_HOST = "127.0.0.1";
$DB_NAME = "intent_backend";
$DB_USER = "intent_backend_user";
$DB_PASS = "VeryStrong_DB_Password_123!";

try {
    $pdo = new PDO(
        "pgsql:host=$DB_HOST;dbname=$DB_NAME",
        $DB_USER,
        $DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );
} catch (Exception $e) {
    die("Database connection failed");
}

/* ===== ADMIN ACCOUNTS (HARD CODED) ===== */
$ADMINS = [
    "zs.org" => "zsthelord@org",
    "sreervaj" => "Sreervaj@2007"
];

/* ===== AUTH CHECK ===== */
function require_admin() {
    if (!isset($_SESSION['admin'])) {
        header("Location: login.php");
        exit;
    }
}
