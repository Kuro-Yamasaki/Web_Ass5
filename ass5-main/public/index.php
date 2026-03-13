<?php
session_start();

require_once "../config/database.php";
require_once "../app/models/CourseModel.php";
require_once "../app/controllers/AuthController.php";
require_once "../app/controllers/RegistrationController.php";
require_once "../app/controllers/CourseController.php";


// ถ้าไม่มีการส่งค่ามา ให้ตั้งค่าเริ่มต้นเป็น 'login'
$action = $_GET['action'] ?? 'login';


$db = (new Database())->getConnection();


// กำหนดรายชื่อหน้าที่ "ต้องล็อกอินก่อน" ถึงจะเข้าได้
$protected_routes = ['home', 'profile', 'courses', 'register', 'withdraw', 'add_course', 'doAddCourse'];

// ถ้าพยายามเข้าหน้า protected แต่ไม่มี $_SESSION['user_id'] (ยังไม่ล็อกอิน)
if (in_array($action, $protected_routes) && !isset($_SESSION['user_id'])) {
    header("Location: index.php?action=login");
    exit();
}

// กำหนดรายชื่อหน้าที่ "คนล็อกอินแล้ว ไม่ควรเข้าซ้ำ" (หน้าล็อกอิน/สมัครสมาชิก)
$guest_routes = ['login', 'register_user'];

// ถ้าล็อกอินแล้ว แต่พยายามเข้าหน้า login หรือ register
if (in_array($action, $guest_routes) && isset($_SESSION['user_id'])) {
    header("Location: index.php?action=home");
    exit();
}


// ตรวจสอบว่า action คืออะไร แล้วเรียกใช้ Controller หรือ View ให้ตรงกัน
switch ($action) {
    case 'login':
        include "../app/view/login.php";
        break;

    case 'doLogin':
        // ถ้าฟอร์มล็อกอินกด submit มาที่นี่ ให้สร้าง AuthController และเรียกฟังก์ชัน login()
        $auth = new AuthController($db);
        $auth->login();
        break;

    case 'logout':
        $auth = new AuthController($db);
        $auth->logout();
        break;

    case 'register_user':
        include "../app/view/register_user.php";
        break;

    case 'doRegister':
        $auth = new AuthController($db);
        $auth->register();
        break;

    case 'home':
        include "../app/view/home.php";
        break;

    case 'profile':
        // ก่อนจะแสดงหน้า profile ต้องไปดึงข้อมูลวิชาที่เคยลงทะเบียนมาจาก Model ก่อน
        $courseModel = new CourseModel($db);
        $my_courses = $courseModel->getMyCourses($_SESSION['user_id']);
        include "../app/view/profile.php";
        break;

    case 'courses':
        // ไปดึงรายวิชาทั้งหมด และ วิชาที่เราลงทะเบียนไว้ เพื่อเอาไปแสดงที่หน้า View
        $courseModel = new CourseModel($db);
        $courses = $courseModel->getAllCourses();
        $my_courses = $courseModel->getMyCourses($_SESSION['user_id']);
        include "../app/view/courses.php";
        break;

    case 'register':
        // เมื่อกดลงทะเบียนเรียน จะมาที่นี่เพื่อเรียก Controller ไปบันทึกลงฐานข้อมูล
        (new RegistrationController($db))->register();
        break;

    case 'withdraw':
        // เมื่อกดถอนรายวิชา
        (new RegistrationController($db))->withdraw();
        break;

    case 'add_course':
        // แสดงหน้าฟอร์มเพิ่มวิชาใหม่
        include "../app/view/add_course.php";
        break;

    case 'doAddCourse':
        // รับข้อมูลวิชาใหม่ไปบันทึก
        $courseController = new CourseController($db);
        $courseController->add();
        break;

    default:
        // ถ้าหา action ไม่เจอ ให้กลับไปหน้า login
        header("Location: index.php?action=login");
        break;
}