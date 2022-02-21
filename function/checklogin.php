<?php
session_start();
include_once('function.php');

$a_login = new DB_con();
$e_login = new DB_con();
$p_login = new DB_con();
$s_login = new DB_con();

$User = $_POST['User'];
$Password = md5($_POST['Password']);

$result = $s_login->s_login($User, $Password);
$num = mysqli_fetch_array($result);
if ($num > 0) {
  $_SESSION['s_id'] = $num['s_id'];
  $_SESSION['s_user'] = $User;
?>
  <script>
    alert("เข้าสู่ระบบสำเร็จ")
    window.open("../s_eq_borrow.php", "_self")
  </script>

  <?php

} else {

  $result = $p_login->p_login($User, $Password);
  $num = mysqli_fetch_array($result);
  if ($num > 0) {
    $_SESSION['p_id'] = $num['p_id'];
    $_SESSION['p_user'] = $User;
  ?>
    <script>
      alert("เข้าสู่ระบบสำเร็จ")
      window.open("../p_approve.php", "_self")
    </script>
    <?php

  } else {
    $result = $e_login->e_login($User, $Password);
    $num = mysqli_fetch_array($result);
    if ($num > 0) {
      $_SESSION['e_id'] = $num['e_id'];
      $_SESSION['e_user'] = $User;
    ?>
      <script>
        alert("เข้าสู่ระบบสำเร็จ")
        window.open("../e_approve.php", "_self") //! มีการแก้ไข location
      </script>

      <?php

    } else {
      $result = $a_login->a_login($User, $Password);
      $num = mysqli_fetch_array($result);
      if ($num > 0) {
        $_SESSION['a_id'] = $num['a_id'];
        $_SESSION['a_user'] = $User;
      ?>
        <script>
          alert("เข้าสู่ระบบสำเร็จ")
          window.open("../a_eq_manage.php", "_self")
        </script>

      <?php
      } else {
      ?>
        <script>
          alert("เข้าสู่ระบบไม่สำเร็จ")
          window.open("../index.php", "_self")
        </script>
<?php
      }
    }
  }
}
?>
