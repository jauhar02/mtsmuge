<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('Location: login.php');
    exit;
}
$type = $_GET['type'] ?? 'berita';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $file = "data/$type.json";
    $data = json_decode(file_get_contents($file), true) ?? [];
    
    // Tentukan field berdasarkan type
    if ($type == 'berita') {
        $newItem = [
            'title' => $_POST['title'] ?? '',
            'excerpt' => $_POST['excerpt'] ?? '',
            'date' => $_POST['date'] ?? date('d F Y'), // Default hari ini jika kosong
            'category' => $_POST['category'] ?? 'Umum',
            'image' => 'uploads/' . basename($_FILES['image']['name']),
            'content' => $_POST['content'] ?? ''
        ];
    } elseif ($type == 'agenda') {
        $newItem = [
            'title' => $_POST['title'] ?? '',
            'description' => $_POST['description'] ?? '',
            'day' => $_POST['day'] ?? '',
            'month' => $_POST['month'] ?? '',
            'time' => $_POST['time'] ?? '',
            'location' => $_POST['location'] ?? '',
            'image' => isset($_FILES['image']) ? 'uploads/' . basename($_FILES['image']['name']) : ''
        ];
    } elseif ($type == 'gallery') {
        $newItem = [
            'title' => $_POST['title'] ?? '',
            'description' => $_POST['description'] ?? '',
            'category' => $_POST['category'] ?? 'kegiatan',
            'image' => 'uploads/' . basename($_FILES['image']['name'])
        ];
    } elseif ($type == 'prestasi') {
        $newItem = [
            'year' => $_POST['year'] ?? '',
            'title' => $_POST['title'] ?? '',
            'name' => $_POST['name'] ?? '',
            'type' => $_POST['type'] ?? 'akademik', // akademik atau non-akademik
            'image' => isset($_FILES['image']) ? 'uploads/' . basename($_FILES['image']['name']) : ''
        ];
    }
    
    // Upload gambar jika ada
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $uploadDir = "uploads/";
    $uploadFile = $uploadDir . basename($_FILES['image']['name']);
    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
        $newItem['image'] = $uploadFile; // Simpan path relatif ini
    } else {
        // Tangani error gagal upload
    }
}
    
    // Simpan data
    $data[] = $newItem;
    file_put_contents($file, json_encode($data, JSON_PRETTY_PRINT));
    header('Location: admin.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload <?php echo ucfirst($type); ?> - Admin</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2>Upload <?php echo ucfirst($type); ?></h2>
        <form method="POST" enctype="multipart/form-data">
            <?php if ($type == 'berita'): ?>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" required>
                </div>
                <div class="form-group">
                    <label>Excerpt (Ringkasan)</label>
                    <textarea name="excerpt" required></textarea>
                </div>
                <div class="form-group">
                    <label>Date (contoh: 15 Januari 2025)</label>
                    <input type="text" name="date" required>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category">
                        <option value="Akademik">Akademik</option>
                        <option value="PPDB">PPDB</option>
                        <option value="Kegiatan">Kegiatan</option>
                        <option value="Umum">Umum</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Content (Isi Lengkap)</label>
                    <textarea name="content"></textarea>
                </div>
            <?php elseif ($type == 'agenda'): ?>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label>Day (contoh: 5)</label>
                    <input type="text" name="day" required>
                </div>
                <div class="form-group">
                    <label>Month (contoh: Jan)</label>
                    <input type="text" name="month" required>
                </div>
                <div class="form-group">
                    <label>Time (contoh: 07:00 WIB)</label>
                    <input type="text" name="time" required>
                </div>
                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" required>
                </div>
                <div class="form-group">
                    <label>Image (Opsional)</label>
                    <input type="file" name="image">
                </div>
            <?php elseif ($type == 'gallery'): ?>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="description" required></textarea>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select name="category">
                        <option value="kegiatan">Kegiatan</option>
                        <option value="fasilitas">Fasilitas</option>
                        <option value="prestasi">Prestasi</option>
                    </select>
                </div>
            <?php elseif ($type == 'prestasi'): ?>
                <div class="form-group">
                    <label>Year</label>
                    <input type="text" name="year" required>
                </div>
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" required>
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <select name="type">
                        <option value="akademik">Akademik</option>
                        <option value="non-akademik">Non-Akademik</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Image (Opsional)</label>
                    <input type="file" name="image">
                </div>
            <?php endif; ?>
            <div class="form-group">
                <label>Image (Wajib untuk Berita dan Gallery)</label>
                <input type="file" name="image" <?php echo ($type == 'berita' || $type == 'gallery') ? 'required' : ''; ?>>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
            <a href="admin.php" class="btn btn-outline">Kembali ke Admin</a>
        </form>
    </div>
</body>
</html>