<?php
if(isset($_POST['submit_password']) && $_POST['email'] && $_POST['password'])
{
	include_once 'function.php';
  $email=$_POST['email'];
  $pass=md5($_POST['password']);
  $update_password = new DB_con();
 $select = $update_password->update_password($email,$pass);
?>
<script>
alert("ทำการเปลี่ยนรหัสสำเร็จ")
window.open("../index.php", "_self")
</script>
<?php
            } else {
            ?>
                <script>
                    alert("เปลี่ยนรหัสผ่านไม่สำเร็จ")
                    window.open("../index.php", "_self")
                </script>
        <?php
            }
			?>