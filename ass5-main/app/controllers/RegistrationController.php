<?php
class RegistrationController {
    private $model;

    // เมื่อเริ่มใช้งาน จะโหลด CourseModel เพื่อใช้สำหรับคุยกับฐานข้อมูล
    public function __construct($db) {
        $this->model = new CourseModel($db);
    }

    // ฟังก์ชันทำงานเมื่อนักเรียนกดปุ่ม "ลงทะเบียนเรียน"
    public function register() {
        // รับไอดีของวิชาที่ส่งมาทาง URL (เช่น index.php?action=register&id=5)
        $courseId = $_GET['id'] ?? null;
        
        if ($courseId) {
            // เรียกฟังก์ชัน register ใน Model โดยส่งไอดีคนล็อกอิน และไอดีวิชาไปบันทึก
            $this->model->register($_SESSION['user_id'], $courseId);
        }
        
        // เสร็จแล้ว เด้งกลับไปที่หน้ารายวิชาทั้งหมด
        header("Location: index.php?action=courses");
        exit();
    }

    // ฟังก์ชันทำงานเมื่อนักเรียนกดปุ่ม "ถอนรายวิชา"
    public function withdraw() {
        // รับไอดีของวิชาที่ต้องการถอนจาก URL
        $courseId = $_GET['id'] ?? null;
        
        if ($courseId) {
            // เรียกฟังก์ชัน withdraw ใน Model เพื่อลบข้อมูลออกจากระบบ
            $this->model->withdraw($_SESSION['user_id'], $courseId);
        }
        
        // เสร็จแล้ว เด้งกลับไปที่หน้าข้อมูลส่วนตัว (Profile) เพื่อดูผลลัพธ์
        header("Location: index.php?action=profile");
        exit();
    }
}
?>