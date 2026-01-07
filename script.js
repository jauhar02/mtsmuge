/* ==================== DOM CONTENT LOADED ==================== */
document.addEventListener('DOMContentLoaded', function() {
    // Initialize all functions
    initNavbar();
    initSmoothScroll();
    initBackToTop();
    initCounterAnimation();
    initFAQ();
    initAchievementTabs();
    initGalleryFilter();
    initForms();
    initLoading();
    initScrollAnimations();
});

/* ==================== NAVBAR FUNCTIONS ==================== */
function initNavbar() {
    const navbar = document.getElementById('navbar');
    const navToggle = document.getElementById('navToggle');
    const navMenu = document.getElementById('navMenu');
    const dropdownItems = document.querySelectorAll('.nav-item-dropdown');

    // Scroll effect for navbar
    window.addEventListener('scroll', function() {
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });

    // Mobile menu toggle
    navToggle.addEventListener('click', function() {
        navMenu.classList.toggle('active');
        const icon = navToggle.querySelector('i');
        if (navMenu.classList.contains('active')) {
            icon.classList.remove('fa-bars');
            icon.classList.add('fa-times');
        } else {
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        }
    });

    // Dropdown toggle on mobile
    dropdownItems.forEach(function(item) {
        const toggle = item.querySelector('.dropdown-toggle');
        toggle.addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {
                e.preventDefault();
                item.classList.toggle('active');
            }
        });
    });

    // Close menu when clicking outside
    document.addEventListener('click', function(e) {
        if (!navbar.contains(e.target)) {
            navMenu.classList.remove('active');
            const icon = navToggle.querySelector('i');
            icon.classList.remove('fa-times');
            icon.classList.add('fa-bars');
        }
    });

    // Active link based on scroll position
    const sections = document.querySelectorAll('section[id]');
    window.addEventListener('scroll', function() {
        let scrollY = window.scrollY;
        sections.forEach(function(section) {
            const sectionHeight = section.offsetHeight;
            const sectionTop = section.offsetTop - 100;
            const sectionId = section.getAttribute('id');
            const navLink = document.querySelector('.nav-link[href="#' + sectionId + '"]');
            
            if (navLink) {
                if (scrollY > sectionTop && scrollY <= sectionTop + sectionHeight) {
                    navLink.classList.add('active');
                } else {
                    navLink.classList.remove('active');
                }
            }
        });
    });
}

/* ==================== SMOOTH SCROLL ==================== */
function initSmoothScroll() {
    const links = document.querySelectorAll('a[href^="#"]');
    
    links.forEach(function(link) {
        link.addEventListener('click', function(e) {
            const targetId = this.getAttribute('href');
            
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            
            if (targetElement) {
                e.preventDefault();
                
                // Close mobile menu if open
                const navMenu = document.getElementById('navMenu');
                const navToggle = document.getElementById('navToggle');
                navMenu.classList.remove('active');
                const icon = navToggle.querySelector('i');
                icon.classList.remove('fa-times');
                icon.classList.add('fa-bars');
                
                const headerOffset = 80;
                const elementPosition = targetElement.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.scrollY - headerOffset;
                
                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}

/* ==================== BACK TO TOP ==================== */
function initBackToTop() {
    const backToTop = document.getElementById('backToTop');
    
    if (!backToTop) return;
    
    window.addEventListener('scroll', function() {
        if (window.scrollY > 300) {
            backToTop.classList.add('show');
        } else {
            backToTop.classList.remove('show');
        }
    });
    
    backToTop.addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

/* ==================== COUNTER ANIMATION ==================== */
function initCounterAnimation() {
    const counters = document.querySelectorAll('.stat-number[data-count]');
    
    if (counters.length === 0) return;
    
    const animateCounter = function(counter) {
        const target = parseInt(counter.getAttribute('data-count'));
        const duration = 2000;
        const step = target / (duration / 16);
        let current = 0;
        
        const updateCounter = function() {
            current += step;
            if (current < target) {
                counter.textContent = Math.floor(current);
                requestAnimationFrame(updateCounter);
            } else {
                counter.textContent = target;
            }
        };
        
        updateCounter();
    };
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    counters.forEach(function(counter) {
        observer.observe(counter);
    });
}

/* ==================== FAQ ACCORDION ==================== */
function initFAQ() {
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(function(item) {
        const question = item.querySelector('.faq-question');
        
        if (!question) return;
        
        question.addEventListener('click', function() {
            const isActive = item.classList.contains('active');
            
            // Close all other items
            faqItems.forEach(function(otherItem) {
                if (otherItem !== item) {
                    otherItem.classList.remove('active');
                }
            });
            
            // Toggle current item
            item.classList.toggle('active', !isActive);
        });
    });
}

/* ==================== ACHIEVEMENT TABS ==================== */
function initAchievementTabs() {
    const tabBtns = document.querySelectorAll('.tab-btn');
    const achievementGrids = document.querySelectorAll('.achievement-grid');
    
    if (tabBtns.length === 0) return;
    
    tabBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            const tabId = this.getAttribute('data-tab');
            
            // Update active button
            tabBtns.forEach(function(b) {
                b.classList.remove('active');
            });
            this.classList.add('active');
            
            // Update active content
            achievementGrids.forEach(function(grid) {
                grid.classList.remove('active');
                if (grid.id === tabId) {
                    grid.classList.add('active');
                }
            });
        });
    });
}

/* ==================== GALLERY FILTER ==================== */
function initGalleryFilter() {
    const filterBtns = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');
    
    if (filterBtns.length === 0) return;
    
    filterBtns.forEach(function(btn) {
        btn.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterBtns.forEach(function(b) {
                b.classList.remove('active');
            });
            this.classList.add('active');
            
            // Filter gallery items
            galleryItems.forEach(function(item) {
                const category = item.getAttribute('data-category');
                
                if (filter === 'all' || category === filter) {
                    item.classList.remove('hidden');
                    item.style.animation = 'fadeInUp 0.5s ease forwards';
                } else {
                    item.classList.add('hidden');
                }
            });
        });
    });
}

/* ==================== FORM HANDLING ==================== */
function initForms() {
    // Contact Form
    const contactForm = document.getElementById('contactForm');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const data = {};
            formData.forEach(function(value, key) {
                data[key] = value;
            });
            
            // Simulate form submission
            showAlert('contactForm', 'success', 'Pesan berhasil terkirim! Kami akan segera menghubungi Anda.');
            this.reset();
        });
    }
    
    // PPDB Form
    const ppdbForm = document.getElementById('ppdbForm');
    if (ppdbForm) {
        ppdbForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const data = {};
            formData.forEach(function(value, key) {
                data[key] = value;
            });
            
            // Validate required fields
            const required = ['nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'asal_sekolah', 'nisn', 'alamat', 'nama_ayah', 'nama_ibu', 'telepon', 'email', 'setuju'];
            let isValid = true;
            
            required.forEach(function(field) {
                const input = ppdbForm.querySelector('[name="' + field + '"]');
                if (input && !input.value) {
                    isValid = false;
                    input.style.borderColor = '#e74c3c';
                } else if (input) {
                    input.style.borderColor = '#dee2e6';
                }
            });
            
            if (!isValid) {
                showAlert('ppdbForm', 'error', 'Mohon lengkapi semua data yang diperlukan!');
                return;
            }
            
            // Simulate form submission
            showAlert('ppdbForm', 'success', 'Pendaftaran berhasil terkirim! Silakan tunggu pengumuman lebih lanjut.');
            this.reset();
        });
        
        // Real-time validation
        const inputs = ppdbForm.querySelectorAll('input, select, textarea');
        inputs.forEach(function(input) {
            input.addEventListener('blur', function() {
                if (this.hasAttribute('required') && !this.value) {
                    this.style.borderColor = '#e74c3c';
                } else {
                    this.style.borderColor = '#dee2e6';
                }
            });
            
            input.addEventListener('focus', function() {
                this.style.borderColor = '#2E7D32';
            });
        });
    }
}

/* ==================== ALERT MESSAGES ==================== */
function showAlert(formId, type, message) {
    const form = document.getElementById(formId);
    if (!form) return;
    
    // Remove existing alerts
    const existingAlert = form.parentElement.querySelector('.alert');
    if (existingAlert) {
        existingAlert.remove();
    }
    
    // Create new alert
    const alert = document.createElement('div');
    alert.className = 'alert alert-' + type;
    alert.textContent = message;
    
    // Insert alert before form
    form.parentElement.insertBefore(alert, form);
    
    // Auto remove after 5 seconds
    setTimeout(function() {
        alert.style.opacity = '0';
        alert.style.transition = 'opacity 0.5s ease';
        setTimeout(function() {
            alert.remove();
        }, 500);
    }, 5000);
}

/* ==================== LOADING SCREEN ==================== */
function initLoading() {
    const loading = document.querySelector('.loading');
    
    if (!loading) return;
    
    window.addEventListener('load', function() {
        setTimeout(function() {
            loading.classList.add('hidden');
        }, 500);
    });
}

/* ==================== SCROLL ANIMATIONS ==================== */
function initScrollAnimations() {
    const animatedElements = document.querySelectorAll('.animate-on-scroll');
    
    if (animatedElements.length === 0) return;
    
    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    
    animatedElements.forEach(function(element) {
        observer.observe(element);
    });
}

/* ==================== UTILITY FUNCTIONS ==================== */

// Debounce function for performance
function debounce(func, wait) {
    let timeout;
    return function executedFunction() {
        const context = this;
        const args = arguments;
        clearTimeout(timeout);
        timeout = setTimeout(function() {
            func.apply(context, args);
        }, wait);
    };
}

// Throttle function for scroll events
function throttle(func, limit) {
    let inThrottle;
    return function() {
        const args = arguments;
        const context = this;
        if (!inThrottle) {
            func.apply(context, args);
            inThrottle = true;
            setTimeout(function() {
                inThrottle = false;
            }, limit);
        }
    };
}

// Get element offset from top
function getOffsetTop(element) {
    let offsetTop = 0;
    while (element) {
        offsetTop += element.offsetTop;
        element = element.offsetParent;
    }
    return offsetTop;
}

// Check if element is in viewport
function isInViewport(element) {
    const rect = element.getBoundingClientRect();
    return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
    );
}

// Fungsi untuk mengarahkan pengguna ke WhatsApp setelah form dikirim
document.getElementById("ppdbForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Mencegah form agar tidak terkirim secara tradisional

    // Mengambil data dari form
    var ppdbNama = document.getElementById("ppdbNama").value;
    var ppdbJK = document.getElementById("ppdbJK").value;
    var ppdbTempat = document.getElementById("ppdbTempat").value;
    var ppdbTanggal = document.getElementById("ppdbTanggal").value;
    var ppdbAsal = document.getElementById("ppdbAsal").value;
    var ppdbJumlahsaudara = document.getElementById("ppdbJumlahsaudara").value;
    var ppdbAnakke = document.getElementById("ppdbAnakke").value;
    var ppdbHobi = document.getElementById("ppdbHobi").value;
    var ppdbAlamat = document.getElementById("ppdbAlamat").value;
    var ppdbAyah = document.getElementById("ppdbAyah").value;
    var ppdbIbu = document.getElementById("ppdbIbu").value;
    var ppdbTelepon = document.getElementById("ppdbTelepon").value;
    var ppdbEmail = document.getElementById("ppdbEmail").value;
    var ppdbEkstra = document.getElementById("ppdbEkstra").value;

    // Menyusun pesan untuk WhatsApp
    var text = "Asslamu'alaikum Wr.Wb\nSaya ingin mendaftarkan peserta didik baru di sekolah MTS Manba'ul Ulum :\n\n" +
                "Nama Lengkap : " + ppdbNama + "\n" +
                "Jenis Kelamin : " + ppdbJK + "\n" +
                "Tempat lahir : " + ppdbTempat + "\n" +
                "Tanggal Lahir : " + ppdbTanggal + "\n" +
                "Asal Sekolah : " + ppdbAsal + "\n" +
                "Jumlah Saudara : " + ppdbJumlahsaudara + "\n" +
                "Anak Ke : " + ppdbAnakke + "\n" +
                "Hobi : " + ppdbHobi + "\n" +
                "Alamat Lengkap : " + ppdbAlamat + "\n" +
                "Nama Ayah : " + ppdbAyah + "\n" +
                "Nama Ibu : " + ppdbIbu + "\n" +
                "No Whatsapp (bisa dihubungi) : " + ppdbTelepon + "\n" +
                "Email : " +ppdbEmail + "\n" +
                "Ekstrakurikuler : " + ppdbEkstra;

    // Membuat link WhatsApp
    var whatsappUrl = "https://wa.me/6288980087049?text=" + encodeURIComponent(text); // Ganti nomor WhatsApp dengan nomor Anda

    // Menampilkan alert (Opsional)
    alert('PPDB akan segera kami proses dan akan kami hubungi secepatnya');

    // Mengarahkan pengguna ke WhatsApp setelah beberapa detik (menunda redirect)
    setTimeout(function() {
        window.location.href = whatsappUrl;
    }, 500); // Menunda redirect selama 500ms (0.5 detik)
});

        function toggleDropup() {
            document.getElementById('dropupMenu').classList.toggle('show');
        }

        function openEditModal(section) {
            document.getElementById('editSection').value = section;
            document.getElementById('modalTitle').innerText = 'Edit ' + section.charAt(0).toUpperCase() + section.slice(1);
            // Load fields berdasarkan section (gunakan AJAX jika perlu)
            document.getElementById('editModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        // Tutup modal jika klik di luar
        window.onclick = function(event) {
            if (event.target == document.getElementById('editModal')) {
                closeModal();
            }
        }

        function toggleDropup() {
    const menu = document.getElementById('dropupMenu');
    menu.classList.toggle('show');
    // Animasi smooth
    if (menu.classList.contains('show')) {
        menu.style.animation = 'slideUp 0.3s ease';
    } else {
        menu.style.animation = 'slideDown 0.3s ease';
    }
}
