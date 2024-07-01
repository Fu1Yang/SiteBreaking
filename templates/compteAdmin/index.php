<?php
use app\SiteBreaking\model\Database;
use app\SiteBreaking\model\Visiteur;
use app\SiteBreaking\model\Utilisateur;
// Assurez-vous que vous avez une route définie pour accepter POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
  Database::getInstance()->getConnexion();

} else {
  // Réponse d'erreur si la méthode n'est pas autorisée
  http_response_code(405);
 
}

?>
<!DOCTYPE html>
<html lang="fr-FR">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Tableau de bord administrateur pour la gestion des contenus du site Web." />
        <meta name="author" content="Yang fu" />
        <title>Tableau de bord – Administrateur</title>

        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
        <link rel="stylesheet" href="./assets/css/compteAdmin.css">
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="../">Retoure a page, l'accueil</a>
            <!-- Sidebar Toggle-->
        
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
               
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="../deconnexion">Déconnexion</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div >
                
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                           
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Connecté</div>
                        Administrateur 
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Tableau de bord Administrateur</h1>
  
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Tableau de bord</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Ajouter des éléments dans la page accueil</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="../accueil">Ajouter</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Ajouter des éléments dans la page evenement</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="../evenementAdmin">Ajouter</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Ajouter des éléments dans la page contact</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="../contactAdmin">Ajouter</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Ajouter des éléments dans la page apropos</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="../aproposAdmin">Ajouter</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <div class="col-xl-12">
                                <div class="card mb-4" class="d-flex">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar me-1"></i>
                                        Nombre de visite 
                                    </div>
                                    <div class="card-body" style='text-align:center; font-weight:bold; font-size: 305%; color:black'><?= htmlspecialchars(Visiteur::cookie())?></div>
                                </div>
                            </div>
                    </div>
                    
                </main>
                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tableau des Utilisateurs
                            </div>
                            <div class="card-body">
                                <table class="datatable-table">
                                        <tr>
                                            <th>id</th>
                                            <th>nom_utilisateur</th>
                                            <th>prenom_utilisateur</th>
                                            <th>mot_de_passe</th>
                                            <th>email</th>
                                            <th>role</th>
                                            <th>date_inscription</th>
                                            <th>token</th>
                                            <th>validation_email</th>
                                            <th>action</th>
                                        </tr>                
                                            <?php require_once(__DIR__ . '/../compteAdmin/affichage/afficherUtilisateur.php');?>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>

                <main>
                    <div class="container-fluid px-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tableau des Evenements
                            </div>
                            <div class="card-body">
                                <table class="datatable-table">
                                    <tr>
                                        <th>id</th>
                                        <th>Titre</th>
                                        <th>Description</th>
                                        <th>Date des evenements</th>
                                        <th>Le lieux</th>
                                        <th>Image</th>
                                        <th>action</th>
                                    </tr>
                                        <?php require_once(__DIR__ . '/../compteAdmin/affichage/affichageDesEvenements.php');?>
                                </table>
                            </div>
                        </div>
                    </div>  
                </main>

                <main>
                <div class="container-fluid px-4">
                    <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Tableau des photos du carrousel
                            </div>
                            <div class="card-body">
                                <table class="datatable-table">
                                    <tbody>
                                        <tr>
                                            <th>id</th>
                                            <th>nom</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                    
                                    <?php require_once(__DIR__ . '/../compteAdmin/affichage/afficherPhotosCarousel.php');?>
                                   
                                </table>
                            </div>
                        </div>
                    </div>
                </main>   

                
                <main>
                <div class="container-fluid px-4">
                    <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Accueil
                            </div>
                            <div class="card-body">
                                <table class="datatable-table">
                                    <tbody>
                                        <tr>
                                            <th>id</th>
                                            <th>evenementRealiser</th>
                                            <th>titre</th>
                                            <th>nom</th>
                                            <th>image</th>
                                            <th>description</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                    
                                    <?php require_once(__DIR__ . '/../compteAdmin/affichage/afficherAccueil.php');?>
                                   
                                </table>
                            </div>
                        </div>
                    </div>
                </main>  

                <main>
                <div class="container-fluid px-4">
                    <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Mes coordonnées
                            </div>
                            <div class="card-body">
                                <table class="datatable-table">
                                    <tbody>
                                        <tr>
                                            <th>id</th>
                                            <th>adresse</th>
                                            <th>numeroDeTel</th>
                                            <th>email</th>
                                            <th>description</th>
                                            <th>jour</th>
                                            <th>niveauEtStyle</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                    
                                    <?php require_once(__DIR__ . '/../compteAdmin/affichage/afficherMesCoordonnées.php');?>
                                   
                                </table>
                            </div>
                        </div>
                    </div>
                </main>  

                
                <main>
                <div class="container-fluid px-4">
                    <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Apropos
                            </div>
                            <div class="card-body">
                                <table class="datatable-table">
                                    <tbody>
                                        <tr>
                                            <th>id</th>
                                            <th>logo</th>
                                            <th>image</th>
                                            <th>description</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                    
                                    <?php require_once(__DIR__ . '/../compteAdmin/affichage/affichageApropos.php');?>
                                   
                                </table>
                            </div>
                        </div>
                    </div>
                </main>  

                        
                <main>
                <div class="container-fluid px-4">
                    <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                               Partenaire
                            </div>
                            <div class="card-body">
                                <table class="datatable-table">
                                    <tbody>
                                        <tr>
                                            <th>id</th>
                                            <th>logo</th>
                                            <th>le lien url des partenaires</th>
                                            <th>action</th>
                                        </tr>
                                    </thead>
                    
                                    <?php require_once(__DIR__ . '/../compteAdmin/affichage/affichagePartenaire.php');?>
                                   
                                </table>
                            </div>
                        </div>
                    </div>
                </main>  
                
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; 2024 Breaking Journey. Tous droits réservés.</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="./assets/js/compteAdmin.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="./assets/js/chart-area-demo.js"></script>
        <script src="./assets/js/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
        <script src="./assets/js/datatableAdmin.js"></script>
    </body>
</html>





         