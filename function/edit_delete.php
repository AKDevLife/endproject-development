<?php
include_once 'function.php';
session_start();
$old_eq_number = new DB_con();
$edit_update = new DB_con();
$edit_delete = new DB_con();

$borrow_id = $_GET['borrow_id'];
$eq_id = $_GET['eq_id'];
$eq_number = $_GET['eq_number'];

$update = $edit_update->edit_update($eq_id, $eq_number);
$delete = $edit_delete->edit_delete($borrow_id, $eq_id);

if ($update && $delete) {
?>
    <script>
        alert("นำอุปกรณ์ออกสำเร็จ")
        window.open("../s_history.php", "_self")
    </script>
<?php
} else {
?>
    <script>
        alert("นำอุปกรณ์ออกไม่สำเร็จ")
    </script>
<?php
}

?>