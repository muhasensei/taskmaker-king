<?php

class Task {
    
    public $id;
    public $email;
    public $user_name;
    public $taks_text;
    public $status;
    
    public function getAllTasks($conn){
        $query = 'SELECT * FROM tasks';
        $tasks_query_result = mysqli_query($conn, $query);
        
        if ($tasks_query_result == false) {
          print("Произошла ошибка при выполнении запроса");
        }
        $tasks = mysqli_fetch_all($tasks_query_result, MYSQLI_ASSOC);
        return $tasks;
    }

    public function create($conn, $user_name, $email, $task_text){
      $creating_tasks = "INSERT INTO tasks (user_name, email, task_text) VALUES('$user_name', '$email', '$task_text')";
      if (mysqli_query($conn, $creating_tasks)) {
        echo "<div class='container'>Новая задача добавлена</div>";
      } else {
        echo "Error: " . $creating_tasks . "<br>" . mysqli_error($conn);
      }
  }
}



?>
