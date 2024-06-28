
<?php require_once(__DIR__ . '/../includes/headerAccueil.php'); ?>

  <nav>
    <div class="logo">
      <img class="fb1" src="./assets/logo/logo.png" alt="logo de facebook">
      <a href="https://www.facebook.com/bboybgirljourney/"><img src="./assets/logo/logo_fb.png" alt="logo du site"></a>
    </div>
    <div class="menu">
      <a href="../apropos">A propos</a>
      <a href="../evenement">Événement</a>
      <a href="../contact">Contact</a>
    </div>
    <button class="rentrerCompte"><a href="../connexion">Administrateur</a></button>
  </nav>

  <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-inner">
      <div class="carousel-item active">
      <img src="../assets/images/dans.jpg" loading="lazy" alt="Une liste d\nimage"></img>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>



  <?php require_once(__DIR__ . '/../compteAdmin/liste/listeAccueil.php');?>




 
  <?php require_once(__DIR__ . '/../includes/footer.php') ?>