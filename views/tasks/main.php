<?php

$sortby = $_GET['sort'] ? $_GET['sort'] : 'user_name';
include 'functions/sort.php';
$all_tasks = array_sort($all_tasks, $sortby, SORT_ASC);

$pagination_size = 3;
$pagination_array_length = count($all_tasks);
$pagination_start = $_GET['pagination_start'] ? $_GET['pagination_start'] : 0;
$tasks = array_slice($all_tasks, $pagination_start, $pagination_size);
?>


<div class="container mt-4">
    <h1>Приложение-задачник</h1>
    <?php if ($_SESSION["isAdmin"]): ?>
        <h4 class="text-success">Добро пожаловать, Администратор!</h4>
    <?php endif;?>
    <a href="?controller=main&action=create" class="btn btn-primary  mt-2">Создать задачу</a>
    <h4 class="mt-2">Все задачи</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
            <th scope="col">№</th>
            <th scope="col">Пользователь <a href="?controller=main&action=index&sort=user_name">Сортировать</a> </th>
            <th scope="col">Email <a href="?controller=main&action=index&sort=email">Сортировать</a></th>
            <th scope="col">Статус <a href="?controller=main&action=index&sort=status">Сортировать</a></th>
            <th scope="col">Текст</th>
            <?php if ($_SESSION["isAdmin"]): ?>
                <th scope="col">Редактировать</th>
                <th scope="col">Выполнить</th>
            <?php endif;?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($tasks as $key=>$task): ?>
            <tr>
                <th scope="row"><?= $key+1 ?></th>
                <td><?= $task['user_name'] ?></td>
                <td><?= $task['email'] ?></td>
                <td><?= $task['status'] ? '<p class="text-success">Выполнено<p>' : '<p class="text-danger">Не выполнено</p>' ?></td>
                <td><?= $task['task_text'] ?></td>
                <?php if ($_SESSION["isAdmin"]): ?>
                    <td>
                        <a href="?controller=admin&action=edit&task=<?= $task['id']; ?>" class="btn btn-info">
                            Редактировать
                        </a>
                    </td>
                    <?php if (!$task['status']):?>
                    <td>
                        <a href="?controller=admin&action=complete&task=<?= $task['id']; ?>" class="btn btn-success">
                            Завершить
                        </button>
                    </td>
                    <?php endif;?>
                <?php endif;?>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <nav aria-label="...">
        <ul class="pagination">
            <li class="page-item <?php if($pagination_start-3 < 0 ): echo 'disabled'; ?>  <?php endif; ?>">
                <a class="page-link" href="?controller=main&action=index&sort=<?=$sortby ?>&pagination_start=<?=$pagination_start-3 ?>">Предыдущая</a>
            </li>
            <?php for ($i=0, $key = 1; $i < $pagination_array_length; $i+=3, $key++) { ?>
                <li class="page-item <?php if($pagination_start == $i): echo 'active'; ?>  <?php endif; ?>">
                    <a class="page-link" href="?controller=main&action=index&sort=<?=$sortby ?>&pagination_start=<?=$i ?>">
                        <?= $key; ?>
                    </a>
                </li>
           <?php }?>
            <li class="page-item <?php if($pagination_start+4 > count($all_tasks)): echo 'disabled'; ?>  <?php endif; ?>">
                <a class="page-link"  href="?controller=main&action=index&sort=<?=$sortby ?>&pagination_start=<?=$pagination_start+3 ?>">Следующая</a>
            </li>
        </ul>
    </nav>
</div>