<?php 
session_start();
include "koneksi.php";

if (!isset($_SESSION['login']) && isset($_COOKIE['login']) && $_COOKIE['login'] === 'true') {
    $_SESSION['login'] = true;
}

if (
    (!isset($_SESSION['login']) || $_SESSION['login'] !== 'true') &&
    (!isset($_COOKIE['login']) || $_COOKIE['login'] !== 'true')
) {
    header("Location: index.html");
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

<div class="content">
<?php 
$sql = "SELECT * FROM gallery";
$query = mysqli_query($conn, $sql);

$gambar = mysqli_fetch_all($query, MYSQLI_ASSOC);

foreach($gambar as $g){
    echo "<div style='text-align:center;margin-top:50px;'>";
    echo "<img src='upload/".$g['gambar']."' alt='". $g['nama']."' style='width:400px; height:auto;'><br>";
    echo "<span style='font-weight:bold;'>".$g['nama']."</span>";
    echo "</div>";

}

?>
</div>
  

<footer class="footer">
    <p>© 2025 Website </p>
  </footer>
</body>
</html>
