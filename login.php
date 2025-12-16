<?php
include 'db.php';
session_start();

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = md5(trim($_POST['password']));

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $user['username'];

        $roles = [];
        $role_sql = "SELECT r.role_name FROM roles r
                     JOIN user_role ur ON r.role_id = ur.role_id
                     WHERE ur.user_id = {$user['user_id']}";
        $rs = $conn->query($role_sql);
        while ($r = $rs->fetch_assoc()) $roles[] = $r['role_name'];
        $_SESSION['roles'] = $roles;

        if (in_array('admin', $roles)) {
        header("Location: manage_roles.php");
        exit();
        } elseif (in_array('restaurant', $roles)) {
        header("Location: index.php");
        exit();
        } elseif (in_array('delivery_driver', $roles)) {
        header("Location: index.php");
        exit();
        } elseif (in_array('customer', $roles)) {
        header("Location: index.php");
        exit();
        } else {
        $error = "Can't identify user role!";
        header("Location: index.php");
        }
        $success = "Login successful!";
        header("Location: index.php");
    } else {
        $error = "Wrong username or password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="style.css">
<style>
.toast { visibility:hidden;background:#4CAF50;color:white;padding:12px;
border-radius:6px;position:fixed;bottom:30px;left:50%;transform:translateX(-50%);
opacity:0;transition:opacity .5s;}
.toast.show{visibility:visible;opacity:1;}
.toast.error{background:#f44336;}
</style>
</head>
<body>
<div class="form-container">
  <h2>Login</h2>
  <form method="POST">
    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>
    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>
    <button type="submit" name="login">Login</button>
  </form>
  <p>Don't have account yet? <a href="register.php">Register now</a></p>
</div>

<div id="toast" class="toast"></div>
<script>
function showToast(msg, err=false){
  const t=document.getElementById('toast');
  t.textContent=msg;
  t.className="toast show"+(err?" error":"");
  setTimeout(()=>t.className="toast",3000);
}
<?php if(isset($success)){ ?>
showToast("<?= $success ?>");
//setTimeout(()=>{window.location='index.php';},2000);
<?php } elseif(isset($error)){ ?>
showToast("<?= $error ?>",true);
<?php } ?>
</script>
</body>
</html>
