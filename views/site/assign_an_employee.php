
                <?php foreach($users as $user): ?>
                    <option value="<?= $user->id ?>"><?= $user->name ?></option>
                <?php endforeach; ?>
         
                <?php foreach($subunits as $subunit): ?>
                    <option value="<?= $subunit->id ?>"><?= $subunit->name ?></option>
                <?php endforeach; ?>
           