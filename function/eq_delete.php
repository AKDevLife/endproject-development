<?php
include_once 'function.php';
$eq_delete = new DB_con();
$eq_id_image_fetch = new DB_con();

$eq_id = $_GET['eq_id'];
$image_fetch = $eq_id_image_fetch->eq_id_image_fetch($eq_id);
$i = 1;
$type =mysqli_fetch_array($image_fetch);
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

$sql = $eq_delete->eq_delete($eq_id);

if ($sql&&$delete_image_done) {
    ?>
            <script>
                alert("ลบข้อมูลสำเร็จ")
                window.open("../a_eq_manage.php", "_self")
            </script>
    
        <?php
        } else {
        ?>
            <script>
                alert("ไม่สามารถลบข้อมูลได้")
                window.open("../a_eq_manage.php", "_self")
            </script>
    <?php
        }

?>