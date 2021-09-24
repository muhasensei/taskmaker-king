<div class="container mt-5">
        <h1>Приложение-задачник</h1>
        <h4>Все задачи</h4>
        <a href="?controller=main&action=create" class="btn btn-primary">Создать задачу</a>
        <table class="table">
        <thead>
            <tr>
            <th scope="col">№</th>
            <th scope="col">Пользователь</th>
            <th scope="col">Email</th>
            <th scope="col">Текст</th>
            <th scope="col">Статус</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($all_tasks as $key=>$task): ?>
            <tr>
                <th scope="row"><?= $key+1 ?></th>
                <td><?= $task['user_name'] ?></td>
                <td><?= $task['email'] ?></td>
                <td><?= $task['task_text'] ?></td>
                <td><?= $task['status'] ? 'Выполнено' : 'Не выполнено' ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
        </table>
    </div>