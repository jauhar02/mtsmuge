<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

$index = $_GET['index'] ?? null;
$file = 'data/gallery.json';
$gallery = json_decode(file_get_contents($file), true) ?? [];

if ($index === null || !isset($gallery[$index])) {
    die('Data gallery tidak ditemukan!');
}

// Hapus gambar dari folder jika ada file dan memang ada
if (isset($gallery[$index]['image']) && file_exists($gallery[$index]['image'])) {
    unlink($gallery[$index]['image']);
}

// Hapus data dari array
array_splice($gallery, $index, 1);

// Simpan kembali data ke file JSON
file_put_contents($file, json_encode($gallery, JSON_PRETTY_PRINT));

header('Location: admin.php');
exit;
?>