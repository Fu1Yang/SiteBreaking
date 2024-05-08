document.addEventListener("DOMContentLoaded",()=>{
    
    async function fichierImages(){
        await fetch("./assets/images")
         .then(reponse=>reponse.text())
         .then(data=>{
             console.log(data);
         })
     }
     
     fichierImages();




})

