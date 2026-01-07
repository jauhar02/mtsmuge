<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($username == 'adminmuge' && $password == 'mtsmuge1992') { // Ganti dengan database nanti
        $_SESSION['admin'] = true;
        header('Location: admin.php');
        exit;
    } else {
        $error = 'Username atau password salah';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website Resmi MTS Manba'ul Ulum - Pendidikan Berbasis Islam dengan Fasilitas Lengkap.">
    <meta name="keywords" content="MTS Manba'ul Ulum, pendidikan Islam, SMP, Kudus, PPDB">
    <meta name="author" content="MTS Manba'ul Ulum">
    <title>Login Admin - MTS Manba'ul Ulum</title>
    <link rel="icon" href="logo.jpg" type="image/png">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
        <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <a href="#home" class="nav-logo">
                <i class="fas fa-school"></i>
                MTS Manba'ul Ulum
            </a>
            <button class="nav-toggle" id="navToggle">
                <i class="fas fa-bars"></i>
            </button>
            <ul class="nav-menu" id="navMenu">
                <li><a href="#home" class="nav-link">Home</a></li>
                <li class="nav-item-dropdown">
                    <a href="#" class="nav-link dropdown-toggle">
                        Profil <i class="fas fa-chevron-down"></i>
                    </a>
                    <ul class="nav-dropdown">
                        <li><a href="#profil" class="dropdown-item">Tentang Kami</a></li>
                        <li><a href="#sejarah" class="dropdown-item">Sejarah</a></li>
                        <li><a href="#visi-misi" class="dropdown-item">Visi & Misi</a></li>
                        <li><a href="#hubungi" class="dropdown-item">Hubungi Kami</a></li>
                    </ul>
                </li>
                <li class="nav-item-dropdown">
                    <a href="#" class="nav-link dropdown-toggle">
                        Informasi <i class="fas fa-chevron-down"></i>
                    </a>
                    <ul class="nav-dropdown">
                        <li><a href="#berita" class="dropdown-item">Berita</a></li>
                        <li><a href="#agenda" class="dropdown-item">Agenda</a></li>
                        <li><a href="#faq" class="dropdown-item">FAQ</a></li>
                    </ul>
                </li>
                <li><a href="#prestasi" class="nav-link">Prestasi</a></li>
                <li><a href="#gallery" class="nav-link">Gallery</a></li>
                <li><a href="#ppdb" class="nav-link btn-ppdb">PPDB</a></li>
                <li><a href="index.php" class="nav-link">Publik</a></li>
            </ul>
        </div>
    </nav>

    <div class="container" style="max-width: 400px; margin: 100px auto;">
        <h2>Login Admin</h2>
        <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
        <form method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
        <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-item">
                    <div class="footer-logo">
                        <i class="fas fa-school"></i>
                        <span>MTS Manba'ul Ulum</span>
                    </div>
                    <p>Mencetak generasi berprestasi dengan akhlak mulia melalui pendidikan berkualitas berbasis teknologi dan nilai-nilai Islam.</p>
                </div>
                <div class="footer-item">
                    <h4>Link Cepat</h4>
                    <ul>
                        <li><a href="#home">Home</a></li>
                        <li><a href="#profil">Profil</a></li>
                        <li><a href="#berita">Berita</a></li>
                        <li><a href="#ppdb">PPDB</a></li>
                    </ul>
                </div>
                <div class="footer-item">
                    <h4>Informasi</h4>
                    <ul>
                        <li><a href="#visi-misi">Visi & Misi</a></li>
                        <li><a href="#prestasi">Prestasi</a></li>
                        <li><a href="#gallery">Gallery</a></li>
                        <li><a href="#hubungi">Hubungi Kami</a></li>
                    </ul>
                </div>
                <div class="footer-item">
                    <h4>Jam Operasional</h4>
                    <ul>
                        <li>Senin - Kamis: 07:00 - 13:30</li>
                        <li>Jumat: 07:00 - 11:15</li>
                        <li>Sabtu: 07:00 - 13:30</li>
                        <li>Minggu: Tutup</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 MTS Manba'ul Ulum. All rights reserved.</p>
                <p>Designed with <i class="fas fa-heart"></i> by MTS Manba'ul Ulum</p>
            </div>
        </div>
    </footer>
    
    <script src="script.js"></script>
</body>
</html>