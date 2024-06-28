<?php require_once(__DIR__ . '/../includes/headerConnexion.php'); ?>
<?php require_once(__DIR__ . '/../includes/navContact.php'); ?>


<h1>Se connecter</h1>
<form action="/connexion" method="POST">
  <fieldset>
   
  <div class="mb-3">
    <label for="email" class="form-label">Adresse Email</label>
    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre email avec quelqu’un d’autre.</div>
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Mot De Passe</label>
    <input type="password" class="form-control" name="mot_de_passe" id="mot_de_passe">
  </div>
  <div class="form-check mb-3">
  <input class="form-check-input" id="sesouvenir" type="checkbox" value=""  name="sesouvenir"/>
<label class="form-check-label" for="sesouvenir">Se souvenir de moi</label>
</div>
<div class="d-flex align-items-center justify-content-between mt-4 mb-0">
 <!-- <a class="small" href="password.php">Mot de passe oublié?</a> -->
 <input type="submit"  name="connection" class="btn btn-primary" value="Connection">
</div>
</div>
<div class="card-footer text-center py-3">
<!-- <div class="small"><a href="../inscription">Avez vous besoin d'un compte? Enregistrez-vous!</a></div> -->
</div>
</fieldset>
</form>



<?php require_once(__DIR__ . '/../includes/footer.php') ?>