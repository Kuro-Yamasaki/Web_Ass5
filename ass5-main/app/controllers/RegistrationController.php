<?php
class RegistrationController {
    private $model;

    public function __construct($db) {
        $this->model = new CourseModel($db);
    }

    public function register() {
        $courseId = $_GET['id'] ?? null;
        if ($courseId) {
            $this->model->register($_SESSION['user_id'], $courseId);
        }
        header("Location: index.php?action=courses");
        exit();
    }

    public function withdraw() {
        $courseId = $_GET['id'] ?? null;
        if ($courseId) {
            $this->model->withdraw($_SESSION['user_id'], $courseId);
        }
        header("Location: index.php?action=profile");
        exit();
    }
}