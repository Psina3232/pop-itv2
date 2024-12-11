<!-- <h2 style="text-align:center">Добавление подразделения</h2>

<?php if (!empty($errorMessage)): ?>
    <div style="color: red; text-align: center; margin-bottom: 10px;">
        <?= htmlspecialchars($errorMessage) ?>
    </div>
<?php endif; ?>

<form method="post" class="add_department center">
    <div class="column border border-5 border-dark center rounded-3">
        <input name="csrf_token" type="hidden" value="<?= app()->auth::generateCSRF() ?>"/>
        <label> Название:</label>
        <label><input type="text" name="name" required></label>
        <button>Добавить подразделение</button>
    </div>
</form> -->
