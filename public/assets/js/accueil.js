document.addEventListener("DOMContentLoaded", function(){

    const header = document.querySelector("header");
    const rentrerCompte = document.querySelector(".rentrerCompte");
    const logo = document.querySelector('.logo');
    const fb1 = document.querySelector('.fb1');
    const evenementEffectuer = document.querySelector(".evenementEffectuer");
  
   function nextSlide() {
      const carousel = document.getElementById('carouselExampleIndicators');
      const currentSlide = carousel.querySelector('.carousel-item.active');
      const nextSlide = currentSlide.nextElementSibling || carousel.querySelector('.carousel-item:first-child');
      
  
      currentSlide.classList.remove('active');
      nextSlide.classList.add('active');
    }
  
    setInterval(nextSlide, 3000); 
  
  
  // Fonction pour afficher la taille de l'écran
  function afficherTailleEcran(largeurEcran, hauteurEcran ) {
    // Obtenir la largeur de l'écran
    largeurEcran = window.innerWidth;
  
    // Obtenir la hauteur de l'écran
   hauteurEcran = window.innerHeight;
  
    // Afficher la taille de l'écran dans la console
    return {
      largeur:  largeurEcran,
      hauteur: hauteurEcran
  }
  }
  const screnSize = afficherTailleEcran();
  console.log(`largeur de l'écran :${screnSize.largeur} et la hauteur de l'écran :${screnSize.hauteur}`);
  
  if (screnSize.largeur>400) {
      header.remove();
  }else {
    console.log("activer");
    header.classList.add('active');
    rentrerCompte.remove();
    logo.remove();
    fb1.remove();
    evenementEffectuer.remove()
  }
  
  
  
  
  });
      
  