<?php
class RegistrationController {
    private $model;

    public function __construct($db) {
        $this->model = new CourseModel($db);
    }

    public function register() {
        // รับไอดีของวิชาที่ส่งมาทาง URL 
        $courseId = $_GET['id'] ?? null;
        
        if ($courseId) {
            // เรียกฟังก์ชัน register ใน Model โดยส่งไอดีคนล็อกอิน และไอดีวิชาไปบันทึก
            $this->model->register($_SESSION['user_id'], $courseId);
        }

        header("Location: index.php?action=courses");
        exit();
    }

    public function withdraw() {

        $courseId = $_GET['id'] ?? null;
        
        if ($courseId) {
            // เรียกฟังก์ชัน withdraw ใน Model เพื่อลบข้อมูลออกจากระบบ
            $this->model->withdraw($_SESSION['user_id'], $courseId);
        }

        header("Location: index.php?action=profile");
        exit();
    }
}
?>