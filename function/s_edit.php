<?php
include_once 'function.php';
session_start();
$s_id=$_SESSION['s_id'];
$updatedata = new DB_con();
$s_info = new DB_con();

$s_fetch_info = $s_info->s_fetch($s_id);
$i = 1;
$row =mysqli_fetch_array($s_fetch_info);

$s_user = $_POST['s_user'];
$s_firstname = $_POST['s_firstname'];
$s_lastname = $_POST['s_lastname'];
$s_email = $_POST['s_email'];
$s_phone = $_POST['s_phone'];

if ($_FILES["s_image"]["name"] != "") {

    $filename = "../photo_student/" . $row['s_image'];
    $delete_image_done = unlink($filename);
    $numrand = (mt_rand());
    $type = strrchr($_FILES['s_image']['name'], ".");
    $s_image = $numrand . $type;
        move_uploaded_file($_FILES['s_image']['tmp_name'], "../photo_student/" . $s_image);
    $sql = $updatedata->s_update_image($s_firstname, $s_lastname, $s_user, $s_phone, $s_email, $s_image, $s_id);
    if ($sql) {
?>
        <script>
            alert("แก้ไขข้อมูลสำเร็จ")
            window.open("../s_info.php", "_self")
        </script>

    <?php
    } else {
    ?>
        <script>
            alert("แก้ไขข้อมูลไม่สำเร็จ")
            window.open("../s_edit_info.php", "_self")
        </script>
<?php
    }
}
else{
    $sql = $updatedata->s_update($s_firstname, $s_lastname, $s_user, $s_phone, $s_email, $s_id);
    if ($sql) {
        ?>
                <script>
                    alert("แก้ไขข้อมูลสำเร็จ")
                    window.open("../s_info.php", "_self")
                </script>
        
            <?php
            } else {
            ?>
                <script>
                    alert("แก้ไขข้อมูลไม่สำเร็จ")
                    window.open("../s_edit_info.php", "_self")
                </script>
        <?php
            }
}
?>