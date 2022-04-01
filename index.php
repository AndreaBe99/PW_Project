<?php 
    include "./azioni.php";
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    


    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
    
    <?php include "head.php" ?>
</head>
<body>
	

	<!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MKBCLN7"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    
    <?php include_once "navbar.php";?>
	<?php if(true): //if(rand(0,2) == 1): ?>
    <div id="overlay" onclick="off()">
     <?php 
     	$dbHelper = new DBHelper();
        $sql = $dbHelper->getProdotti();
        $stmt = $conn->query($sql);
        $product_array = $stmt->fetchAll();
        $trovato = false;
       while($trovato == false){
              $pos = rand(0,sizeof($product_array));
              var_dump($pos);
              if($product_array[$pos]["Sconto"] != 0)
                  $trovato = true;
        } ?>
     
    	<div id="banner">
          <figure id="figureBanner">
            <img src="<?php echo $product_array[$pos]["Image"]; ?>">
            <figcaption id="figNome"><?php echo $product_array[$pos]["Nome"]; ?></figcaption>
            <figcaption>Sconto del <?php echo $product_array[$pos]["Sconto"]; ?> %</figcaption>
            <figcaption>
            	<span style="text-decoration:line-through;"><?php echo $product_array[$pos]["Prezzo"]."€   "; ?></span> 
                <span style="font-weight:bold;"><?php echo " ".($product_array[$pos]["Prezzo"] - ($product_array[$pos]["Prezzo"]/100*$product_array[$pos]["Sconto"]))."€" ?></span> 
            </figcaption>
          </figure>
         </div>
    </div>
     <?php endif; ?>
   	<div id="parallasse">
    	 <div class="logo">
            <div class="imgLogo"><img src="./img/jungle.png" alt=""></div>
            	<h4>Vivaio</h4>
                <p>Un mondo di piante a casa tua</p>
            
        </div>
    </div>
    <main>
        <!-- Button Top -->
        <div class="fixed-action-btn">
            <a id="myBtn" title="Go to top" class="btn-floating btn-large waves-effect waves-light green"><i
                    class="material-icons">arrow_upward</i></a>
        </div>
        
    <div class="sliderContainer">
          <div class="mySlides">
            <img src="./img/slider/slider1.jpg" style="width:100%">
          </div>
          <div class="mySlides">
            <img src="./img/slider/slider2.jpg" style="width:100%">
          </div>
          <div class="mySlides">
            <img src="./img/slider/slider3.jpg" style="width:100%">
          </div>
          </div>
          <br>
          <div style="text-align:center">
            <span class="dot"></span> 
            <span class="dot"></span> 
            <span class="dot"></span> 
          </div> 
         <div class="col-12 d-none d-lg-block ">
          		<div style="width: 728px; margin: 0px auto;">
            	<script>!function(d,l,e,s,c){e=d.createElement("script");e.src="//ad.altervista.org/js.ad/size=728X90/?ref="+encodeURIComponent(l.hostname+l.pathname)+"&r="+Date.now();s=d.scripts;c=d.currentScript||s[s.length-1];c.parentNode.insertBefore(e,c)}(document,location)</script>
          		</div>
          </div>

        <div class="container3Intro">
            <div class="container">
                <div class="homepage-bar" style="margin: 0;">
                    <div class="row">
                        <div class="containerIntro col-lg-4 col-md-4" style="text-align: left;">
                            <div id="img-ship" class="porto-icon-shipping" style="font-size: 35px;"></div>
                            <div class="text-area">
                                <h3>Consegna a domicilio</h3>
                                <p>Tutti i tuoi bisogni di impianto, a portata di mano.</p>
                            </div>
                        </div>
                        <div class="containerIntro col-lg-4 col-md-4" style="text-align: center;">
                            <div class="porto-icon-heart" style="font-size: 37px;"></div>
                            <div class="text-area">
                                <h3>A conduzione familiare</h3>
                                <p>A conduzione familiare &amp; operativa dal 2001.</p>
                            </div>
                        </div>
                        <div class="containerIntro col-lg-4 col-md-4" style="text-align: center;">
                            <div class="porto-icon-garden" style="font-size: 37px;"></div>
                            <div class="text-area">
                                <h3>Vasta selezione di piante</h3>
                                <p>Uno dei vivai online più forniti d'Italia.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="titoloParallax"><h2 >Cosa puoi trovare da noi</h2></div>
        <section class="parallax">
                <div class="container-parallax">
                    <div class="parallax-img1"></div>
                    <div class="parallax-text bottom left">
                        <h2>Alberi da Frutto</h2>
                        <p>Da noi trovi una vasta scelta di Piante da Frutto, Piante Tropicali e Frutti Esotici. Garantiamo Alberi da Frutto in ottima salute.</p>
                    </div>
                </div>
                <div class="container-parallax">
                    <div class="parallax-text bottom top right">
                        <h2>Piante da Interni</h2>
                        <p>Vasta scelta di piante da appartamento e piante da fiore. Troverai un vasto assortimento di Bonsai, Piante da Appartamento, Piante Acquatiche e tanto altro ancora!</p>
                    </div>
                    <div class="parallax-img2"></div>
                </div>
                <div class="container-parallax ">
                    <div class="parallax-img3"></div>
                    <div class="parallax-text bottom top left">
                        <h2>Piante da Giardino</h2>
                        <p>Da noi trovi una vasta scelta di Piante Mediterranee dalle più comuni alle più particolari e ricercate. Ti offriamo la disponibilità di Piante Mediterranee dal formato più piccolo sino a pezzature di 2 metri di altezza.</p>
                    </div>
                </div>
                <div class="container-parallax">
                    <div class="parallax-text top right">
                        <h2>Piante Grasse</h2>
                        <p>Bellissime Piante di facile coltivazione al Prezzo più basso del web! Da noi troverai una vasta scelta di Piante di Grasse tra Succulenti e Spinose! Garantiamo Piante in ottima salute</p>
                    </div>
                    <div class="parallax-img4"></div>
                </div>
        </section>
    
    </main>

	<?php include "footer.php"?>


    <script  src="app.js"></script>
    <script  src="slider.js"></script>
</body>
</html>
