<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

$index = $_GET['index'] ?? null;
$file = 'data/berita.json';
$berita = json_decode(file_get_contents($file), true) ?? [];

if ($index === null || !isset($berita[$index])) {
    die('Berita tidak ditemukan!');
}

// Hapus file gambar jika ada dan file benar-benar ada agar tidak error
if (isset($berita[$index]['image']) && file_exists($berita[$index]['image'])) {
    unlink($berita[$index]['image']);
}

// Hapus data berita
array_splice($berita, $index, 1);

// Simpan kembali data
file_put_contents($file, json_encode($berita, JSON_PRETTY_PRINT));

header('Location: admin.php#berita');
exit;
?>