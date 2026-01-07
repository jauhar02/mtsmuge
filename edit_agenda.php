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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $agenda[$index]['title'] = $_POST['title'] ?? $agenda[$index]['title'];
    $agenda[$index]['description'] = $_POST['description'] ?? $agenda[$index]['description'];
    $agenda[$index]['day'] = $_POST['day'] ?? $agenda[$index]['day'];
    $agenda[$index]['month'] = $_POST['month'] ?? $agenda[$index]['month'];
    $agenda[$index]['time'] = $_POST['time'] ?? $agenda[$index]['time'];
    $agenda[$index]['location'] = $_POST['location'] ?? $agenda[$index]['location'];
    
    // Simpan perubahan ke file JSON
    file_put_contents($file, json_encode($agenda, JSON_PRETTY_PRINT));
    header('Location: admin.php');
    exit;
}

$item = $agenda[$index];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Agenda</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="container">
        <h2>Edit Agenda</h2>
        <form method="POST" >
            <div class="form-group">
                <label>Judul</label>
                <input type="text" name="title" required value="<?php echo htmlspecialchars($item['title']); ?>">
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="description" required><?php echo htmlspecialchars($item['description']); ?></textarea>
            </div>
            <div class="form-group">
                <label>Hari (contoh: 5)</label>
                <input type="text" name="day" required value="<?php echo htmlspecialchars($item['day']); ?>">
            </div>
            <div class="form-group">
                <label>Bulan (contoh: Jan)</label>
                <input type="text" name="month" required value="<?php echo htmlspecialchars($item['month']); ?>">
            </div>
            <div class="form-group">
                <label>Waktu (contoh: 07:00 WIB)</label>
                <input type="text" name="time" required value="<?php echo htmlspecialchars($item['time']); ?>">
            </div>
            <div class="form-group">
                <label>Lokasi</label>
                <input type="text" name="location" required value="<?php echo htmlspecialchars($item['location']); ?>">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="admin.php" class="btn btn-outline">Batal</a>
        </form>
    </div>
</body>
</html>