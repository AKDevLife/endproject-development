<?php
include_once 'function.php';

$insertdata = new DB_con();

if (isset($_POST['register'])) {
    $s_user = $_POST['s_user'];
    $s_password = md5($_POST['s_password']);
    $s_firstname = $_POST['s_firstname'];
    $s_lastname = $_POST['s_lastname'];
    $s_phone = $_POST['s_phone'];
    $s_email = $_POST['s_email'];
    $p_id = $_POST['p_id'];

    $numrand = (mt_rand());
    $upload = $_FILES['s_image'];
    $type = strrchr($_FILES['s_image']['name'], ".");
    $s_image = $numrand . $type;
    move_uploaded_file($_FILES['s_image']['tmp_name'], "../photo_student/" . $s_image);


    $sql = $insertdata->student_insert($s_user, $s_password, $s_firstname, $s_lastname, $s_phone, $s_email, $s_image, $p_id);
    if ($sql) {
?>
        <script>
            alert("เพิ่มข้อมูลสำเร็จ")
            window.open("../index.php", "_self")
        </script>

    <?php
    } else {
    ?>
        <script>
            alert("เพิ่มข้อมูลไม่สำเร็จ")
            window.open("../register_form.php", "_self")
        </script>
<?php
    }
}
?>