<?php 
session_start();

if (!isset($_SESSION['login']) && isset($_COOKIE['login']) && $_COOKIE['login'] === 'true') {
    $_SESSION['login'] = true;
}

if (
    (!isset($_SESSION['login']) || $_SESSION['login'] !== 'true') &&
    (!isset($_COOKIE['login']) || $_COOKIE['login'] !== 'true')
) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="navbar">
    
  <a href="home.php" style="color: black">Home</a>

    <div class="dropdown">
        <button class="dropbtn">Menu ▼</button>
        <div class="dropdown-content">
            <a href="profile.php">Profile</a>
            <a href="galeri.php">galeri</a>
            <a href="faq.php">faq</a>
        </div>
    </div>
    <div class="dropdown" style="float:right; margin-right:20px;">
        <button class="dropbtn">👤</button>
        <div class="dropdown-content">
            <!-- <a href="#web">Profile</a> -->
            <a href="logout.php">Logout</a>
        </div>
    </div>

</div>

  <main class="content">
    <h1>Ini Home</h1>
  </main>

  <footer class="footer">
    <p>© 2025 Website </p>
  </footer>
</body>
</html>
