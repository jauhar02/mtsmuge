<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}

$index = $_GET['index'] ?? null;
$file = 'data/berita.json';

// Load data berita
$berita = json_decode(file_get_contents($file), true) ?? [];

if ($index === null || !isset($berita[$index])) {
    die('Berita tidak ditemukan!');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Update data berita dari form
    $berita[$index]['title'] = $_POST['title'] ?? $berita[$index]['title'];
    $berita[$index]['excerpt'] = $_POST['excerpt'] ?? $berita[$index]['excerpt'];
    $berita[$index]['date'] = $_POST['date'] ?? $berita[$index]['date'];
    $berita[$index]['category'] = $_POST['category'] ?? $berita[$index]['category'];
    $berita[$index]['content'] = $_POST['content'] ?? $berita[$index]['content'];
    
    // Jika upload gambar baru
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile);
        $berita[$index]['image'] = $uploadFile;
    }
    
    // Simpan file JSON
    file_put_contents($file, json_encode($berita, JSON_PRETTY_PRINT));
    header('Location: admin.php');
    exit;
}

$item = $berita[$index];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Berita</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Berita</h2>
        <form method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>Title</label>
                <input type="text" name="title" required value="<?php echo htmlspecialchars($item['title']); ?>">
            </div>
            <div class="form-group">
                <label>Excerpt (Ringkasan)</label>
                <textarea name="excerpt" required><?php echo htmlspecialchars($item['excerpt']); ?></textarea>
            </div>
            <div class="form-group">
                <label>Date</label>
                <input type="text" name="date" required value="<?php echo htmlspecialchars($item['date']); ?>">
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="category">
                    <option value="Akademik" <?php echo $item['category'] == 'Akademik' ? 'selected' : ''; ?>>Akademik</option>
                    <option value="PPDB" <?php echo $item['category'] == 'PPDB' ? 'selected' : ''; ?>>PPDB</option>
                    <option value="Kegiatan" <?php echo $item['category'] == 'Kegiatan' ? 'selected' : ''; ?>>Kegiatan</option>
                    <option value="Umum" <?php echo $item['category'] == 'Umum' ? 'selected' : ''; ?>>Umum</option>
                </select>
            </div>
            <div class="form-group">
                <label>Content (Isi Lengkap)</label>
                <textarea name="content"><?php echo htmlspecialchars($item['content']); ?></textarea>
            </div>
            <div class="form-group">
                <label>Gambar Saat Ini</label><br>
                <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="Gambar Berita" style="max-width:200px;">
            </div>
            <div class="form-group">
                <label>Ganti Gambar (opsional)</label>
                <input type="file" name="image">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="admin.php#berita" class="btn btn-outline">Batal</a>
        </form>
    </div>
</body>
</html>