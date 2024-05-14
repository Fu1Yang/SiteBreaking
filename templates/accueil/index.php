
<?php require_once(__DIR__ . '/../includes/headerAccueil.php'); ?>

  <nav>
    <div class="logo">
      <img class="fb1" src="./assets/logo/logo.png" alt="">
      <a href="https://www.facebook.com/bboybgirljourney/"><img src="./assets/logo/logo_fb.png" alt=""></a>
    </div>
    <div class="menu">
      <a href="../apropos">A propos</a>
      <a href="../evenement">Événement</a>
      <a href="../contact">Contact</a>
    </div>
    <button class="rentrerCompte"><a href="../connexion">Inscription/Connexion</a></button>
  </nav>

  <div id="carouselExampleIndicators" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        
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


  <div class="row">
    <div class="col-sm-8 mb-3 mb-sm-0">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Special title treatment</h5>
          <p class="card-text">Le Lorem Ipsum est simplement du faux texte employé dans la composition
 
            et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard
            
            de l'imprimerie depuis les années 1500,
            
            Le Lorem Ipsum est simplement du faux texte employé dans la composition
             
            et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard
            
             de l'imprimerie depuis les années 1500,Le Lorem Ipsum est simplement du faux texte employé dans la composition
 
             et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard
             
             de l'imprimerie depuis les années 1500,
             
             Le Lorem Ipsum est simplement du faux texte employé dans la composition
              
             et la mise en page avant impression. Le Lorem Ipsum est le faux texte standard
             
              de l'imprimerie depuis les années 1500,</p>
          
        </div>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Nom de la personne</h5>
          <img src="./assets/images/_0af36055-6dfd-48a7-8476-8704042d0705.jpg" alt="">
        </div>
      </div>
    </div>
  </div>
  

 
  <?php require_once(__DIR__ . '/../includes/footer.php') ?>