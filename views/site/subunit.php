<h2 style="text-align:center">Добавление состава</h2>
<h3><?= $message ?? ''; ?></h3>
<form method="post">
   <div class='column border border-5 border-dark center rounded-3 column'>
       <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
<label> Название состава:<input type="text" name="Name"></label>
   <button>Добавить состав</button>
</div>
   
</form>