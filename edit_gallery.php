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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $gallery[$index]['title'] = $_POST['title'] ?? $gallery[$index]['title'];
    $gallery[$index]['description'] = $_POST['description'] ?? $gallery[$index]['description'];
    $gallery[$index]['category'] = $_POST['category'] ?? $gallery[$index]['category'];
    
    // Jika upload gambar baru ada
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);
        $gallery[$index]['image'] = $uploadFile;
    }
    
    file_put_contents($file, json_encode($gallery, JSON_PRETTY_PRINT));
    header('Location: admin.php');
    exit;
}

$item = $gallery[$index];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Gallery</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="container">
        <h2>Edit Gallery</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Judul</label>
                <input type="text" name="title" required value="<?php echo htmlspecialchars($item['title']); ?>">
            </div>
            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="description" required><?php echo htmlspecialchars($item['description']); ?></textarea>
            </div>
            <div class="form-group">
                <label>Kategori</label>
                <select name="category">
                    <option value="kegiatan" <?php echo ($item['category'] == 'kegiatan') ? 'selected' : ''; ?>>Kegiatan</option>
                    <option value="fasilitas" <?php echo ($item['category'] == 'fasilitas') ? 'selected' : ''; ?>>Fasilitas</option>
                    <option value="prestasi" <?php echo ($item['category'] == 'prestasi') ? 'selected' : ''; ?>>Prestasi</option>
                </select>
            </div>
            <div class="form-group">
                <label>Gambar Saat Ini</label><br>
                <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="Gambar Gallery" style="max-width:200px;">
            </div>
            <div class="form-group">
                <label>Ganti Gambar</label>
                <input type="file" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="admin.php" class="btn btn-outline">Batal</a>
        </form>
    </div>
</body>
</html>