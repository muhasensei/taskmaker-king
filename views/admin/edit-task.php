<?php
?>


<div class="container mt-5">
    <h3>
    Редактирование задачи
    </h3>
    <form action="?controller=admin&action=update" method="post">
        <input type="hidden" name="task_id" value="<?=$task[0]['id']?>">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Имя пользователя</label>
            <input required type="text" name="user_name" value="<?= $task[0]['user_name'];?>" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input required type="email" name="email" value="<?= $task[0]['email'];?>" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Текст</label>
            <textarea required name="task_text" class="form-control"  id="exampleFormControlTextarea1" rows="1"><?= $task[0]['task_text'];?></textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Изменить</button>
        </div>
    </form>

</div>