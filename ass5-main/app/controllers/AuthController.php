<?php
class AuthController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $birthdate = $_POST['birthdate'];
            $phone = $_POST['phone'];

            $sql = "INSERT INTO users (username, password, first_name, last_name, birthdate, phone) 
                    VALUES (?, ?, ?, ?, ?, ?)";
            
            $stmt = $this->db->prepare($sql);
            
            if ($stmt->execute([$username, $password, $first_name, $last_name, $birthdate, $phone])) {
                echo "<script>
                    alert('สมัครสมาชิกสำเร็จ!'); 
                    window.location.href = 'index.php?action=login'; 
                </script>";
                exit();
            }
        }
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password_input = $_POST['password'];

            $stmt = $this->db->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch();

            if ($user && password_verify($password_input, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['first_name'] = $user['first_name']; 
                header("Location: index.php?action=home");
                exit();
            } else {
                echo "<script>alert('ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง!'); window.location='index.php?action=login';</script>";
            }
        }
    }

    public function logout() {
        session_destroy();
        header("Location: index.php?action=login");
        exit();
    }
}
?>