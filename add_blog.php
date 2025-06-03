<?php
include 'config.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST['title'];
  $content = $_POST['content'];
  $stmt = $conn->prepare("INSERT INTO blog (title, content) VALUES (?, ?)");
  $stmt->bind_param("ss", $title, $content);
  $stmt->execute();
  header("Location: blog.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tambah Artikel</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<nav>
  <a href="index.php">Beranda</a>
  <a href="gallery.html">Galeri</a>
  <a href="blog.php">Blog</a>
  <a href="contact.html">Kontak</a>
</nav>

<div style="margin: 20px;">
  <a href="blog.php" class="blog-button back">← Kembali</a>
</div>

<h1 style="text-align:center; font-size:28px;">Tambah Artikel</h1>

<div style="max-width:600px;margin:auto;">
  <form method="POST">
    <input type="text" name="title" placeholder="Judul artikel" required style="width:100%;padding:10px;margin-bottom:15px;">
    <textarea name="content" placeholder="Isi artikel..." required style="width:100%;height:250px;padding:10px;"></textarea><br><br>
    <button type="submit" class="blog-button" style="margin-top: 20px; margin-bottom: 40px;">Simpan</button>
  </form>
</div>

<footer>
  <p>Dibuat oleh Unsrat Student.</p>
</footer>
</body>
</html>
