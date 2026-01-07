<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

$index = $_GET['index'] ?? null;
$file = 'data/agenda.json';
$agenda = json_decode(file_get_contents($file), true) ?? [];

if ($index === null || !isset($agenda[$index])) {
    die('Agenda tidak ditemukan!');
}

// Hapus item agenda berdasarkan index
array_splice($agenda, $index, 1);

// Simpan perubahan
file_put_contents($file, json_encode($agenda, JSON_PRETTY_PRINT));

header('Location: admin.php');
exit;
?>