<?php 
   include "azioni.php";
    //var_dump($_SESSION['cart_item']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<?php include "head.php"?>
</head>
<body>

      <?php include "navbar.php"?>

<main>

	 <div class="fixed-action-btn">
            <a id="myBtn" title="Go to top" class="btn-floating btn-large waves-effect waves-light green"><i
                    class="material-icons">arrow_upward</i></a>
        </div>

    <div class="contenutoCheckout row">

        <div id="shopping-cart" class="col-lg-4 col-12">
            <div class="txt-heading">Carrello</div>

            <?php
            if(isset($_SESSION["cart_item"])){
                $total_quantity = 0;
                $total_price = 0;
            ?>	
            <table class="tbl-cart" cellpadding="10" cellspacing="1">
                <tbody>
                    <tr>
                        <th>Prodotto</th>
                        <th>Quantità</th>
                        <th>Prezzo</th>
                        <th></th>
                    </tr>	
                    <?php
                        foreach ($_SESSION["cart_item"] as $item){
                            $item_price = $item["quantita"]*$item["prezzo"];
                            ?>
                                    <tr>
                                        <td class="containerTabella-nome-img"><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["nome"]; ?></td>
                                        <td><?php echo $item["quantita"]; ?></td>
                                        <td><?php echo ($item["prezzo"] - ($item["prezzo"]/100*$item["sconto"]))."€"; ?></td>
                                        <td></td>
                                  </tr>
                                    <?php
                                    $total_quantity += $item["quantita"];
                                    $total_price += (($item["prezzo"] - ($item["prezzo"]/100*$item["sconto"]))*$item["quantita"]);
                            }
                        ?>

                    <tr>
                        <td colspan="2" align="right">TOTALE:</td>
                        <td align="right"><?php echo $total_quantity; ?></td>
                        <td align="right" colspan="2"><strong><?php echo number_format($total_price, 2)."€"; ?></strong></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>		
            <?php
            } else {
            ?>
            <div class="no-records">Il carrello è vuoto</div>
            <?php 
            }
            ?>
            
          <div id="bannerProdotti">
          <script>!function(d,l,e,s,c){e=d.createElement("script");e.src="//ad.altervista.org/js.ad/size=300X250/?ref="+encodeURIComponent(l.hostname+l.pathname)+"&r="+Date.now();s=d.scripts;c=d.currentScript||s[s.length-1];c.parentNode.insertBefore(e,c)}(document,location)</script>
        
             <!-- <img  src="./img/banner/banner2.jpg">-->
          </div>
       </div>
       
      <form id="regForm" method="post" class="col-lg-6 col-11" action="checkoutFinale.php">
          <h1>Ordine:</h1>

          <!-- One "tab" for each step in the form: -->
          <div class="tab">
            <p> 
            	<label for="nome"><i class="fa fa-user"></i> Nome</label>
            	<input placeholder="Mario" oninput="this.className = ''" name="nome"></p>
            <p>
            	<label for="cognome"><i class="fa fa-user"></i> Cognome</label>
            	<input placeholder="Rossi" oninput="this.className = ''" name="cognome"></p>
            <p>
            	<label for="data"><i class="fa fa-calendar"></i> Data di nascita</label>
                <input type="date" placeholder="dd-mm-yyyy" oninput="this.className = ''" name="data"></p>
            <p>
            	<label for="email"><i class="fa fa-envelope"></i>Email</label>
            	<input pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="E-mail" type="email" oninput="this.className = ''" name="email"></p>
            <p>
            	<label for="cellulare"><i class="fa fa-phone"></i>Cellulare</label>
            	<input  pattern="[3-9]{3} [0-9]{7}" placeholder="33342130931" oninput="this.className = ''" name="cellulare"></p>
            <p>
            	<label for="indirizzo"><i class="fa fa-building"></i> Indirizzo</label>
            	<input placeholder="Via Genova, 5" oninput="this.className = ''" name="indirizzo"></p>
            <p>
            	<label for="citta"><i class="fa fa-building"></i> Citta</label>
            	<input placeholder="Roma" oninput="this.className = ''" name="citta"></p>
            <p>
            	<label for="provincia"><i class="fa fa-building"></i>Provincia</label>
            	<input pattern="[A-Za-z]{2}" placeholder="RM" oninput="this.className = ''" name="provincia"></p>
            <p>
            	<label for="zip"><i class="fa fa-university"></i>Codice Postale</label>
                <input placeholder="01100" oninput="this.className = ''" name="zip"></p> 
          </div>

          <div class="tab">
          	<p>
            	<label for="nomeCarta"><i class="fa fa-user"></i>Intestatario</label>
            	<input placeholder="Intestatario" oninput="this.className = ''" name="nomeCarta"></p>
            <p>	
            	<label for="numeroCarta"><i class="fa fa-credit-card"></i>Numero Carta</label>
            	<input placeholder="Numero Carta" oninput="this.className = ''" name="numeroCarta"></p>
            <p>
            	<label for="meseScadenza"><i class="fa fa-calendar"></i>Mese Scadenza</label>
                <input type="number"  min="1" max="31"placeholder="Mese Scadenza" oninput="this.className = ''" name="meseScadenza"></p>
            <p>
            	<label for="annoScadenza"><i class="fa fa-calendar"></i>Anno Scadenza</label>
            	<input type="number"  min="2020" max="3000" placeholder="Anno Scadenza" oninput="this.className = ''" name="annoScadenza"></p>
            <p>
            	<label for="cvv"><i class="fa fa-credit-card"></i>Cvv</label>
            	<input type="number"  min="100" max="999" placeholder="Cvv" oninput="this.className = ''" name="cvv"></p>
          </div>

          <div id="btnForm">
            <button type="button" id="prevBtn" class="btn" onclick="nextPrev(-1)">Indietro</button>
            <button type="button" id="nextBtn" class="btn" onclick="nextPrev(1)">Avanti</button>
          </div>

          <!-- Circles which indicates the steps of the form: -->
          <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
          </div>

      </form>
 </div>
  
<script  src="app.js"></script>
<script  src="stepForm.js"></script>

</main>

<?php //include "footer.php"?>
  
</body>
</html>
