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
            $model = new Task();
            $all_tasks = $model->getAllTasks($conn);
            include 'views/admin/view-tasks.php';
        }

        public function edit($conn){
            $model = new Task();
            $task = $model->getTaskById($conn, $_GET['task']);
            include 'views/admin/edit-task.php';
        }

        public function update($conn){
            $model = new Task();
            $model->update($conn, $_POST['task_id'], $_POST['user_name'], $_POST['email'], $_POST['task_text']);
            $this->index($conn);
        }

        public function complete($conn){
            $model = new Task();
            $model->complete($conn, $_GET['task']);
            $this->index($conn);
        }

    }

    $controller = new AdminController();
    if($_GET['action'] == 'login'){
        $controller->login();
    }else if($_GET['action'] == 'auth'){
        $controller->auth($conn);
    }else if($_GET['action'] == 'logout'){
        $controller->logout();
    }else if($_GET['action'] == 'edit'){
        $controller->edit($conn);
    }else if($_GET['action'] == 'update'){
        $controller->update($conn);
    }else if($_GET['action'] == 'complete'){
        $controller->complete($conn);
    }else{
        $controller->index($conn);
    }
    
?>