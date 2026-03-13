<?php
class CourseController {
    private $model;

    public function __construct($db) {
        $this->model = new CourseModel($db);
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $course_code = $_POST['course_code'];
            $course_name = $_POST['course_name'];
            $instructor = $_POST['instructor'];

            // เรียกใช้ฟังก์ชัน addCourse จาก Model
            if ($this->model->addCourse($course_code, $course_name, $instructor)) {
                echo "<script>
                    alert('เพิ่มรายวิชาใหม่สำเร็จ!'); 
                    window.location.href='index.php?action=courses';
                </script>";
            } else {
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