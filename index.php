<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
  </head>
  <body>
<?php include "autochange.php"?>
    <div class="container">
      <h1>เข้าสู่ระบบ</h1>
      <form class="form" action="function/checklogin.php" method="post">
        <div class="form-control">
          <input type="text" name="User" required>
          <label>รหัสประจำตัว</label>
        </div>
        <div class="form-control">
          <input type="password" name="Password" required>
          <label>รหัสผ่าน</label>
        </div>
        <button type="submit" id="login" name="login" class="btn">เข้าสู่ระบบ</button>
        <p class="text">ต้องการสร้างบัญชีหรือไม่?</p>
        <a href="register_form.php">สร้างบัญชีใหม่</a>
        <a href="s_forgot.php">ลืมรหัส</a>
      </form>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/login.js"></script> 
  </body>
</html>