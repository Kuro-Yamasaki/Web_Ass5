<?php
class CourseController {
    private $model;

    // โหลด CourseModel มาใช้งานเช่นกัน
    public function __construct($db) {
        $this->model = new CourseModel($db);
    }

    // ฟังก์ชันทำงานเมื่อกดปุ่ม "บันทึกรายวิชา" จากหน้าฟอร์ม
    public function add() {
        // เช็คก่อนว่ามีการส่งฟอร์มเข้ามาแบบ POST จริงๆ ไม่ได้เข้ามั่วๆ
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // รับข้อมูลที่กรอกมาจากช่องต่างๆ
            $course_code = $_POST['course_code']; // รหัสวิชา
            $course_name = $_POST['course_name']; // ชื่อวิชา
            $instructor = $_POST['instructor'];   // ชื่ออาจารย์ผู้สอน

            // เรียกใช้ฟังก์ชัน addCourse จาก Model เพื่อบันทึกลงตาราง
            if ($this->model->addCourse($course_code, $course_name, $instructor)) {
                // ถ้าบันทึกสำเร็จ (return true): แจ้งเตือน และพาไปหน้ารายวิชา
                echo "<script>
                    alert('เพิ่มรายวิชาใหม่สำเร็จ!'); 
                    window.location.href='index.php?action=courses';
                </script>";
            } else {
                // ถ้าบันทึกไม่สำเร็จ (return false) เช่น รหัสวิชาซ้ำ: ให้แจ้งเตือน และย้อนกลับไปหน้าเดิมที่กรอกค้างไว้
                echo "<script>
                    alert('เกิดข้อผิดพลาด: รหัสวิชานี้มีอยู่ในระบบแล้ว!'); 
                    window.history.back();
                </script>";
            }
            exit();
        }
    }
}
?>