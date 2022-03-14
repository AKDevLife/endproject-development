<?php
include_once 'function.php';
session_start();
$edit_cancel = new DB_con();

$borrow_id = $_GET['borrow_id'];

$sql = $edit_cancel->borrow_status_10_11($borrow_id);

if ($sql) {
?>
    <script>
        alert("ดำเนินการสำเร็จ")
        window.open("../s_history.php", "_self")
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