<?php
include 'config.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM blog WHERE id=$id");
$row = $result->fetch_assoc();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $title = $_POST["title"];
  $content = $_POST["content"];
  $stmt = $conn->prepare("UPDATE blog SET title=?, content=? WHERE id=?");
  $stmt->bind_param("ssi", $title, $content, $id);
  $stmt->execute();
  header("Location: blog.php");
}?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Artikel</title>
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

<h1 style="text-align:center; font-size:28px;">Edit Artikel</h1>

<div style="max-width:600px;margin:auto;">
  <form method="POST">
    <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>" required style="width:100%;padding:10px;margin-bottom:15px;">
    <textarea name="content" required style="width:100%;height:250px;padding:10px;"><?= htmlspecialchars($row['content']) ?></textarea><br><br>
    <button type="submit" class="blog-button" style="margin-top: 20px; margin-bottom: 40px;">Perbarui</button>
  </form>
</div>

<footer>
  <p>Dibuat oleh Unsrat Student.</p>
</footer>
</body>
</html>
