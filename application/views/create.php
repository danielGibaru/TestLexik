<div class="container">
  <br><br><br>
  <?=form_open('Group/add'); ?>
  <form>
      <div class="form-row">
        <p>groupe: </p>
        <div class="form-group col-md-1">
          <select id="inputState" class="form-control" name="IdGroupUser">
            <option selected>1</option>
            <option>2</option>
            <option>3</option>
          </select>
        </div>
        <div class="form-group col-md-5">
          <input type="text" class="form-control" name="Nom" placeholder="Nom">
        </div>
        <div class="form-group col-md-5">
          <input type="text" class="form-control" name="Prenom" placeholder="Prenom">
        </div>
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="DateAnniversaire" placeholder="AAAA-MM-DD">
      </div>
      <div class="form-group">
        <input type="email" class="form-control" id="inputEmail4" name="Email" placeholder="Email">
      </div>
      <button type="submit" name="button" class="btn btn-success btn-block btn-lg">Créer</button>
  </form>
</div>
