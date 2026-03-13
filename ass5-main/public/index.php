<?php
session_start();
require_once "../config/database.php";
require_once "../app/models/CourseModel.php";
require_once "../app/controllers/AuthController.php";
require_once "../app/controllers/RegistrationController.php";
require_once "../app/controllers/CourseController.php";

$action = $_GET['action'] ?? 'login';
$db = (new Database())->getConnection();

//กำหนดรายชื่อที่ต้องล็อกอินก่อน 
$protected_routes = ['home', 'profile', 'courses', 'register', 'withdraw', 'add_course', 'doAddCourse'];

//ถ้ายังไม่login ให้ไปlogin
if (in_array($action, $protected_routes) && !isset($_SESSION['user_id'])) {

    header("Location: index.php?action=login");
    exit();
}

//ป้องกันคนล็อกอินแล้ว กดเข้าหน้าล็อกอิน
$guest_routes = ['login', 'register_user'];
if (in_array($action, $guest_routes) && isset($_SESSION['user_id'])) {
    header("Location: index.php?action=home");
    exit();
}

switch ($action) {
    case 'login':
        include "../app/view/login.php";
        break;
    case 'doLogin':
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
        $courseModel = new CourseModel($db);
        $my_courses = $courseModel->getMyCourses($_SESSION['user_id']);
        include "../app/view/profile.php";
        break;
    case 'courses':
        $courseModel = new CourseModel($db);
        $courses = $courseModel->getAllCourses();
        $my_courses = $courseModel->getMyCourses($_SESSION['user_id']);
        include "../app/view/courses.php";
        break;
    case 'register':
        (new RegistrationController($db))->register();
        break;
    case 'withdraw':
        (new RegistrationController($db))->withdraw();
        break;
    case 'add_course':
        include "../app/view/add_course.php";
        break;
    case 'doAddCourse':
        $courseController = new CourseController($db);
        $courseController->add();
        break;
    default:
        header("Location: index.php?action=login");
        break;
}
