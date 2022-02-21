<?php
include_once 'function.php';
session_start();
$eq_id=$_SESSION['eq_id'];
$eq_update = new DB_con();
$eq_id_fetch = new DB_con();

$sql = $eq_id_fetch->eq_id_fetch($eq_id);
$i = 1;
$type =mysqli_fetch_array($sql);

$eq_name = $_POST['eq_name'];
$eq_descriptions = $_POST['eq_descriptions'];
$eq_remain = $_POST['eq_remain'];
$eq_total = $_POST['eq_total'];
$eq_typeid = $_POST['eq_typeid'];

if ($_FILES["eq_image"]["name"] != "") {

    switch($type['eq_typeid']){
        case '1':
            $filename = "../photo_equipment/IC Digital/" . $type['eq_image'];
        break;
    
        case '2':
            $filename = "../photo_equipment/Controller and Electronic/" . $type['eq_image'];
        break;
    
        case '3':
            $filename = "../photo_equipment/ตัวเก็บประจุ/" . $type['eq_image'];
        break;
    
        case '4':
            $filename = "../photo_equipment/ขดลวดเหนี่ยวนำ (L)/" . $type['eq_image'];
        break;
    
        case '5':
            $filename = "../photo_equipment/โมดูลเซ็นเซอร์/" . $type['eq_image'];
        break;
    
        case '6':
            $filename = "../photo_equipment/Embedded Boards/" . $type['eq_image'];
        break;
    
        case '7':
            $filename = "../photo_equipment/LED/" . $type['eq_image'];
        break;
    
        case '8':
            $filename = "../photo_equipment/โมดูลจอ LCD/" . $type['eq_image'];
        break;
    
        case '9':
            $filename = "../photo_equipment/ครุภัณฑ์/" . $type['eq_image'];
        break;
    
        case '10':
            $filename = "../photo_equipment/อุปกรณ์อื่นๆ/" . $type['eq_image'];
        break;        
        }
    echo $filename;
    $delete_image_done = unlink($filename);
    
    $numrand = (mt_rand());
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
    $sql = $eq_update->eq_update_image($eq_name, $eq_typeid, $eq_descriptions, $eq_image, $eq_remain, $eq_total, $eq_id);
    if ($sql) {
?>
        <script>
            alert("แก้ไขข้อมูลสำเร็จ")
            window.open("../a_eq_manage.php", "_self")
        </script>

    <?php
    } else {
    ?>
        <script>
            alert("แก้ไขข้อมูลไม่สำเร็จ")
            window.open("../a_eq_edit.php", "_self")
        </script>
<?php
    }
}else{
    $sql = $eq_update->eq_update($eq_name, $eq_typeid, $eq_descriptions, $eq_remain, $eq_total, $eq_id);
    if ($sql) {
        ?>
                <script>
                    alert("แก้ไขข้อมูลสำเร็จ")
                    window.open("../a_eq_manage.php", "_self")
                </script>
        
            <?php
            } else {
            ?>
                <script>
                    alert("แก้ไขข้อมูลไม่สำเร็จ")
                    window.open("../a_eq_edit.php", "_self")
                </script>
        <?php
            }
}
?>