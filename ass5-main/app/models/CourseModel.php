<?php
class CourseModel {
    private $db;

    // รับการเชื่อมต่อฐานข้อมูลมาใช้งาน
    public function __construct($db) {
        $this->db = $db;
    }

    // ฟังก์ชันดึงรายวิชาทั้งหมดมาแสดงในหน้า courses
    public function getAllCourses() {
        $stmt = $this->db->prepare("SELECT * FROM courses");
        $stmt->execute(); // สั่งรันคำสั่ง
        return $stmt->fetchAll(PDO::FETCH_ASSOC); // ส่งข้อมูลกลับไปเป็น Array
    }

    // ฟังก์ชันดึงเฉพาะวิชาที่นักเรียนคนนี้ลงทะเบียนไปแล้ว
    public function getMyCourses($user_id) {
        
        $stmt = $this->db->prepare("
            SELECT c.id, c.course_code, c.course_name, c.instructor, r.created_at 
            FROM registrations r
            JOIN courses c ON r.course_id = c.id
            WHERE r.user_id = ?
        ");
        $stmt->execute([$user_id]); // เอาไอดีผู้ใช้ไปแทนที่เครื่องหมาย ? 
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // ฟังก์ชันถอนรายวิชา
    public function withdraw($user_id, $course_id) {
        $stmt = $this->db->prepare("DELETE FROM registrations WHERE user_id = ? AND course_id = ?");
        return $stmt->execute([$user_id, $course_id]); // ลบข้อมูลออกจากฐานข้อมูล
    }

    // ฟังก์ชันลงทะเบียนเรียน
    public function register($user_id, $course_id) {
        // ขั้นที่ 1: เช็คก่อนว่าเคยลงวิชานี้ไปหรือยัง กันการลงเบิ้ล
        $check = $this->db->prepare("SELECT id FROM registrations WHERE user_id = ? AND course_id = ?");
        $check->execute([$user_id, $course_id]);
        if($check->rowCount() > 0) {
            return false; // ถ้าเคยลงแล้ว ยกเลิกการทำงาน
        }
        
        // ขั้นที่ 2: ถ้ายังไม่เคยลง ให้เพิ่มข้อมูลลงตาราง
        $stmt = $this->db->prepare("INSERT INTO registrations (user_id, course_id) VALUES (?, ?)");
        return $stmt->execute([$user_id, $course_id]);
    }

    // เพิ่มรายวิชาใหม่เข้าสู่ระบบ
    public function addCourse($course_code, $course_name, $instructor) {
        // เช็คก่อนว่ามีรหัสวิชานี้ (เช่น CS101) ในระบบหรือยัง กันการสร้างวิชาซ้ำ
        $check = $this->db->prepare("SELECT id FROM courses WHERE course_code = ?");
        $check->execute([$course_code]);
        if($check->rowCount() > 0) {
            return false; // ถ้ารหัสซ้ำ คืนค่า false แล้วให้ Controller ไปแจ้งเตือนต่อ
        }
        
        // ถ้าไม่ซ้ำ ให้เพิ่มข้อมูลลงตาราง courses
        $stmt = $this->db->prepare("INSERT INTO courses (course_code, course_name, instructor) VALUES (?, ?, ?)");
        return $stmt->execute([$course_code, $course_name, $instructor]);
    }
}
?>