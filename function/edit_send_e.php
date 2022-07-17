<?php
include_once 'function.php';
session_start();
$fetch_name = new DB_con();
$edit_send_e = new DB_con();

$borrow_id = $_GET['borrow_id'];
$s_user = $_GET['s_user'];

$sql1 = $fetch_name->s_name_s_user_fetch($s_user);
$row1 = mysqli_fetch_array($sql1);

$_SESSION['s_user'] = $s_user;
$_SESSION['borrow_id'] = $borrow_id;
$_SESSION['s_firstname'] = $row1['s_firstname'];
$_SESSION['s_lastname'] = $row1['s_lastname'];

$sql2 = $edit_send_e->borrow_status_10_2($borrow_id);
if ($sql1 && $sql2) {
?>
    <script>
        alert("ดำเนินการสำเร็จ")
        window.open("sendmail_e_edit_s2.php", "_self")
    </script>

<?php
} else {
?>
    <script>
        alert("ดำเนินการไม่สำเร็จ")
    </script>

<?php
}

?>