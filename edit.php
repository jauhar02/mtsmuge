<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $section = $_POST['section'];
    $file = "data/$section.json";
    
    // Load data lama
    $data = json_decode(file_get_contents($file), true) ?? [];
    
    // Contoh sederhana: Update item pertama (sesuaikan berdasarkan ID jika perlu)
    if (isset($_POST['title'])) {
        $data[0]['title'] = $_POST['title'];
        $data[0]['content'] = $_POST['content'] ?? '';
        // Tambahkan field lain sesuai section
    }
    
    // Simpan kembali
    file_put_contents($file, json_encode($data));
    header('Location: admin.php');
    exit;
}
?>