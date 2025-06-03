<?php
include 'config.php';
$blogs = $conn->query("SELECT * FROM blog ORDER BY RAND() LIMIT 4");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>TIK2032</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
    
  <!-- Bar Navigasi -->
  <nav>
    <a href="index.php">Beranda</a>
    <a href="gallery.html">Galeri</a>
    <a href="blog.php">Blog</a>
    <a href="contact.html">Kontak</a>
  </nav>


  <!-- Beranda -->
  <header id="beranda">
    <div class="image-container">
      <img src="img/foto_utama.jpeg" alt="Header Image">
      <h1>HOME</h1>
    </div>
  </header>
  
  <section id="galeri">
    <h1>Galeri</h1>
    <table border="0" cellspacing="0" cellpadding="5">
      <tr>
        <td><img src="img/foto_op1.jpeg" alt="Galeri Image 1" width="300" height="300"></td>
        <td><img src="img/foto_h1.jpeg" alt="Galeri Image 2" width="300" height="1"></td>
        <td><img src="img/foto_n1.jpeg" alt="Galeri Image 3" width="300" height="300"></td>
        <td><img src="img/foto_bc1.jpeg" alt="Galeri Image 4" width="300" height="300"></td>
      </tr>
      <tr>
        <td><img src="img/foto_op2.jpeg" alt="Galeri Image 5" width="300" height="300"></td>
        <td><img src="img/foto_h2.jpeg" alt="Galeri Image 6" width="300" height="300"></td>
        <td><img src="img/foto_n2.jpeg" alt="Galeri Image 7" width="300" height="300"></td>
        <td><img src="img/foto_bc2.jpeg" alt="Galeri Image 8" width="300" height="300"></td>
      </tr>
    </table>
  </section>

  <!-- Blog Section -->
  <section id="blog">
    <h1>Blog</h1>
    <table border="0" cellspacing="0" cellpadding="5">
      <tr>
        <?php while ($row = $blogs->fetch_assoc()): ?>
        <td width="25%" valign="top">
          <h3><?= htmlspecialchars($row['title']) ?></h3>
          <?php 
            $paragraphs = explode("\n", trim($row['content']));
            foreach ($paragraphs as $p) {
              echo '<p>' . htmlspecialchars(trim($p)) . '</p>';
            }
          ?>
        </td>
        <?php endwhile; ?>
      </tr>
    </table>
  </section>

<section id="kontak">
  <div class="contact-container">
    <h1 class="contact-header">Kontak</h1>

    <div class="contact-grid">
      <div class="contact-item">
        <span>📍 Alamat:</span>
        Sam Ratulangi, 350423 Manado, Indonesia
      </div>
      <div class="contact-item">
        <span>☎️ Telepon:</span>
        082123123
      </div>
      <div class="contact-item">
        <span>📧 Email:</span>
        <a href="mailto:meylivialiuw026@student.unsrat.ac.id">meylivialiuw026@student.unsrat.ac.id</a>
      </div>
      <div class="contact-item">
        <span>🌐 Website:</span>
        <a href="https://www.unsrat.ac.id/" target="_blank">www.unsrat.ac.id</a>
      </div>
    </div>
  </div>
</section>


  <!-- Footer -->
  <footer>
    <p> Dibuat oleh <a href="https://www.unsrat.ac.id/" target="_blank">Unsrat Student</a></p>
  </footer>

  <button onclick="scrollToTop()" id="scrollTopBtn" title="Kembali ke atas">⬆</button>
  <script>
    const scrollBtn = document.getElementById("scrollTopBtn");
    window.onscroll = function () {
      scrollBtn.style.display = (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) ? "block" : "none";
    };
    function scrollToTop() {
      window.scrollTo({ top: 0, behavior: "smooth" });
    }
  </script>
</body>
</html>
