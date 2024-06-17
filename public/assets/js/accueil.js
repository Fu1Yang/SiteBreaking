document.addEventListener("DOMContentLoaded", function(){

    const header = document.querySelector("header");
    const rentrerCompte = document.querySelector(".rentrerCompte");
    const logo = document.querySelector('.logo');
    const fb1 = document.querySelector('.fb1');
    const button_next = document.querySelector(".carousel-control-next-icon");
    const button_prev = document.querySelector(".carousel-control-prev-icon");
    const evenementEffectuer = document.querySelector(".evenementEffectuer");
    const carousel_item = document.querySelector(".carousel-item");
    const connexion = document.querySelector(".rentrerCompte");
  
    // afficher la taille de l'écran
  function afficherTailleEcran(largeurEcran, hauteurEcran ) {
    // la largeur de l'écran
    largeurEcran = window.innerWidth;
  
    // la hauteur de l'écran
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
  
  document.addEventListener("keydown",(e)=>{
    console.log(e);
    if (e.ctrlKey && e.altKey && e.key === "m") {
      console.log(e);
      connexion.style.visibility = "visible";
    }
    if (e.ctrlKey && e.altKey && e.key === "i") {
      connexion.style.visibility = "hidden";
    }
  })
  

///////////////////////////////////////////////////////////    AJAX       ////////////////////


function displayCarousel(images) {
    let imageList = []; // Crée une liste vide pour stocker les images
    
    // Boucle à travers les images pour les traiter
    images.forEach(function(image) {

      imageList.push(image); // Ajoute l'image à la liste 
      
    });
    
    // Retourne la liste complète des images après traitement
    return imageList;
}



let index = 0
// AJAX pour récupérer la liste des images depuis PHP
fetch('./get_images.php')
    .then(response => {
        if (!response.ok) {
            throw new Error("Une erreur s'est produite lors de la récupération des images.");
        }
        return response.json();
    })
    .then(images => {
        const listImages = displayCarousel(images); // displayCarousel pour traiter les images

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
    },2000)


    let numb = 0
    button_next.addEventListener("click",()=>{
    
      if (numb > listImages.length) {
        numb = 0
        carousel_item.innerHTML = '<img src="'+listImages[numb] +'" alt=""></img>' ;
      }else{
        carousel_item.innerHTML = '<img src="'+listImages[numb] +'" alt=""></img>' ;
        console.log(numb);
      }
      listImages[numb++] 
   
    })


    button_prev.addEventListener("click",()=>{
    
      if (numb < 0) {
        numb = listImages.length
        carousel_item.innerHTML = '<img src="'+listImages[numb] +'" alt=""></img>' ;
      }else{
        console.log(numb);
        carousel_item.innerHTML = '<img src="'+listImages[numb] +'" alt=""></img>' ;
      }
      listImages[numb--] 
   
    })
      
    })
    .catch(error => {
        console.error(error.message);
    });



  });
      
  