<h2>Добавление нового сотрудника отдела</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post" class='add_employees center' >
   <div class='column border border-5 border-dark center rounded-3 column'>
<input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
   <label><input type="text" name="login"placeholder="Логин"></label>
   <label><input type="password" name="password"placeholder="Пароль"></label>
   <button>Добавить сотрудника отдела</button>
</div>
   
</form> 