<?php 
    include 'functions/db_connection.php';
    include 'models/Task.php';

    class MainController{
        public function index($conn){
            $TaskModel = new Task();
            $all_tasks = $TaskModel->getAllTasks($conn);
            include 'views/tasks/main.php';
        }

        public function create(){
            include 'views/tasks/create.php';
        }

        public function store($conn){
            $new_task = new Task();
            $new_task->create($conn, $_POST['user_name'], $_POST['email'], $_POST['task_text']);
            $this->index($conn);
        }
    }

    $controller = new MainController();
    if($_GET['action'] == 'create'){
        $controller->create();
    }else if($_GET['action'] == 'store'){
        $controller->store($conn);
    }else{
        $controller->index($conn);
    }
    
?>