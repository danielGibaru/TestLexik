
<div class="container">
  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">nom du groupe</th>
        <th scope="col">NOM + Prénom de l’utilisateur</th>
        <th scope="col">email de l’utilisateur</th>
        <th scope="col">#</th>
      </tr>
    </thead>
    <tbody>

      <?php $i=1; ?>
      <?=form_open('Group/remove'); ?>
      <?php foreach ($User as $Users): ?>
        <tr>
          <td><?= $Users['NomGroup'] ?></td>
          <td><?= $Users['Nom']." ".$Users['Prenom'] ?></td>
          <td><?= $Users['Email'] ?></td>
          <td>
            <div class="form-check mb-2 mb-sm-0">
              <input class="form-check-input" type="checkbox" name="IdUser[]" value= "<?= $Users['IdUser'] ?>">
            </div>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div class="row">
    <div class="col-6">
      <a href="http://www.testlexik.my/" class="btn btn-warning btn-lg btn-block">Annulé</a>
    </div>
    <div class="col-6">
      <button type="submit" name="button" class="btn btn-danger btn-block btn-lg">Supprimer</button>

    </div>
  </div>
</div>
