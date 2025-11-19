<?php 
include 'koneksi.php';
session_start();
$error_message = "";
if (isset($_SESSION['error'])) {
    $error_message = $_SESSION['error'];
    unset($_SESSION['error']);
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users WHERE username='$username'";
    $hasil = mysqli_query($conn,$query);

    if (mysqli_num_rows($hasil) === 1){
        $row = mysqli_fetch_assoc($hasil);

        

        if(password_verify($password, $row['password'] )){
        if(isset($_POST['remember'])){
            setcookie('login', 'true', time()+3600, '/');
        }
        $_SESSION['login'] = 'true';
        $_SESSION['username'] = $row['username'];

        header('Location: home.php');
        exit;
    } else {
        $_SESSION['error'] = "Password Atau username salah!";
        header('Location: index.php');
        exit;
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <style>
    /* Reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }

    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      background-image: url("p.jpg");
      background-size: cover;    
  background-repeat: no-repeat; 
  background-position: center;  /* posisi tengah layar */
  background-attachment: fixed; /* opsional: biar efek parallax saat scroll */
    }

    .login-box {
      width: 450px;
      padding: 40px;
      background: rgba(255, 255, 255, 0.1);
      border-radius: 15px;
      backdrop-filter: blur(10px);
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);
      text-align: center;
    }

    .login-box h2 {
      color: #fff;
      margin-bottom: 30px;
    }

    .input-box {
      position: relative;
      margin-bottom: 25px;
    }

    .input-box input {
      width: 100%;
      padding: 12px 15px;
      border: none;
      outline: none;
      border-radius: 8px;
      background: rgba(255, 255, 255, 0.2);
      color: #fff;
      font-size: 16px;
    }

    .input-box input::placeholder {
      color: rgba(255, 255, 255, 0.7);
    }

    .login-btn {
      width: 100%;
      padding: 12px;
      background: #6c2bd9; /* ungu */
      border: none;
      border-radius: 8px;
      color: #fff;
      font-size: 18px;
      cursor: pointer;
      transition: 0.3s;
    }

    .login-btn:hover {
      background: #7c3aed;
    }

    .signup-link {
      margin-top: 20px;
      color: rgba(255, 255, 255, 0.7);
      font-size: 14px;
    }

    .signup-link a {
      color: #fff;
      text-decoration: none;
      font-weight: bold;
    }

    .signup-link a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="login-box">
    <h2>Login</h2>
    <?php if ($error_message != ""): ?>
  <div style="color: white; background: red; padding: 10px; margin-bottom: 10px; border-radius: 5px; text-align: center;">
      <?= $error_message; ?>
  </div>
<?php endif; ?>
    <form method="POST">
      <div class="input-box">
        <input type="text" name="username" id="username" placeholder="Username" required>
      </div>
      <div class="input-box">
        <input type="password" name="password" id="password" placeholder="Password" required>
      </div>
      Remember Me <input type="checkbox" name="remember" id="">
      <button style="margin-top: 8px;" type="submit" class="login-btn">Login</button>
      <p class="signup-link">Not a member? <a href="register.html">Sign Up</a></p>
    </form>
  </div>

<script>
  console.log("Hello, World")
</script>
</body>
</html>

