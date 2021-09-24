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
    $creating_task = "INSERT INTO tasks (user_name, email, task_text) VALUES('$user_name', '$email', '$task_text')";
    if (mysqli_query($conn, $creating_task)) {
      echo "<div class='container'>Новая задача добавлена</div>";
    } else {
      echo "Error: " . $creating_task . "<br>" . mysqli_error($conn);
    }
  }

  public function getTaskById($conn, $task_id){
    $query = "SELECT * FROM tasks WHERE id = '$task_id'";
    $task_query_result = mysqli_query($conn, $query);
    if ($task_query_result == false) {
      print("Такая задача не существует");
    }
    $task = mysqli_fetch_all($task_query_result, MYSQLI_ASSOC);
    return $task;
  }

  public function update($conn, $task_id, $user_name, $email, $task_text){
    $updating_task = "UPDATE tasks SET user_name='$user_name', email='$email', task_text='$task_text' WHERE id = '$task_id'";
    if (mysqli_query($conn, $updating_task)) {
      echo "<div class='container'>Задача изменена</div>";
    } else {
      echo "Error: " . $updating_task . "<br>" . mysqli_error($conn);
    }
  }


  public function complete($conn, $task_id){
    $updating_task = "UPDATE tasks SET status=true WHERE id = '$task_id'";
    if (mysqli_query($conn, $updating_task)) {
      echo "<div class='container'>Задача выполнена</div>";
    } else {
      echo "Error: " . $updating_task . "<br>" . mysqli_error($conn);
    }
  }

}



?>
