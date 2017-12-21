<br>
<br>
<br>
<br>
<div class="container">

  <?=form_open('Group/index'); ?>
  <div id="search" class="form-group row">
    <select class="form-control col-3"  name="table">
      <option selected>user</option>
      <option>groupuser</option>
    </select>
      <div class="col-lg-9">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="recherche" aria-label="Search for..." name="Nom">
          <span class="input-group-btn">
            <button class="btn btn-secondary" type="submit">Go!</button>
            <button class="btn btn-danger" type="submit">X</button>
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="col-12">
    <a href="http://www.testlexik.my/index.php/Group/add/" class="btn btn-success btn-lg btn-block">Crée un utilisateur</a>
  </div>
  <br>
  <br>

  <table class="table table-hover">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">nom du groupe</th>
        <th scope="col">NOM + Prénom de l’utilisateur</th>
        <th scope="col">email de l’utilisateur</th>
        <th scope="col">detail</th>
      </tr>
    </thead>
    <tbody>

      <?php $i=1; ?>
      <?php foreach ($result as $results): ?>
        <tr>
          <td><?= '<p>'.$i++.' </p>'?></td>
          <td><?= $results['NomGroup'] ?></td>
          <td><?= $results['Nom']." ".$results['Prenom'] ?></td>
          <td><?= $results['Email'] ?></td>
          <td><button id= "<?= $results['IdUser'] ?>" type="button" class="btn btn-primary">detail</button></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <div class="col-12">
    <a href="http://www.testlexik.my/index.php/Group/remove/" class="btn btn-danger btn-lg btn-block">Supprimer un / des utilisateur(s)</a>
  </div>
  <div id="UserInfo" class="row">

  <?php foreach ($User as $Users): ?>

    <div id="User" class="col-12">
      <div id=<?= '"DisplayUser'.$Users['IdUser']. '"' ?> class="col-12">
        <p><?php

          date_default_timezone_set('Europe/Paris');
          $age = (time() - strtotime($Users['DateAnniversaire'])) / 3600 / 24 / 365;
          echo 'nom : '. $Users['Nom'].' Age : '. floor($age) . 'ans'

         ?></p>
        <p></p>
      </div>
    </div>
    <script>
      $(<?= '"#'. $Users['IdUser'].'"' ?>).click(function(){
        $(<?= '"#DisplayUser'.$Users['IdUser']. '"' ?>).toggle();
      });
    </script>
  <?php endforeach; ?>
  </div>
</div>
