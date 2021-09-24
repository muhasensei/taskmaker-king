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
                echo '<script type="text/javascript">
                    window.location = "/"
                </script>';
            }else{
                echo '<div class="container text-danger">Ошибка, неправилные данные</div>';
                $this->login();
            }
        }

        public function logout(){
            session_unset();
            echo '<script type="text/javascript">
                    window.location = "/"
                </script>';
        }


        public function edit($conn){
            $model = new Task();
            $task = $model->getTaskById($conn, $_GET['task']);
            include 'views/admin/edit-task.php';
        }

        public function update($conn){
            $model = new Task();
            $model->update($conn, $_POST['task_id'], $_POST['user_name'], $_POST['email'], $_POST['task_text']);
            echo '<script type="text/javascript">
                    window.location = "/"
                </script>';
        }

        public function complete($conn){
            $model = new Task();
            $model->complete($conn, $_GET['task']);
            echo '<script type="text/javascript">
            window.location = "/"
        </script>';
        }

    }

    $controller = new AdminController();
    if($_GET['action'] == 'login'){
        $controller->login();
    }else if($_GET['action'] == 'auth'){
        $controller->auth($conn);
    }else if($_GET['action'] == 'logout' && $_SESSION["isAdmin"]){
        $controller->logout();
    }else if($_GET['action'] == 'edit' && $_SESSION["isAdmin"]){
        $controller->edit($conn);
    }else if($_GET['action'] == 'update' && $_SESSION["isAdmin"]){
        $controller->update($conn);
    }else if($_GET['action'] == 'complete' && $_SESSION["isAdmin"]){
        $controller->complete($conn);
    }else{
        echo '<script type="text/javascript">
            window.location = "/"
            alert("Ограниченный доступ")
        </script>';
    }
    
?>