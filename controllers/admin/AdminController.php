<?php 
    include 'db_connection.php';
    include 'models/Admin.php';
    include 'models/Task.php';


    class AdminController{
        public function login(){
            include 'views/admin/login.php';
        }

        public function auth($conn){
            $user = new Admin();
            if ($user->login($_POST['username'], $_POST['password'])) {
                $_SESSION["isAdmin"] = true;
                $this->index($conn);
            }else{
                echo "Ошибка, неправилные данные";
            }
        }

        public function logout(){
            session_unset();
            $this->login();
        }

        public function index($conn){
            $TaskModel = new Task();
            $all_tasks = $TaskModel->getAllTasks($conn);
            include 'views/admin/view-tasks.php';
        }

    }

    $controller = new AdminController();
    if($_GET['action'] == 'login'){
        $controller->login();
    }else if($_GET['action'] == 'auth'){
        $controller->auth($conn);
    }else if($_GET['action'] == 'logout'){
        $controller->logout();
    }else{
        $controller->index($conn);
    }
    
?>