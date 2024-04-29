<?php require_once(__DIR__ . '/../includes/headerConnexion.php'); ?>
<?php require_once(__DIR__ . '/../includes/navContact.php'); ?>


<h1>Se connecter</h1>
<form>
  <fieldset>
   
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Adresse Email</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre email avec quelqu’un d’autre.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Mot De Passe</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="form-check mb-3">
  <input class="form-check-input" id="sesouvenir" type="checkbox" value=""  name="sesouvenir"/>
<label class="form-check-label" for="inputRememberPassword">Se souvenir de moi</label>
</div>
<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
 <a class="small" href="password.php">Mot de passe oublié?</a>
 <input type="submit"  name="connection" class="btn btn-primary" value="Connection">
</div>
</div>
<div class="card-footer text-center py-3">
<div class="small"><a href="../inscription">Avez vous besoin d'un compte? Enregistrez-vous!</a></div>
</div>
</fieldset>
</form>




<?php require_once(__DIR__ . '/../includes/footer.php') ?>