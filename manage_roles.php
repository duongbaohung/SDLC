<?php
include 'db.php';
session_start();

if (!in_array('admin', $_SESSION['roles'])) {
    echo "<p>You dont have permission to access this page.</p>";
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>User Management</title>
<link rel="stylesheet" href="style.css">
<style>
.container { display: flex; justify-content: center; margin: 20px; gap: 40px; }
.left, .right { width: 40%; }
input[type=search]{width:100%;padding:8px;margin-bottom:10px;}
.user-list { border:1px solid #ccc; height:300px; overflow-y:auto; }
.user-item { padding:6px; cursor:pointer; border-bottom:1px solid #eee; }
.user-item:hover { background:#f0f0f0; }
.role-item { margin:6px 0; }
</style>
</head>
<body>
<h2 style="text-align:center;">User Management</h2>
<div class="container">
  <div class="left">
    <h3>Lists off users</h3>
    <input type="search" id="searchUser" placeholder="Tìm kiếm...">
    <div class="user-list" id="userList">
      <?php
      $users = $conn->query("SELECT * FROM users ORDER BY username ASC");
      while($u=$users->fetch_assoc()){
        echo "<div class='user-item' data-id='{$u['user_id']}'>{$u['username']}</div>";
      }
      ?>
    </div>
  </div>

  <div class="right">
    <h3>Allocate roles</h3>
    <form method="POST" id="roleForm">
      <input type="hidden" name="user_id" id="user_id">
      <?php
      $roles = $conn->query("SELECT * FROM roles");
      while($r=$roles->fetch_assoc()){
        echo "<div class='role-item'><label><input type='checkbox' name='roles[]' value='{$r['role_id']}'> {$r['role_name']}</label></div>";
      }
      ?>
      <br><button type="submit" name="assign">Update role</button>
    </form>
  </div>
</div>

<?php
if(isset($_POST['assign'])){
  $user_id=$_POST['user_id'];
  $roles=$_POST['roles']??[];
  $conn->query("DELETE FROM user_role WHERE user_id=$user_id");
  foreach($roles as $r) $conn->query("INSERT INTO user_role VALUES($user_id,$r)");
  echo "<script>alert('Cập nhật vai trò thành công!');</script>";
}
?>

<script>
document.getElementById('searchUser').addEventListener('keyup', function(){
  const val=this.value.toLowerCase();
  document.querySelectorAll('.user-item').forEach(i=>{
    i.style.display=i.textContent.toLowerCase().includes(val)?'block':'none';
  });
});
document.querySelectorAll('.user-item').forEach(i=>{
  i.addEventListener('click',()=>{
    document.getElementById('user_id').value=i.dataset.id;
    document.querySelectorAll('.user-item').forEach(u=>u.style.background='');
    i.style.background='#d0ebff';
  });
});
</script>
<p style="text-align:center;"><a href="index.php">← Return</a></p>
</body>
</html>
