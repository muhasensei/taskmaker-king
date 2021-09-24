<div class="container mt-5">
    <h3>
    Создание задачи
    </h3>
    <form action="?controller=main&action=store" method="post">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Имя пользователя</label>
            <input type="text" name="user_name" class="form-control" id="exampleFormControlInput1" placeholder="Мухит">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Текст</label>
            <textarea name="task_text" class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Создать</button>
        </div>
    </form>

</div>