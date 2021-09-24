<?php

$sortby = $_GET['sort'] ? $_GET['sort'] : 'user_name';
include 'functions/sort.php';
$all_tasks = array_sort($all_tasks, $sortby, SORT_ASC);

$pagination_size = 3;
$pagination_array_length = count($all_tasks);
$pagination_start = $_GET['pagination_start'] ? $_GET['pagination_start'] : 0;
$tasks = array_slice($all_tasks, $pagination_start, $pagination_size);
?>


<div class="container mt-5">
    <h1>Панель Администратора</h1>
    <h4>Все задачи</h4>
    <table class="table">
        <thead>
            <tr>
            <th scope="col">№</th>
            <th scope="col">Пользователь <a href="?controller=admin&action=index&sort=user_name">Сортировать</a> </th>
            <th scope="col">Email <a href="?controller=admin&action=index&sort=email">Сортировать</a></th>
            <th scope="col">Текст</th>
            <th scope="col">Статус <a href="?controller=admin&action=index&sort=status">Сортировать</a></th>
            <th scope="col"></th>
            <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($tasks as $key=>$task): ?>
            <tr>
                <th scope="row"><?= $key+1 ?></th>
                <td><?= $task['user_name'] ?></td>
                <td><?= $task['email'] ?></td>
                <td><?= $task['task_text'] ?></td>
                <td><?= $task['status'] ? 'Выполнено' : 'Не выполнено' ?></td>
                <td>
                    <button class="btn btn-info">
                        Редактировать
                    </button>
                </td>
                <td>
                    <button class="btn btn-success">
                        Выполнено
                    </button>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <nav aria-label="...">
        <ul class="pagination">
            <li class="page-item <?php if($pagination_start-3 < 0 ): echo 'disabled'; ?>  <?php endif; ?>">
                <a class="page-link" href="?controller=admin&action=index&pagination_start=<?=$pagination_start-3 ?>">Предыдущая</a>
            </li>
            <?php for ($i=0, $key = 1; $i < $pagination_array_length; $i+=3, $key++) { ?>
                <li class="page-item <?php if($pagination_start == $i): echo 'active'; ?>  <?php endif; ?>">
                    <a class="page-link" href="?controller=admin&action=index&pagination_start=<?=$i ?>">
                        <?= $key; ?>
                    </a>
                </li>
           <?php }?>
            <li class="page-item <?php if($pagination_start+3 > count($all_tasks)): echo 'disabled'; ?>  <?php endif; ?>">
                <a class="page-link"  href="?controller=admin&action=index&pagination_start=<?=$pagination_start+3 ?>">Следующая</a>
            </li>
        </ul>
    </nav>
</div>