document.addEventListener("DOMContentLoaded", function(){

    const header = document.querySelector("header");
    const rentrerCompte = document.querySelector(".rentrerCompte");
    const logo = document.querySelector('.logo');
    const fb1 = document.querySelector('.fb1');
    const evenementEffectuer = document.querySelector(".evenementEffectuer");
    const carousel_item = document.querySelector(".carousel-item");

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
  
  

///////////////////////////////////////////////////////////    AJAX       ////////////////////


  function displayCarousel(images) {
    let imageList = []; // Crée une liste vide pour stocker les images
    
    // Boucle à travers les images pour les traiter
    images.forEach(function(image) {
    
        // imageList.push(image); // Ajoutez l'image à la liste si nécessaire
        imageList.push(image); // Ajoute simplement l'image à la liste sans traitement supplémentaire
    });
    
    // Retourne la liste complète des images après traitement
    return imageList;
}



let index = 0
// Appel AJAX pour récupérer la liste des images depuis PHP
fetch('./get_images.php')
    .then(response => {
        if (!response.ok) {
            throw new Error('Une erreur s\'est produite lors de la récupération des images.');
        }
        return response.json();
    })
    .then(images => {
        const listImages = displayCarousel(images); // Appelle displayCarousel pour traiter les images

          setInterval( ()=>{
    // console.log(index);
    if (index < listImages.length) {
     
      carousel_item.innerHTML = '<img src="'+listImages[index] +'" alt=""></img>' ;
    }
    else {
      index = 0; 
      carousel_item.innerHTML = '<img src="'+listImages[index] +'" alt=""></img>' ;
      // console.log(listImages[index]);
    }
    index++
  },1000)
      
    })
    .catch(error => {
        console.error(error.message);
    });


  });
      
  