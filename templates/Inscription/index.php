

<?php require_once(__DIR__ . '/../includes/headerInscription.php'); ?>
<?php require_once(__DIR__ . '/../includes/navContact.php'); ?>

<form action="" method="get">

    <fieldset>
        <legend>Inscription</legend>

        <div>
            <label for="nom">Votre Nom</label>
            <input type="text" name="nom" id="nom" placeholder="Votre nom" required>
        </div>

        <div>
            <label for="prenom">Votre Prénom</label>
            <input type="text" name="prenom" id="prenom" placeholder="Votre prenom" required>
        </div>

        <div>
            <label for="email">Votre adresse Email</label>
            <input type="text" name="email" id="email" placeholder="Votre adresse email" required>
        </div>

        <div>
            <label for="password">Votre mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Votre mot de passe" required>
        </div>

        <div>
            <label for="confirmePassword">Confirmer votre mot de passe</label>
            <input type="password" name="confirmePassword" id="confirmePassword" placeholder="Confirmer votre mot de passe" required>
        </div>

    </fieldset>
    <button type="submit" name="sinscrire">Valider mes informations</button>
</form>

<?php require_once(__DIR__ . '/../includes/footer.php') ?>
