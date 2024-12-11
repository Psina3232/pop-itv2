<h2 style="text-align:center">Регистрация нового пользователя</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
   <div class>
<input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>

   <label><input type="text" name="surname"placeholder="Фамилия"></label>
   <label><input type="text" name="name"placeholder="Имя"></label>
   <label><input type="text" name="patronym" placeholder="Отчество"></label>
   <label><input type="text" name="subunit"placeholder="Подразделение"></label>
   <label><input type="text" name="login"placeholder="Логин"></label>
   <label><input type="password" name="password"placeholder="Пароль"></label>
      <select name="role">
         <option value="">Выберите отдел</option>
         <?php foreach($roles as $role): ?>
            <option value="<?= $role->getId() ?>"><?= $role->name ?></option>
         <?php endforeach; ?>
      </select>
   <button>Зарегистрироваться</button>
         </div>
   
</form>