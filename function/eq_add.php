<?php
include_once 'function.php';

$eq_insert = new DB_con();

$eq_name = $_POST['eq_name'];
$eq_descriptions = $_POST['eq_descriptions'];
$eq_remain = $_POST['eq_remain'];
$eq_total = $_POST['eq_total'];
$eq_typeid = $_POST['eq_typeid'];

$numrand = (mt_rand());
$upload = $_FILES['eq_image'];
if ($upload != '') {
    $type = strrchr($_FILES['eq_image']['name'], ".");
    $eq_image = $numrand . $type;

    if($eq_typeid == "1"){
        move_uploaded_file($_FILES['eq_image']['tmp_name'], "../photo_equipment/IC Digital/" . $eq_image);
    }
    else if($eq_typeid == "2"){
        move_uploaded_file($_FILES['eq_image']['tmp_name'], "../photo_equipment/Controller and Electronic/" . $eq_image);
    }
    else if($eq_typeid == "3"){
        move_uploaded_file($_FILES['eq_image']['tmp_name'], "../photo_equipment/ตัวเก็บประจุ/" . $eq_image);
    }
    else if($eq_typeid == "4"){
        move_uploaded_file($_FILES['eq_image']['tmp_name'], "../photo_equipment/ขดลวดเหนี่ยวนำ (L)/" . $eq_image);
    }
    else if($eq_typeid == "5"){
        move_uploaded_file($_FILES['eq_image']['tmp_name'], "../photo_equipment/โมดูลเซ็นเซอร์/" . $eq_image);
    }
    else if($eq_typeid == "6"){
        move_uploaded_file($_FILES['eq_image']['tmp_name'], "../photo_equipment/Embedded Boards/" . $eq_image);
    }
    else if($eq_typeid == "7"){
        move_uploaded_file($_FILES['eq_image']['tmp_name'], "../photo_equipment/LED/" . $eq_image);
    }
    else if($eq_typeid == "8"){
        move_uploaded_file($_FILES['eq_image']['tmp_name'], "../photo_equipment/โมดูลจอ LCD/" . $eq_image);
    }
    else if($eq_typeid == "9"){
        move_uploaded_file($_FILES['eq_image']['tmp_name'], "../photo_equipment/ครุภัณฑ์/" . $eq_image);
    }
    else if($eq_typeid == "10"){
        move_uploaded_file($_FILES['eq_image']['tmp_name'], "../photo_equipment/อุปกรณ์อื่นๆ/" . $eq_image);
    }

    $sql = $eq_insert->eq_insert($eq_name, $eq_typeid,$eq_descriptions, $eq_image, $eq_remain, $eq_total);

    if ($sql) {
?>
        <script>
            alert("เพิ่มข้อมูลสำเร็จ")
            window.open("../a_eq_manage.php", "_self")
        </script>

    <?php
    } else {
    ?>
        <script>
            alert("ไม่สามารถบันทึกข้อมูลได้")
            window.open("../a_eq_add.php", "_self")
        </script>
<?php
    }
}
?>