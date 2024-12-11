<?php 
/**
 * @var array $subdivisions 
 */
?>

<h2>Выбор подразделения</h2>
<form method="get" class='d-flex justify-content-center'>
<input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
         <div class='column border border-5 border-dark center rounded-3 column'>
            <label>Подразделение</label>
            <select name="subdivision">
               <?php if (isset($subdivisions)): ?>
                  <?php foreach ($subdivisions as $subdivision): ?>
                     <option value="<?=$subdivision->ID; ?>"><?=$subdivision->name; ?></option>
                  <?php endforeach ?>
               <?php endif; ?>
               
            </select>

            <?php if (isset($employees)): ?>
               <?php foreach($employees as $employee): ?>
                  <div><?=$employee->Name; ?></div>
               <?php endforeach; ?>
            <?php endif; ?>
               
            <button id="subunit_button">Выбор</button>
            <br>
               </div>
</form> 