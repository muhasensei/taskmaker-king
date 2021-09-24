<div class="container mt-5">
    <h3>
    Войти как Администратор
    </h3>
    <form action="?controller=admin&action=auth" method="post">
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Имя пользователя</label>
            <input type="text" name="username" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Пароль</label>
            <input type="password" name="password" class="form-control" id="exampleFormControlInput1">
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-success">Войти</button>
        </div>
    </form>

</div>