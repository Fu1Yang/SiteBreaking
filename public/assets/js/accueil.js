document.addEventListener("DOMContentLoaded", function(){

    const header = document.querySelector("header");
    const rentrerCompte = document.querySelector(".rentrerCompte");
    const logo = document.querySelector('.logo');
    const fb1 = document.querySelector('.fb1');
    const evenementEffectuer = document.querySelector(".evenementEffectuer");
    const carousel_item = document.querySelector(".carousel-item");

  let listImages = ["./assets/images/dans.jpg","./assets/images/681224.jpg","./assets/images/breakdance-olympics-copy.jpg","./assets/images/681224.jpg"];

  let index = 0;

  setInterval( ()=>{
    console.log(index);
    if (index < listImages.length) {
     
      carousel_item.innerHTML = '<img src="'+listImages[index] +'" alt=""></img>' ;
    }
    else {
      index = 0; 
      carousel_item.innerHTML = '<img src="'+listImages[index] +'" alt=""></img>' ;
      console.log(listImages[index]);
    }
    index++
  },1000)
 


 


 
  // index++
  // console.log(index);
 

   function nextSlide() {
      const carousel = document.getElementById('carouselExampleIndicators');
      const currentSlide = carousel.querySelector('.carousel-item.active');
      const nextSlide = currentSlide.nextElementSibling || carousel.querySelector('.carousel-item:first-child');
      
  
      currentSlide.classList.remove('active');
      nextSlide.classList.add('active');
    }
  
    setInterval(nextSlide, 1000); 
  
  
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
      
  