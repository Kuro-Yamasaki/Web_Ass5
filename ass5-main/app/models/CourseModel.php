<?php
class CourseModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    //รายวิชา
    public function getAllCourses() {
        $stmt = $this->db->prepare("SELECT * FROM courses");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //ข้อมูลนักเรียน
    public function getMyCourses($user_id) {
        $stmt = $this->db->prepare("
            SELECT c.id, c.course_code, c.course_name, c.instructor, r.created_at 
            FROM registrations r
            JOIN courses c ON r.course_id = c.id
            WHERE r.user_id = ?
        ");
        $stmt->execute([$user_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //ถอนรายวิชา
    public function withdraw($user_id, $course_id) {
        $stmt = $this->db->prepare("DELETE FROM registrations WHERE user_id = ? AND course_id = ?");
        return $stmt->execute([$user_id, $course_id]);
    }

    //ลงทะเบียน
    public function register($user_id, $course_id) {
        $check = $this->db->prepare("SELECT id FROM registrations WHERE user_id = ? AND course_id = ?");
        $check->execute([$user_id, $course_id]);
        if($check->rowCount() > 0) {
            return false;
        }
        $stmt = $this->db->prepare("INSERT INTO registrations (user_id, course_id) VALUES (?, ?)");
        return $stmt->execute([$user_id, $course_id]);
    }
    public function addCourse($course_code, $course_name, $instructor) {
        // เช็คก่อนว่ามีรหัสวิชานี้ในระบบหรือยัง
        $check = $this->db->prepare("SELECT id FROM courses WHERE course_code = ?");
        $check->execute([$course_code]);
        if($check->rowCount() > 0) {
            return false; // ถ้ารหัสซ้ำ คืนค่า false
        }
        
        // ถ้าไม่ซ้ำ ให้เพิ่มข้อมูลลงตาราง courses
        $stmt = $this->db->prepare("INSERT INTO courses (course_code, course_name, instructor) VALUES (?, ?, ?)");
        return $stmt->execute([$course_code, $course_name, $instructor]);
    }
}
?>