<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Simpan ke file JSON atau database
    $data = [
        'nama' => $_POST['nama'],
        'jenis_kelamin' => $_POST['jenis_kelamin'],
        // Tambahkan semua field
    ];
    $ppdbData = json_decode(file_get_contents('data/ppdb.json'), true) ?? [];
    $ppdbData[] = $data;
    file_put_contents('data/ppdb.json', json_encode($ppdbData));
    echo "Pendaftaran berhasil!";
}
?>