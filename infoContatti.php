<?php 
      include_once "azioni.php";  
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <?php include "head.php" ?>
</head>
<body>

 <?php include "navbar.php"?>


    <main>
        <!-- Button Top -->
        <div class="fixed-action-btn">
            <a id="myBtn" title="Go to top" class="btn-floating btn-large waves-effect waves-light green"><i
                    class="material-icons">arrow_upward</i></a>
        </div>

        

        <section class="info col-12">
            <div class="imgLogoContatti">
                <img src="./img/jungle.png" alt="">
                <img src="./img/plant.png" alt="">
                <img src="./img/summer.png" alt="">
            </div>
                     <div  class="listaProdotti col-12">
                      <h1>Contatti e Informazioni</h1>
            <?php               
            $dbHelper = new DBHelper();
            $sql = $dbHelper->getContatti();
            $stmt = $conn->query($sql);
            $contatti_array = $stmt->fetchAll();

            if (!empty($contatti_array)): ?>
                <?php foreach($contatti_array as $key=>$value): ?>
                   <a href="<?php echo $contatti_array[$key]["linkMappe"]; ?>">  <div class="ordineSingolo">
                        <div class="infoOrdine">
                            <div id="titoloOrdine"><i class="fa fa-phone" aria-hidden="true"></i>CONTATTI</div>
                            <div>Citta: <span><?php echo $contatti_array[$key]["citta"]; ?></span></div>
                            <div>Indirizzo: <span><?php echo $contatti_array[$key]["indirizzo"]; ?></span></div>
                            <div>Cap: <span><?php echo $contatti_array[$key]["cap"]; ?></span></div>
                            <div>Telefono: <span><?php echo $contatti_array[$key]["telefono"]; ?></span></div>
                            <div>Email: <span><?php echo $contatti_array[$key]["email"]; ?></span></div>  
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            </a>
         
    </div>
     <div class="backGrey col-12">
            <h4>Info Generali</h4>
            <p>Vuoi contattarci? Hai delle domande sui nostri prodotti? Vuoi saperne di più? Contattaci al numero 3894833785</p> 

            <h4>Prodotti o Marche non presenti in Catalogo</h4> 
            <p>Cerchi un prodotto oppure una marca non disponibile a catalogo? Contattaci al numero 3894833785.
                Ci attiveremo per renderlo disponibile quanto prima.
            </p>
    </div>
           <div class="col-12 d-none d-lg-block ">
          		<div style="width: 728px; margin: 0px auto;">
            	<script>!function(d,l,e,s,c){e=d.createElement("script");e.src="//ad.altervista.org/js.ad/size=728X90/?ref="+encodeURIComponent(l.hostname+l.pathname)+"&r="+Date.now();s=d.scripts;c=d.currentScript||s[s.length-1];c.parentNode.insertBefore(e,c)}(document,location)</script>
          		</div>
          </div>
        </section>
     
    </main>
<?php include "footer.php"?>
 

    <script  src="app.js"></script>
</body>
</html>
