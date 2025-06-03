<?php
include 'config.php';
$result = $conn->query("SELECT * FROM blog ORDER BY created_at DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Blog</title>
  <link rel="stylesheet" href="style.css">
  
</head>
<body>

<!-- Navbar seperti halaman lain -->
<nav>
  <a href="index.php">Beranda</a>
  <a href="gallery.html">Galeri</a>
  <a href="blog.php">Blog</a>
  <a href="contact.html">Kontak</a>
</nav>

<!-- Tombol Kembali -->
<div style="margin: 20px;">
  <a href="index.php" class="blog-button back">← Kembali</a>
</div>

<!-- Judul -->
<h1 style="text-align:center; font-size:28px;">Blog / Article</h1>

<!-- Tombol Tambah -->
<div style="text-align:center; margin: 10px 30px; margin-right:880px;">
  <a href="add_blog.php" class="blog-button">+ Tambah Artikel</a>
</div>

<!-- Blog list -->
<div style="max-width: 1000px; margin: auto;">
  <?php while($row = $result->fetch_assoc()): ?>
    <div class="blog-item" style="display: flex; justify-content: space-between; align-items: flex-start; padding: 20px; margin-bottom: 20px; border-radius: 10px; background-color: #f9f9f9;">
      <div style="flex: 1; padding-right: 20px;">
        <h3 style="margin-top: 0; font-style: italic; font-size: 20px; color: darkslategray;"><?= htmlspecialchars($row['title']) ?></h3>
        <p style="text-align: justify; color: #333; word-break: break-word;">
            <?php
                $text = strip_tags($row['content']);
                echo strlen($text) > 300 ? nl2br(htmlspecialchars(substr($text, 0, 300))) . "..." : nl2br(htmlspecialchars($text));
            ?>
        </p>

      </div>
      <div style="text-align: right; min-width: 80px;">
        <a href="edit_blog.php?id=<?= $row['id'] ?>" class="blog-button" style="margin-bottom: 16px;">Edit</a><br>
        <a href="delete_blog.php?id=<?= $row['id'] ?>" class="blog-button delete" onclick="return confirm('Yakin ingin hapus artikel ini?')">Hapus</a>
      </div>
    </div>
  <?php endwhile; ?>
</div>

<footer>
  <p>Dibuat oleh Unsrat Student.</p>
</footer>
</body>
</html>
