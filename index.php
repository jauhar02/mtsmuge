<?php
session_start();
// Load data dinamis dari file JSON (contoh untuk berita, agenda, gallery, prestasi)
$berita = json_decode(file_get_contents('data/berita.json'), true) ?? [];
$agenda = json_decode(file_get_contents('data/agenda.json'), true) ?? [];
$gallery = json_decode(file_get_contents('data/gallery.json'), true) ?? [];
$prestasi = json_decode(file_get_contents('data/prestasi.json'), true) ?? [];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website Resmi MTS Manba'ul Ulum - Pendidikan Berbasis Islam dengan Fasilitas Lengkap.">
    <meta name="keywords" content="MTS Manba'ul Ulum, pendidikan Islam, SMP, Kudus, PPDB">
    <meta name="author" content="MTS Manba'ul Ulum">
    <title>MTS Manba'ul Ulum - Website Resmi</title>
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
                <li><a href="login.php" class="nav-link">admin</a></li>
            </ul>
        </div>
    </nav>

    <!-- Home Section -->
    <section id="home" class="hero">
        <div class="hero-overlay"></div>
        <div class="hero-content">
            <h1 class="hero-title">MTS Manba'ul Ulum</h1>
            <p class="hero-subtitle">Mencetak Generasi Berprestasi dengan Akhlak Mulia</p>
            <p class="hero-description">Terakreditasi A | Lingkungan Islami | Fasilitas Lengkap</p>
            <div class="hero-buttons">
                <a href="#ppdb" class="btn btn-primary">Daftar Sekarang</a>
                <a href="#profil" class="btn btn-outline">Pelajari Lebih Lanjut</a>
            </div>
        </div>
        <div class="hero-stats">
            <div class="stat-item">
                <i class="fas fa-user-graduate"></i>
                <span class="stat-number" data-count="205">0</span>
                <span class="stat-label">Siswa</span>
            </div>
            <div class="stat-item">
                <i class="fas fa-chalkboard-teacher"></i>
                <span class="stat-number" data-count="17">0</span>
                <span class="stat-label">Guru</span>
            </div>
            <div class="stat-item">
                <i class="fas fa-trophy"></i>
                <span class="stat-number" data-count="100">0</span>
                <span class="stat-label">Prestasi</span>
            </div>
            <div class="stat-item">
                <i class="fas fa-calendar-alt"></i>
                <span class="stat-number" data-count="33">0</span>
                <span class="stat-label">Tahun</span>
            </div>
        </div>
    </section>

    <!-- Profil Section -->
    <section id="profil" class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Tentang Kami</h2>
                <p class="section-subtitle">Kenali MTS Manba'ul Ulum Lebih Dekat</p>
            </div>
            <div class="about-grid">
                <div class="about-image">
                    <img src="logo.jpg" alt="Gedung MTS Manba'ul Ulum">
                    <div class="about-experience">
                        <span class="exp-number">33</span>
                        <span class="exp-text">Tahun Pengalaman</span>
                    </div>
                </div>
                <div class="about-content">
                    <h3>Selamat Datang di <br>MTS Manba'ul Ulum Gebog Kudus</h3>
                    <p>MTSS Manbaul Ulum Kudus adalah Madrasah Tsanawiyah (setara SMP) yang berlokasi di Jl. Gebog-Nalumsari No. 42, Desa Gondosari, Kecamatan Gebog, Kabupaten Kudus, Jawa Tengah, dengan NPSN 20364160, dikenal karena pendidikan berbasis Islam dan menjadi bagian dari sistem pendidikan nasional. Madrasah ini memiliki sejarah dan pengembangan kurikulum yang memperhatikan karakteristik siswa serta perkembangan IPTEK, dengan peran aktif guru dan hubungan baik dengan masyarakat.</p>
                    <p>Kami memiliki fasilitas lengkap meliputi laboratorium komputer, perpustakaan modern, kendaraan sekolah, dan lapangan olahraga yang mendukung proses pembelajaran optimal.</p>
                    <div class="about-features">
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Terakreditasi A</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Guru Berkualitas</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Fasilitas Modern</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Lingkungan Islami</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sejarah Section -->
    <section id="sejarah" class="section bg-light">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Sejarah Sekolah</h2>
                <p class="section-subtitle">Perjalanan MTS Manba'ul Ulum</p>
            </div>
            <div class="timeline">
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">1992</span>
                        <h4>Pendirian Sekolah</h4>
                        <p>MTS Manba'ul Ulum resmiDidirikan untuk menampung lulusan Madrasah Ibtidaiyah (MI) di sekitar wilayah Gondosari yang belum memiliki jenjang Tsanawiyah, serta memenuhi kebutuhan pendidikan agama dan umum bagi masyarakat.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2013</span>
                        <h4>Perluasan Fasilitas</h4>
                        <p>Sekolah ini mulai berkembang dengan adanya sarana prasarana dan kurikulum yang terus diperbarui, termasuk penerapan Kurikulum 2013, fokus pada pengembangan potensi siswa, dan pengembangan struktur organisasi yang solid.</p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2023</span>
                        <h4>Akreditasi A</h4>
                        <p>MTSS Manbaul Ulum Kudus (NPSN 20364160) terakreditasi, dengan peringkat terbaru A (Sangat Baik) berdasarkan SK BAN-S/M Nomor 1172/BAN-SM/SK/2023 tertanggal 20 November 2023, berlaku hingga tahun 2028, dengan alamat di Jl. Gebog-Nalumsari No. 42, Gondosari, Kudus. </p>
                    </div>
                </div>
                <div class="timeline-item">
                    <div class="timeline-dot"></div>
                    <div class="timeline-content">
                        <span class="timeline-year">2024</span>
                        <h4>Digitalisasi Pembelajaran</h4>
                        <p>Implementasi sistem pembelajaran digital dan pengembangan infrastruktur teknologi.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Visi Misi Section -->
    <section id="visi-misi" class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Visi dan Misi</h2>
                <p class="section-subtitle">Landasan Kami dalam Pendidikan</p>
            </div>
            <div class="vm-container">
                <div class="vm-card vision">
                    <div class="vm-icon">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3>Visi</h3>
                    <p>"Menjadi sekolah menengah pertama yang unggul dalam prestasi, berkarakter Islami, dan siap menghadapi tantangan akademik."</p>
                </div>
                <div class="vm-card mission">
                    <div class="vm-icon">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3>Misi</h3>
                    <ul>
                        <li>Menyediakan pendidikan berkualitas berbasis teknologi dan nilai-nilai Islam</li>
                        <li>Mengembangkan potensi siswa secara optimal melalui pembelajaran aktif dan kreatif</li>
                        <li>Membentuk karakter Islami yang santun, jujur, dan bertanggung jawab</li>
                        <li>Meningkatkan prestasi akademik dan non-akademik secara berkelanjutan</li>
                        <li>Membangun kerja sama dengan orang tua dan masyarakat</li>
                    </ul>
                </div>
            </div>
            <div class="vm-values">
                <h3>Nilai-Nilai Sekolah</h3>
                <div class="values-grid">
                    <div class="value-item">
                        <i class="fas fa-star-and-crescent"></i>
                        <h4>Keislaman</h4>
                        <p>Landasan utama dalam setiap kegiatan</p>
                    </div>
                    <div class="value-item">
                        <i class="fas fa-graduation-cap"></i>
                        <h4>Keilmuan</h4>
                        <p>Berpengetahuan luas dan berpikir kritis</p>
                    </div>
                    <div class="value-item">
                        <i class="fas fa-handshake"></i>
                        <h4>Kedisiplinan</h4>
                        <p>Tepat waktu dan konsisten</p>
                    </div>
                    <div class="value-item">
                        <i class="fas fa-heart"></i>
                        <h4>Kebersamaan</h4>
                        <p>Saling menghormati dan bekerja sama</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hubungi Kami Section -->
    <section id="hubungi" class="section bg-dark">
        <div class="container">
            <div class="section-header light">
                <h2 class="section-title">Hubungi Kami</h2>
                <p class="section-subtitle">Kami Siap Membantu Anda</p>
            </div>
            <div class="contact-container">
                <div class="contact-info">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h4>Alamat</h4>
                            <p>Jl. Raya Nalumsari No.42, Tulis, Gondosari, Kec. Gebog, Kabupaten Kudus, Jawa Tengah 59333</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-phone-alt"></i>
                        </div>
                        <div class="contact-text">
                            <h4>Telepon</h4>
                            <p>(0291)433107</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="contact-text">
                            <h4>Email</h4>
                            <p>mts_manbaululum_gebog@yahoo.co.id</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div class="contact-text">
                            <a href="https://wa.me/+6285878833834" target="_blank">
                            <h4 class="whatsapp-link">WhatsApp 1</h4>
                            </a>
                            <p>Pak Milad 085878833834</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div class="contact-text">
                            <a href="https://wa.me/+6282324637699" target="_blank">
                            <h4 class="whatsapp-link">WhatsApp 2</h4>
                            </a>
                            <p>Ibu Hj. Ratna 082324637699</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div class="contact-text">
                            <a href="https://wa.me/+628562706625" target="_blank">
                            <h4 class="whatsapp-link">WhatsApp 3</h4>
                            </a>
                            <p>Pak Choi 08562706625 </p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div class="contact-text">
                            <a href="https://wa.me/+6289652482667" target="_blank">
                            <h4 class="whatsapp-link">WhatsApp 4</h4>
                            </a>
                            <p>Ibu Herni 089652482667</p>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-icon">
                            <i class="fab fa-whatsapp"></i>
                        </div>
                        <div class="contact-text">
                            <a href="https://wa.me/+6285741734199" target="_blank">
                            <h4 class="whatsapp-link">WhatsApp 5</h4>
                            </a>
                            <p>Ibu Khosyiah 085741734199</p>
                        </div>
                    </div>
                    <div class="social-media">
                        <a href="https://www.facebook.com/share/1F39aMr4oG/" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/mts.manbaululum_gebog/" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="https://youtube.com/@mts.manbaululum_gebog?si=EBwEj-n7aYfIAiNn" class="social-link"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="contact-form-container">
                    <form id="contactForm" class="contact-form">
                        <div class="form-group">
                            <label for="contactName">Nama Lengkap</label>
                            <input type="text" id="contactName" name="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="contactEmail">Email</label>
                            <input type="email" id="contactEmail" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="contactSubject">Subjek</label>
                            <select id="contactSubject" name="subjek">
                                <option value="informasi">Informasi Umum</option>
                                <option value="ppdb">PPDB</option>
                                <option value="keluhan">Keluhan/Saran</option>
                                <option value="kerjasama">Kerjasama</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="contactMessage">Pesan</label>
                            <textarea id="contactMessage" name="pesan" rows="5" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Kirim Pesan</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Berita Section -->
    <section id="berita" class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Berita Terbaru</h2>
                <p class="section-subtitle">Informasi Terkini dari MTS Manba'ul Ulum</p>
            </div>
            <div class="news-grid">
                <?php foreach ($berita as $index => $item): ?>
                    <article class="news-card">
                        <div class="news-image">
                            <img src="<?php echo htmlspecialchars($item['image'] ?? 'uploads/placeholder.png'); ?>" alt="<?php echo htmlspecialchars($item['title'] ?? '-'); ?>">
                            <span class="news-category"><?php echo htmlspecialchars($item['category'] ?? 'Umum'); ?></span>
                        </div>
                        <div class="news-content">
                            <span class="news-date"><i class="far fa-calendar"></i> <?php echo htmlspecialchars($item['date'] ?? '-'); ?></span>
                            <h3><?php echo htmlspecialchars($item['title'] ?? '-'); ?></h3>
                            <p><?php echo htmlspecialchars($item['excerpt'] ?? '-'); ?></p>
                            <a href="#berita" class="news-link">Baca Selengkapnya <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
            <div class="text-center">
                <a href="#berita" class="btn btn-outline">Lihat Semua Berita</a>
            </div>
        </div>
    </section>

    <!-- Agenda Section -->
    <section id="agenda" class="section bg-light">
    <div class="container">
        <div class="section-header">
        <h2 class="section-title">Agenda Kegiatan</h2>
        <p class="section-subtitle">Jadwal Kegiatan Sekolah</p>
        </div>
        <div class="agenda-container">
        <?php foreach ($agenda as $item): ?>
            <div class="agenda-item">
            <div class="agenda-date">
                <span class="date-day"><?php echo htmlspecialchars($item['day']); ?></span>
                <span class="date-month"><?php echo htmlspecialchars($item['month']); ?></span>
            </div>
            <div class="agenda-content">
                <h4><?php echo htmlspecialchars($item['title']); ?></h4>
                <p><?php echo htmlspecialchars($item['description']); ?></p>
                <span class="agenda-time"><i class="far fa-clock"></i> <?php echo htmlspecialchars($item['time']); ?></span>
                <span class="agenda-location"><i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($item['location']); ?></span>
            </div>
            </div>
        <?php endforeach; ?>
        </div>
    </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Frequently Asked Questions</h2>
                <p class="section-subtitle">Pertanyaan yang Sering Diajukan</p>
            </div>
            <div class="faq-container">
                <div class="faq-item">
                    <button class="faq-question">
                        <span>Bagaimana cara mendaftar di MTS Manba'ul Ulum?</span>
                        <i class="fas fa-plus"></i>
                    </button>
                    <div class="faq-answer">
                        <p>Pendaftaran dapat dilakukan secara online melalui website resmi kami di menu PPDB atau langsung ke kantor sekolah. Siapkan persyaratan seperti FC KK, FC Akta Kelahiran, dan foto ukuran 3x4.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">
                        <span>Berapa biaya pendaftaran dan SPP?</span>
                        <i class="fas fa-plus"></i>
                    </button>
                    <div class="faq-answer">
                        <p>Biaya pendaftaran sebesar Rp 150.000,- dan SPP per bulan Rp 200.000,-. Tersedia juga keringanan untuk siswa berprestasi dan keluarga kurang mampu.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">
                        <span>Apakah MTS Manba'ul Ulum menerima siswa pindahan?</span>
                        <i class="fas fa-plus"></i>
                    </button>
                    <div class="faq-answer">
                        <p>Ya, kami menerima siswa pindahan dari MTs lain selama kuota tersedia. Syaratnya meliputi surat pindah, raport asli, dan mengikuti tes penempatan.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">
                        <span>Apa saja ekstrakurikuler yang tersedia?</span>
                        <i class="fas fa-plus"></i>
                    </button>
                    <div class="faq-answer">
                        <p>Kami menyediakan berbagai ekstrakurikuler seperti: Pramuka, PMR, Futsal, Basket, Marching Band, English Club, Karya Ilmiah Remaja, dan masih banyak lagi.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">
                        <span>Bagaimana sistem pembelajaran di MTS Manba'ul Ulum?</span>
                        <i class="fas fa-plus"></i>
                    </button>
                    <div class="faq-answer">
                        <p>Sistem pembelajaran menggunakan kurikulum K13 dengan pendekatan aktif, kreatif, dan menyenangkan. Kami juga mengintegrasikan teknologi dalam pembelajaran dan penguatan karakter Islami.</p>
                    </div>
                </div>
                <div class="faq-item">
                    <button class="faq-question">
                        <span>Apakah sekolah menyediakan transportasi?</span>
                        <i class="fas fa-plus"></i>
                    </button>
                    <div class="faq-answer">
                        <p>Ya, sekolah menyediakan bus sekolah untuk wilayah tertentu dengan biaya tambahan. Hubungi kami untuk informasi lebih lanjut mengenai rute dan tarif.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Prestasi Section -->
    <section id="prestasi" class="section bg-light">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Prestasi Sekolah</h2>
                <p class="section-subtitle">Capaian Gemilang Siswa dan Sekolah</p>
            </div>
            <div class="achievement-tabs">
                <button class="tab-btn active" data-tab="akademik">Akademik</button>
                <button class="tab-btn" data-tab="non-akademik">Non-Akademik</button>
            </div>
            <div class="achievement-content">
                <div class="achievement-grid active" id="akademik">
                    <?php foreach (($prestasi['akademik'] ?? []) as $index => $item): ?>
                        <div class="achievement-card">
                            <div class="achievement-badge">
                                <i class="fas fa-trophy"></i>
                            </div>
                            <div class="achievement-info">
                                <span class="achievement-year"><?php echo htmlspecialchars($item['year']); ?></span>
                                <h4><?php echo htmlspecialchars($item['title']); ?></h4>
                                <p><?php echo htmlspecialchars($item['name']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="achievement-grid" id="non-akademik">
                    <?php foreach (($prestasi['non-akademik'] ?? []) as $index => $item): ?>
                        <div class="achievement-card">
                            <div class="achievement-badge">
                                <i class="fas fa-trophy"></i>
                            </div>
                            <div class="achievement-info">
                                <span class="achievement-year"><?php echo htmlspecialchars($item['year']); ?></span>
                                <h4><?php echo htmlspecialchars($item['title']); ?></h4>
                                <p><?php echo htmlspecialchars($item['name']); ?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section id="gallery" class="section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Gallery</h2>
                <p class="section-subtitle">Dokumentasi Kegiatan Sekolah</p>
            </div>
            <div class="gallery-filter">
                <button class="filter-btn active" data-filter="all">Semua</button>
                <button class="filter-btn" data-filter="kegiatan">Kegiatan</button>
                <button class="filter-btn" data-filter="fasilitas">Fasilitas</button>
                <button class="filter-btn" data-filter="prestasi">Prestasi</button>
            </div>
            <div class="gallery-grid">
                <?php foreach ($gallery as $index => $item): ?>
                    <div class="gallery-item" data-category="<?php echo htmlspecialchars($item['category']); ?>">
                        <img src="<?php echo htmlspecialchars($item['image']); ?>" alt="<?php echo htmlspecialchars($item['title']); ?>" />
                        <div class="gallery-overlay">
                            <h4><?php echo htmlspecialchars($item['title']); ?></h4>
                            <p><?php echo htmlspecialchars($item['description']); ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- PPDB Section -->
    <section id="ppdb" class="section bg-primary">
        <div class="container">
            <div class="section-header light">
                <h2 class="section-title">Penerimaan Peserta Didik Baru</h2>
                <p class="section-subtitle">Tahun Ajaran 2025/2026</p>
            </div>
            <div class="ppdb-container">
                <div class="ppdb-info">
                    <div class="ppdb-card">
                        <div class="ppdb-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <h4>Jadwal PPDB</h4>
                        <ul>
                            <li>Pendaftaran: 5 Februari - 12 Juli 2026</li>
                            <li>Gelombang 1 : 5 Februari - 30 April 2026</li>
                            <li>Gelombang 2 : 1 Mei - 12 Juli 2026</li>
                            <li>Daftar Ulang: 16-25 Maret 2025</li>
                        </ul>
                    </div>
                    <div class="ppdb-card">
                        <div class="ppdb-icon">
                            <i class="fas fa-clipboard-list"></i>
                        </div>
                        <h4>Syarat Pendaftaran</h4>
                        <ul>
                            <li>Lulusan SD/MI atau setara</li>
                            <li>Usia max. 15 tahun pada tanggal 1 Juli 2025</li>
                            <li>FC Rapor Kelas 6 semester 1</li>
                            <li>FC Ijazah (1 lembar)</li>
                            <li>FC KK (1 lembar)</li>
                            <li>FC Akta Kelahiran (1 lembar)</li>
                            <li>FC SHUN (1 lembar)</li>
                            <li>Pas Foto 3x4 Hitam Putih (4 Lembar)</li>
                            <li>Stopmap *hijau*📗 untuk putra, stopmap *merah* 📕 untuk putri<li>
                        </ul>
                    </div>
                    <div class="ppdb-card">
                        <div class="ppdb-icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                        <h4>Bebas Biaya Pendaftaran</h4>
                        <ul>
                            <li>Gratis Seragam 1 Stel</li>
                            <li>Gratis SPP 1 Bulan</li>
                            <li>Bonus Seragam</li>
                            <li>Beasiswa bagi siswa yatim piatu</li>
                            <li>Mobil Jemputan</li>
                            <li>Bebas Uang Gedung</li>
                            <li>Doorprize menarik (Hp, Kulkas, Setrika, Jam dinding, dll)</li>
                        </ul>
                    </div>
                </div>
                <div class="ppdb-form-container">
                    <h3>Formulir Pendaftaran Online</h3>
                    <form id="ppdbForm" class="ppdb-form">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="ppdbNama">Nama Lengkap Calon Murid Baru *</label>
                                <input type="text" id="ppdbNama" name="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="ppdbJK">Jenis Kelamin *</label>
                                <select id="ppdbJK" name="jenis_kelamin" required>
                                    <option value="">Pilih</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="ppdbTempat">Tempat Lahir *</label>
                                <input type="text" id="ppdbTempat" name="tempat_lahir" required>
                            </div>
                            <div class="form-group">
                                <label for="ppdbTanggal">Tanggal Lahir *</label>
                                <input type="date" id="ppdbTanggal" name="tanggal_lahir" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="ppdbAsal">Asal Sekolah *</label>
                                <input type="text" id="ppdbAsal" name="asal_sekolah" required>
                            </div>
                            <div class="form-group">
                                <label for="ppdbJumlahsaudara">Jumlah Saudara *</label>
                                <input type="text" id="ppdbJumlahsaudara" name="jumlah_saudara" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="ppdbAnakke">Anak Ke *</label>
                                <input type="text" id="ppdbAnakke" name="anak_ke" required>
                            </div>
                            <div class="form-group">
                                <label for="ppdbHobi">Hobi *</label>
                                <select id="ppdbHobi" name="hobi" required>
                                    <option value="">Pilih</option>
                                    <option value="Olahraga">Olahraga</option>
                                    <option value="Kesenian">Kesenian</option>
                                    <option value="Membaca">Membaca</option>
                                    <option value="Menulis">Menulis</option>
                                    <option value="Liburan">Liburan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ppdbAlamat">Alamat Lengkap *</label>
                            <textarea id="ppdbAlamat" name="alamat" rows="3" required></textarea>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="ppdbAyah">Nama Ayah *</label>
                                <input type="text" id="ppdbAyah" name="nama_ayah" required>
                            </div>
                            <div class="form-group">
                                <label for="ppdbIbu">Nama Ibu *</label>
                                <input type="text" id="ppdbIbu" name="nama_ibu" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="ppdbTelepon">No.Whatsapp (bisa dihubungi) *</label>
                                <input type="tel" id="ppdbTelepon" name="telepon" required>
                            </div>
                            <div class="form-group">
                                <label for="ppdbEmail">Email *</label>
                                <input type="email" id="ppdbEmail" name="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="ppdbEkstra">Ekstrakurikuler yang Diminati</label>
                            <select id="ppdbEkstra" name="ekstrakurikuler">
                                <option value="">Pilih Ekstrakurikuler</option>
                                <option value="pramuka">Pramuka</option>
                                <option value="pmr">PMR</option>
                                <option value="futsal">Futsal</option>
                                <option value="marching">Marching Band</option>
                                <option value="english">English Club</option>
                                <option value="kir">Karya Ilmiah Remaja</option>
                            </select>
                        </div>
                        <div class="form-group checkbox-group">
                            <input type="checkbox" id="ppdbSetuju" name="setuju" required>
                            <label for="ppdbSetuju">Saya menyatakan data yang di atas adalah benar dan bersedia mengikuti aturan sekolah.</label>
                        </div>
                        <button type="submit" class="btn btn-light btn-block">Kirim Pendaftaran</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

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

    <!-- Back to Top Button -->
    <button class="back-to-top" id="backToTop">
        <i class="fas fa-arrow-up"></i>
    </button>

    <script src="script.js"></script>
</body>
</html>