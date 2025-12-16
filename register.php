<?php
include 'db.php';
session_start();

if (isset($_POST['register'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{6,}$/', $password)) {
        $error = "Mật khẩu phải ≥6 ký tự, gồm chữ hoa, thường, số và ký tự đặc biệt!";
    } else {
        $password_hash = md5($password);
        $check = $conn->query("SELECT * FROM users WHERE username='$username' OR email='$email'");
        if ($check->num_rows > 0) {
            $error = "Tên đăng nhập hoặc email đã tồn tại!";
        } else {
            if ($conn->query("INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password_hash')")) {
                $success = "Đăng ký thành công! Hãy đăng nhập.";
            } else {
                $error = "Lỗi khi đăng ký: " . $conn->error;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Đăng ký</title>
<link rel="stylesheet" href="style.css">
<style>
.toast {
  visibility: hidden;
  background-color: #4CAF50;
  color: white;
  padding: 12px;
  border-radius: 6px;
  position: fixed;
  bottom: 30px;
  left: 50%;
  transform: translateX(-50%);
  opacity: 0;
  transition: opacity 0.5s;
}
.toast.show { visibility: visible; opacity: 1; }
.toast.error { background-color: #f44336; }
</style>
</head>
<body>
<div class="form-container">
  <h2>Sign up</h2>
  <form method="POST" onsubmit="return validatePassword();">
    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br><br>

    <label>Password:</label><br>
    <input type="password" id="password" name="password" required><br>
    <small>Password must be ≥6 character, including Upper case, Lower case, digits & special signs</small><br><br>

    <button type="submit" name="register">Sign up</button>
  </form>
  <p>Already have account? <a href="login.php">Login now</a></p>
</div>

<div id="toast" class="toast"></div>

<script>
function showToast(msg, error=false) {
  const t = document.getElementById('toast');
  t.textContent = msg;
  t.className = "toast show" + (error ? " error" : "");
  setTimeout(()=>t.className="toast", 3000);
}
function validatePassword(){
  const pw = document.getElementById('password').value;
  const re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{6,}$/;
  if(!re.test(pw)){ showToast("Mật khẩu chưa đủ mạnh!", true); return false; }
  return true;
}
<?php if(isset($success)){ ?>
showToast("<?= $success ?>");
setTimeout(()=>{window.location='login.php';},2500);
<?php } elseif(isset($error)){ ?>
showToast("<?= $error ?>",true);
<?php } ?>
</script>
</body>
</html>
