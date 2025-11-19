<?php
session_start();
session_unset();
session_destroy();
if (isset($_COOKIE['login'])) {
    setcookie('login', '', time() - 3600, '/'); // hapus dengan waktu lampau
}

header('Location: index.php');
exit;
?>
