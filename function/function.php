<?php
//กำหนดค่า server
define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'end_project');

//สร้างคลาส ไว้เก็บฟังก์ชั่นที่ใช้กับฐานข้อมูล
class DB_con
{
    //ฟังก์ชั่นเชื่อมต่อฐานข้อมูลเมื่อมีการเริ่มใช้งาน
    public function __construct()
    {
        $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
        $this->dbcon = $conn;
        //ฟังก์ชั่น return ค่า Error และแสดงจุดที่ Error
        if (mysqli_connect_errno()) {
            echo "Failed to connect to MySQL : " . mysqli_connect_error();
        }
    }

//? ******************************  ฟังก์ชั่น ล็อกอิน ******************************************
    //ฟังก์ชั่น login_Admin
    public function a_login($User, $Password)
    {
        $result = mysqli_query($this->dbcon, "SELECT a_id, a_user FROM tb_admin WHERE a_user = '$User' AND a_password = '$Password'");
        return $result;
    }
    //ฟังก์ชั่น login_Endoser
    public function e_login($User, $Password)
    {
        $result = mysqli_query($this->dbcon, "SELECT e_id, e_user FROM tb_endoser WHERE e_user = '$User' AND e_password = '$Password'");
        return $result;
    }
    //ฟังก์ชั่น login_Professor
    public function p_login($User, $Password)
    {
        $result = mysqli_query($this->dbcon, "SELECT p_id, p_user FROM tb_professor WHERE p_user = '$User' AND p_password = '$Password'");
        return $result;
    }
    //ฟังก์ชั่น login_Student
    public function s_login($User, $Password)
    {
        $result = mysqli_query($this->dbcon, "SELECT s_id, s_user FROM tb_student WHERE s_user = '$User' AND s_password = '$Password'");
        return $result;
    }
    
//? ******************************  ฟังก์ชั่น เพิ่มข้อมูล ******************************************
    //ฟังก์ชั่น Insert_Admin 
    public function admin_insert($a_user, $a_password, $a_firstname, $a_lastname, $a_email)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO tb_admin(a_user, a_password, a_firstname, a_lastname, a_email) VALUES('$a_user', '$a_password', '$a_firstname', '$a_lastname', '$a_email')");
        return $result;
    }
    //ฟังก์ชั่น Insert_Endoser
    public function endoser_insert($e_user, $e_password, $e_firstname, $e_lastname, $e_email)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO tb_endoser(e_user, e_password, e_firstname, e_lastname, e_email) VALUES('$e_user', '$e_password', '$e_firstname', '$e_lastname', '$e_email')");
        return $result;
    }
    //ฟังก์ชั่น Insert_Professor
    public function professor_insert($p_user, $p_password, $p_firstname, $p_lastname, $p_email)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO tb_professor(p_user, p_password, p_firstname, p_lastname, p_email) VALUES('$p_user', '$p_password', '$p_firstname', '$p_lastname', '$p_email')");
        return $result;
    }
    //ฟังก์ชั่น Insert_Student
    public function student_insert($s_user, $s_password, $s_firstname, $s_lastname, $s_phone, $s_email , $s_image, $p_id)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO tb_student(s_user, s_password, s_firstname, s_lastname, s_phone, s_email , s_image, p_id) VALUES('$s_user', '$s_password', '$s_firstname', '$s_lastname', '$s_phone', '$s_email', '$s_image', '$p_id')");
        return $result;
    }
    //ฟังก์ชั่น Insert_Equipment  
    public function eq_insert($eq_name, $eq_typeid, $eq_descriptions, $eq_image, $eq_remain, $eq_total)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO tb_equipment(eq_name, eq_typeid, eq_descriptions, eq_image, eq_remain, eq_total) VALUES('$eq_name','$eq_typeid', '$eq_descriptions', '$eq_image', '$eq_remain', '$eq_total')");
        return $result;
    }
    //ฟังก์ชั่น Insert_Equipment_borrow 
    public function eq_borrow_insert($borrow_id, $s_user, $eq_id , $eq_number, $FromDate, $ToDate, $Descriptions)
    {
        $result = mysqli_query($this->dbcon, "INSERT INTO tb_eq_borrow(borrow_id, s_user, eq_id, eq_number, FromDate, ToDate, Descriptions ) VALUES('$borrow_id','$s_user','$eq_id', '$eq_number', '$FromDate', '$ToDate', '$Descriptions')");
        return $result;
    }
    
//? ******************************  ฟังก์ชั่น อ่านข้อมูล ******************************************
    //ฟังก์ชั่นการอ่านข้อมูลอุปกรณ์ทั้งหมด
    public function eq_fetch()
    {
        $result = mysqli_query($this->dbcon, "SELECT a.eq_id, a.eq_name, a.eq_descriptions, a.eq_image, a.eq_remain, b.eq_typeid, b.eq_typename FROM tb_equipment a, tb_eq_type b WHERE a.eq_typeid=b.eq_typeid");
        return $result;
    }
    //ฟังก์ชั่นการอ่านข้อมูลหมวดหมู่อุปกรณ์
    public function eq_type_fetch()
    {
        $result = mysqli_query($this->dbcon, "SELECT eq_typeid, eq_typename FROM tb_eq_type");
        return $result;
    }
    //ฟังก์ชั่นการอ่านข้อมูลอุปกรณ์ทั้งหมดตาม id
    public function eq_id_fetch($eq_id)
    {
        $result = mysqli_query($this->dbcon, "SELECT a.eq_id, a.eq_name, a.eq_descriptions, a.eq_image, a.eq_remain, a.eq_total, b.eq_typeid, b.eq_typename FROM tb_equipment a, tb_eq_type b WHERE a.eq_typeid=b.eq_typeid AND a.eq_id='$eq_id'");
        return $result;
    }
    //ฟังก์ชั่นการอ่านข้อมูลอุปกรณ์เฉพาะรูปตาม id
    public function eq_id_image_fetch($eq_id)
    {
        $result = mysqli_query($this->dbcon, "SELECT eq_typeid,eq_image FROM tb_equipment WHERE eq_id = '$eq_id'");
        return $result;
    }
    //ฟังก์ชั่นการอ่านข้อมูลนักศึกษาโดยมีการเชื่อมรหัสอ.ที่ปรึกษา (p_id)
    public function s_fetch($s_id)
    {
        $result = mysqli_query($this->dbcon, "SELECT a.s_id, a.s_firstname, a.s_lastname, a.s_user, a.s_phone, a.s_email, a.s_image, b.p_id, b.p_firstname, b.p_lastname, b.p_email  FROM tb_student a, tb_professor b WHERE a.p_id=b.p_id AND a.s_id = '$s_id'");
        return $result;
    }

//? ******************************  ฟังก์ชัน ค้นหาอุปกรณ์ ******************************************
    //ฟังก์ชั่นการอ่านข้อมูลอุปกรณ์ตามชนิด
    public function eq_t_fetch($typeid)
    {
        $result = mysqli_query($this->dbcon, "SELECT a.eq_id, a.eq_name, a.eq_descriptions, a.eq_image, a.eq_remain, b.eq_typeid, b.eq_typename FROM tb_equipment a, tb_eq_type b WHERE $typeid=a.eq_typeid AND $typeid=b.eq_typeid");
        return $result;
    }
    //ฟังก์ชั่นการอ่านข้อมูลอุปกรณ์ตามชื่อ
    public function eq_s_fetch($n)
    {
        $result = mysqli_query($this->dbcon, "SELECT a.eq_id, a.eq_name, a.eq_descriptions, a.eq_image, a.eq_remain, b.eq_typeid, b.eq_typename FROM tb_equipment a, tb_eq_type b WHERE eq_name LIKE '%$n%'AND a.eq_typeid=b.eq_typeid");
        return $result;
    }

//? ******************************  ฟังก์ชั่น อ่านข้อมูลตารางการยืม ******************************************
    //ฟังก์ชั่นการอ่านข้อมูลตาราง eq_borrow ตามรหัสนักศึกษา และเรียง Status จากน้อยไปมาก 
    public function eq_borrow_suser_fetch($s_user)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM tb_eq_borrow WHERE s_user = '$s_user' GROUP BY borrow_id ORDER BY Status");
        return $result;
    }
    //ฟังก์ชั่นการอ่านข้อมูลตาราง eq_borrow ตามรหัสการยืม
    public function eq_borrow_id_fetch($borrow_id)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM tb_eq_borrow WHERE borrow_id = '$borrow_id' ");
        return $result;
    }
    //ฟังก์ชั่นการอ่านวันที่คืนอุปกรณ์
    public function setback($borrow_id)
    {
        $result = mysqli_query($this->dbcon, "SELECT ToDate FROM tb_eq_borrow WHERE borrow_id = '$borrow_id' GROUP BY borrow_id");
        return $result;
    }
    //ฟังก์ชั่นอ่านตารางขอยืมตามรหัสนักศึกษาที่ Status 1 คืออยุ่ระหว่างดำเนินการ
    public function eq_borrow_1_fetch($s_user)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM tb_eq_borrow WHERE s_user = '$s_user' AND Status = '1' GROUP BY borrow_id ORDER BY id");
        return $result;
    }
    //ฟังก์ชั่นอ่านข้อมูลตารางการยืมโดยแสดงเฉพาะที่สถานะเป็น 2 คืออ.ที่ปรึกษาอนุมัติ ผ่าน
    public function eq_borrow_2_fetch()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM tb_eq_borrow WHERE Status = '2' GROUP BY borrow_id ORDER BY id");
        return $result;
    }
    //ฟังก์ชั่นอ่านข้อมูลตารางการยืมโดยแสดงเฉพาะที่สถานะเป็น 4 คืออ.หัวหน้า ผ่าน
    public function eq_borrow_4_fetch()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM tb_eq_borrow WHERE Status = '4' GROUP BY borrow_id ORDER BY id");
        return $result;
    }
    //ฟังก์ชั่นอ่านข้อมูลตารางการยืมโดยแสดงเฉพาะที่สถานะเป็น 4 คืออ.หัวหน้า ผ่าน
    public function eq_borrow_6_fetch()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM tb_eq_borrow WHERE Status = '6' GROUP BY borrow_id ORDER BY id");
        return $result;
    }

//? ******************************  ฟังก์ชั่น อ่านข้อมูลตาราง อ.ที่ปรึกษา ***************************************
    //ฟังก์ชั่นการอ่านข้อมูลตาราง tb_professor ทั้งหมด
    public function p_id_fetch()
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM tb_professor");
        return $result;
    }

//? ******************************  ฟังก์ชั่น อ่านข้อมูลตาราง นักศึกษา ******************************************
    //ฟังก์ชันหารหัสนักศึกษาตามอ.ที่ปรึกษา
    public function s_user_p_id_fetch($p_id)
    {
        $result = mysqli_query($this->dbcon, "SELECT s_user, s_firstname, s_lastname FROM tb_student WHERE p_id = '$p_id'");
        return $result;
    }
    //ฟังก์ชันหาชื่อนักศึกษาตามรหัสนักศึกษา
    public function s_name_s_user_fetch($s_user)
    {
        $result = mysqli_query($this->dbcon, "SELECT s_user, s_firstname, s_lastname, s_email FROM tb_student WHERE s_user = '$s_user'");
        return $result;
    }

//? ******************************  ฟังก์ชั่น อัปเดตข้อมูลอุปกรณ์ ******************************************
    //ฟังก์ชั่นอัปเดตข้อมูลอุปกรณ์แบบไม่มีรูป
    public function eq_update($eq_name, $eq_typeid, $eq_descriptions, $eq_remain, $eq_total, $eq_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE tb_equipment SET
            eq_name = '$eq_name',
            eq_typeid = '$eq_typeid',
            eq_descriptions = '$eq_descriptions',
            eq_remain = '$eq_remain',
            eq_total = '$eq_total'
            WHERE eq_id = '$eq_id'");
        return $result;
    }
    //ฟังก์ชั่นอัปเดตข้อมูลอุปกรณ์แบบมีรูป
    public function eq_update_image($eq_name, $eq_typeid, $eq_descriptions, $eq_image, $eq_remain, $eq_total, $eq_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE tb_equipment SET
            eq_name = '$eq_name',
            eq_typeid = '$eq_typeid',
            eq_descriptions = '$eq_descriptions',
            eq_image = '$eq_image',
            eq_remain = '$eq_remain',
            eq_total = '$eq_total'
            WHERE eq_id = '$eq_id'");
        return $result;
    }
    //ฟังก์ชั่นอัปเดตข้อมูลจำนวนคงเหลืออุปกรณ์
    public function eq_update_remain($eq_remain,$eq_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE tb_equipment SET
            eq_remain = '$eq_remain'
            WHERE eq_id = '$eq_id'");
        return $result;
    }

//? ******************************  ฟังก์ชั่น อัปเดตข้อมูลนักศึกษา ******************************************
    //ฟังก์ชั่นอัปเดตข้อมูลนักศึกษาแบบมีรูป
    public function s_update_image($s_firstname, $s_lastname, $s_user, $s_phone, $s_email, $s_image, $s_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE tb_student SET
            s_firstname = '$s_firstname',
            s_lastname = '$s_lastname',
            s_user = '$s_user',
            s_phone = '$s_phone',
            s_email = '$s_email',
            s_image = '$s_image'
            WHERE s_id = '$s_id'");
        return $result;
    }
    //ฟังก์ชั่นอัปเดตข้อมูลนักศึกษาแบบไม่มีรูป
    public function s_update($s_firstname, $s_lastname, $s_user, $s_phone, $s_email, $s_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE tb_student SET
            s_firstname = '$s_firstname',
            s_lastname = '$s_lastname',
            s_user = '$s_user',
            s_phone = '$s_phone',
            s_email = '$s_email'
            WHERE s_id = '$s_id'");
        return $result;
    }
    //ฟังก์ชั่นอัปเดตรหัสผ่านนักศึกษา
    public function s_update_pass($s_password, $s_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE tb_student SET
            s_password = '$s_password'
            WHERE s_id = '$s_id'");
        return $result;
    }

//? ******************************  ฟังก์ชั่น อัปเดตสถานะของการยืม ******************************************
    //ฟังก์ชั่นอัปเดตสเตตัสการยืม อ.ที่ปรึกษาอนุมัติ ผ่าน
    public function borrow_status_1_2($borrow_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE tb_eq_borrow SET
            Status = '2'
            WHERE borrow_id = '$borrow_id' AND Status = '1'");
        return $result;
    }
    //ฟังก์ชั่นอัปเดตสเตตัสการยืม อ.ที่ปรึกษาอนุมัติ ไม่ผ่าน
    public function borrow_status_1_3($borrow_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE tb_eq_borrow SET
            Status = '3'
            WHERE borrow_id = '$borrow_id' AND Status = '1'");
        return $result;
    }
    //ฟังก์ชั่นอัปเดตสเตตัสการยืม อ.หัวหน้าอนุมัติ ผ่าน
    public function borrow_status_2_4($borrow_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE tb_eq_borrow SET
            Status = '4'
            WHERE borrow_id = '$borrow_id' AND Status = '2'");
        return $result;
    }
    //ฟังก์ชั่นอัปเดตสเตตัสการยืม อ.หัวหน้าอนุมัติ ไม่ผ่าน
    public function borrow_status_2_5($borrow_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE tb_eq_borrow SET
            Status = '5'
            WHERE borrow_id = '$borrow_id' AND Status = '2'");
        return $result;
    }
    //ฟังก์ชั่นอัปเดตสเตตัสการยืม มารับอุปกรณ์เรียบร้อย
    public function borrow_status_4_6($borrow_id)
    {
        $result = mysqli_query($this->dbcon, "UPDATE tb_eq_borrow SET
            Status = '6'
            WHERE borrow_id = '$borrow_id' AND Status = '4'");
        return $result;
    }

//? ******************************  ฟังก์ชั่น การลบข้อมูล ***************************************************
    //ฟังก์ชันลบข้อมูลอุปกรณ์
    public function eq_delete($eq_id)
    {
        $result = mysqli_query($this->dbcon, "DELETE FROM tb_equipment WHERE eq_id = '$eq_id'");
        return $result;
    }

//? ******************************  ฟังก์ชั่น ทำกราฟ ******************************************
    //ฟังก์ชั่นการอ่านข้อมูลตาราง eq_borrow ตาม Status และเรียง ตามจำนวนจากมากไปน้อย 6 อันดับแรกเดือน
    public function eq_borrow_CMM_fetch($Status, $MY)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM tb_eq_borrow WHERE Status = '$Status' AND DATE_FORMAT(FromDate,'%Y-%m') = '$MY' GROUP BY eq_id ORDER BY eq_number DESC LIMIT 6");
        return $result;
    }
    //ฟังก์ชั่นการอ่านข้อมูลตาราง eq_p_borrow ตาม Status และเรียง ตามจำนวนจากมากไปน้อย 6 อันดับปี
    public function eq_borrow_CMY_fetch($Status, $Y)
    {
        $result = mysqli_query($this->dbcon, "SELECT * FROM tb_eq_borrow WHERE Status = '$Status' AND DATE_FORMAT(FromDate,'%Y') = '$Y' GROUP BY eq_id ORDER BY eq_number DESC LIMIT 6");
        return $result;
    }
    // ฟังก์ชันการหาผลต่างของวัน
    public function duration_day($schedule,$today){
        $remain=intval(strtotime($schedule)-strtotime($today));
        $day=floor($remain/86400);
        return $day;
    }

}
?>

