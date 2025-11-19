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
    <title>Profile</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<style>
    body {
    margin: 0;
    font-family: Arial, sans-serif; 
    
    /* 🔑 Kunci 1: Atur sebagai Flexbox vertikal */
    display: flex;
    flex-direction: column; 
    min-height: 100vh; /* Agar tingginya minimal setinggi viewport */
}
</style>
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
$sql = "SELECT * FROM team";
$query = mysqli_query($conn, $sql);

$team = mysqli_fetch_all($query, MYSQLI_ASSOC);

foreach($team as $t){
    echo "<div style='text-align: center;'>";
    echo "<div class='container'>";
    echo "<h2><b>".$t["nama"]."</b><h2>";
    echo "<h3>".$t['jobdesk']."</h3>";
    echo "</div>";
    echo "</div>";
}
?>
</div>
    

<footer class="footer">
    <p>© 2025 Website </p>
  </footer>
</body>
</html>