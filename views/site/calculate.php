<h2>Подсчет среднего возраста</h2>
<form method="post">
   <div class='midle column border border-5 border-dark center rounded-3 column'>
<input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
   <select name="Subunit_ID">
      <option value="">Все сотрудники</option>
      <?php foreach($subunits as $subunit): ?>
         <option value="<?= $subunit->getId() ?>"><?= $subunit->name ?></option>
      <?php endforeach; ?>
   </select>
   <button>Применить</button>
   <?= $srvozrast ?>
   </div>
   
</form>


