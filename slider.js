 /******** SLIDER IMMAGINI **********/
  function showSlides() {
      var galleria = document.getElementsByClassName("mySlides");
      var segnaPunti = document.getElementsByClassName("dot");
      // "AZZERO" i segna punti e le immagini
      for (let i = 0; i < galleria.length; i++)
          galleria[i].style.display = "none";
       for (let i = 0; i < segnaPunti.length; i++)
          segnaPunti[i].className = segnaPunti[i].className.replace(" active", "");

      indice++;	//aumento l'indice
      if (indice > (galleria.length -1)) // se è maggiore del numero di immagini lo azzero
          indice = 0;

      galleria[indice].style.display = "flex";
      segnaPunti[indice].className += " active";
      setTimeout(showSlides, 4000); //richiamo la funzione dopo 4 secondi
  }


  /**** PARALLASSE ***/
  window.addEventListener("scroll", function(params) {
      var parallax = document.getElementById("parallasse");
      var offset = window.pageYOffset; // coordinate sull'asse verticale
     // console.log(offset);
      parallax.style.backgroundPositionY = offset*0.5 + "px";	// se uguale a 1 scorre senza alcun effetto
  });




  var indice = 0;
  
