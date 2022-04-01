<?php 
    include "azioni.php";

    if(isset($_POST["cancella"])){
        if($_POST["cancella"] != 0){
            //echo $_POST["cancella"];
            $ordine = $_POST["cancella"];
            $_POST['cancella'] = 0;

            //$ordine_array = $db_handle->runQuery("DELETE FROM Ordine, Pagamento, Indirizzo WHERE Pagamento._id=Ordine.Pagamento AND Indirizzo._id=Ordine.Indirizzo AND Utente=$uid");    
            $dbHelper = new DBHelper();
            //$conn = new PDO("mysql:host=localhost;dbname=e-vivaio","UserVivaio","24011999");
            $sqlIndirizzo = $dbHelper->deleteContiene($ordine);    
            $conn->exec($sqlIndirizzo);
            $sqlIndirizzo = $dbHelper->deleteOrdine($ordine);    
            $conn->exec($sqlIndirizzo);
        }
    }
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <?php include "head.php" ?>
</head>
<body>

     <?php include "navbar.php"?>


    <main class="row col-12">
    <!-- Button Top -->
        <div class="fixed-action-btn">
            <a id="myBtn" title="Go to top" class="btn-floating btn-large waves-effect waves-light green"><i
                    class="material-icons">arrow_upward</i></a>
        </div>
    	<?php if(isset($_COOKIE["LOGIN"]))://if(isset( $_SESSION['uid'])): ?>
       
         <div class="col-12 col-md-7 infoUtente">
            <?php 
            $uid = $_SESSION["uid"];
            $dbHelper = new DBHelper();
            $sql = $dbHelper->getUtenteID($uid);
            $stmt = $conn->query($sql);
            $dati_utente = $stmt->fetch(); ?>
            <div id="imgUser"><i class="fa fa-user-circle fa-4x" aria-hidden="true"></i></div>
            <div>
                <div>Nome: <span><?php echo $dati_utente["nome"]; ?></span></div>
                <div>Cognome: <span><?php echo $dati_utente["cognome"]; ?></span></div>
                <div>Username: <span><?php echo $dati_utente["username"]; ?></span></div>
                <div>E-mail: <span><?php echo $dati_utente["email"]; ?></span></div>
            </div>      
        </div>
        
        <div id="bannerLogout" class="col-12 col-md-3">
         <form method="get" action="azioni.php" class="containerBtn">                                        
               <input type="text" id="logout" name="logout" style="display:none" value="1">
               <input type="submit" value="Logout" class="btnCancellaOrdine"/>                                  
         </form>  
          <div id="bannerProdotti">
          <script>!function(d,l,e,s,c){e=d.createElement("script");e.src="//ad.altervista.org/js.ad/size=300X250/?ref="+encodeURIComponent(l.hostname+l.pathname)+"&r="+Date.now();s=d.scripts;c=d.currentScript||s[s.length-1];c.parentNode.insertBefore(e,c)}(document,location)</script>
        
        	<!--<img  src="./img/banner/banner2.jpg">-->
        </div>
       </div>

        <div  class="listaProdotti col-12">
            <div class="col-12" id="titoloOrdini">Ordini: </div>
            <?php
            $uid = $_SESSION["uid"];                   
            $dbHelper = new DBHelper();
            $sql = $dbHelper->getListaOrdine($uid);
            $stmt = $conn->query($sql);
            $ordine_array = $stmt->fetchAll();
			//var_dump($ordine_array);
            if (!empty($ordine_array)): ?>
                <?php foreach($ordine_array as $key=>$value): ?>
                   <div class="ordineSingolo">
                        <div class="infoOrdine">
                            <div id="titoloOrdine"><i class="fa fa-shopping-bag" aria-hidden="true"></i>ORDINE</div>
                            <div>Intestatario Carta: <span><?php echo $ordine_array[$key]["NomeCarta"]; ?></span></div>
                            <div>Numero Carta: <span><?php echo $ordine_array[$key]["NumeroCarta"]; ?></span></div>
                            <div>Cellulare: <span><?php echo $ordine_array[$key]["Cellulare"]; ?></span></div>
                            <div>Indirizzo: <span><?php echo $ordine_array[$key]["Via"]; ?></span></div>
                            <div>Citta: <span><?php echo $ordine_array[$key]["Citta"]; ?></span></div>
                            <div>Codice Postale: <span><?php echo $ordine_array[$key]["Zip"]; ?></span></div>

                            <div>Data: <span><?php echo $ordine_array[$key]["Data"]; ?></span></div>
                            <div>Stato: <span><?php echo $ordine_array[$key]["Stato"]; ?></span></div>
                            <div>Prezzo Totale: <span><?php echo $ordine_array[$key]["Totale"]; ?> €</span></div>
                                    
                           <form method="post" class=" containerBtn col-12">                                        
                                <input type="text" id="cancella" name="cancella" style="display:none" value="<?php echo $ordine_array[$key]["_id_ordine"]; ?>">
                                <input type="submit" value="Cancella" class="btnCancellaOrdine"/>                                  
                            </form>  

                            <p>Carello: </p>
                            <div class="ordineProdotti">
                                <?php
                                $_id_ordine = $ordine_array[$key]["_id_ordine"];
                                $dbHelper = new DBHelper();
                                $sql = $dbHelper->getCarrelloOrdine($_id_ordine);
                                $stmt = $conn->query($sql);
                                $product_array = $stmt->fetchAll();
                                foreach($product_array as $key=>$value): ?>
                                    <div>
                                        <div id="piantaOrdine"><span><?php echo $product_array[$key]["Nome"]; ?></span></div>
                                        <div>Quantita: <span><?php echo $product_array[$key]["Quantita"]; ?></span></div>
                                        <div class="ordine-image"><img alt='imgElemento' src="<?php echo $product_array[$key]["Image"]; ?>"></div>
                                    </div>
                                <?php endforeach; ?>
                                </div>                         
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
        </div>

	<?php else: ?>
    	<div id="containerVai">
          <div class="sliderContainer" id="imgGestisciOrdini">
            <div class="mySlides" style="display: flex;"><img src="./img/ordini.jpg" style="width:100%"></div>
          </div>
          <div class="col-12 d-none d-lg-block ">
          		<div class="col-10"style="margin: 0px auto;">
            	<script>!function(d,l,e,s,c){e=d.createElement("script");e.src="//ad.altervista.org/js.ad/size=728X90/?ref="+encodeURIComponent(l.hostname+l.pathname)+"&r="+Date.now();s=d.scripts;c=d.currentScript||s[s.length-1];c.parentNode.insertBefore(e,c)}(document,location)</script>
          		</div>
          </div>
         
          <div class="col-12 infoLogin">
            <h1 class="col-12">Effettua il Login oppure Registrati per ordinare i nostri prodotti.</h1>
            <form method="post" action="login.php" class="containerBtn col-12">                                        
              <input type="submit" value="LogIn - SignUp" class="btnCancellaOrdine"/>                                  
            </form> 
          </div>
        </div>
    <?php endif; ?>
    </main>

  
<?php include "footer.php"?>


    <script  src="app.js"></script>

</body>
</html>
