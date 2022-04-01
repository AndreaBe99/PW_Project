<?php 
    include "azioni.php";
    if (isset($_POST["nomeCarta"]) && isset($_POST["numeroCarta"]) && isset($_POST["meseScadenza"]) && isset($_POST["annoScadenza"]) && isset($_POST["cvv"])) {
        $nomecarta = $_POST["nomeCarta"];
        $numerocarta = $_POST["numeroCarta"];
        $mesescadenza = $_POST["meseScadenza"];
        $annoscadenza = $_POST["annoScadenza"];
        $cvv = $_POST["cvv"];

        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        $data = $_POST["data"];
        $email = $_POST["email"];
        $cellulare = $_POST["cellulare"];
        $indirizzo = $_POST["indirizzo"];
        $citta = $_POST["citta"];
        $provincia = $_POST["provincia"];
        $zip = $_POST["zip"];
      }
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
<main class="row">
	
     <div class="fixed-action-btn">
            <a id="myBtn" title="Go to top" class="btn-floating btn-large waves-effect waves-light green"><i
                    class="material-icons">arrow_upward</i></a>
        </div>
    
     <div class="contenutoCheckout row">
        <h1 class="titoloCheckout col-12">Ordine Registrato</h1>
        <h2 class="sottotitoloCheckout col-12">Visita la sezione ordini per controllare.</h2>
         <div id="shopping-cart" class="col-lg-3 col-12 position-static" style="min-width: 310px;">
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
                
            <!-- <a id="btnEmpty" href="listaProdotti.php?action=empty"><i class="material-icons ">remove_shopping_cart</i> Svuota Carrello</a> -->
       </div>

        <?php 

            //$conn = new PDO("mysql:host=localhost;dbname=e-vivaio","UserVivaio","24011999");
            $dbHelper = new DBHelper();
			$nomeCognome = $nome." ".$cognome;
        
            $sqlIndirizzo = $dbHelper->setIndirizzo($nomeCognome, $email, $cellulare, $indirizzo, $citta, $provincia, $zip);
            $conn->exec($sqlIndirizzo);
            $last_id_Indirizzo = $conn->lastInsertId();

            $sqlPagamento = $dbHelper->setPagamento($nomecarta, $numerocarta, $mesescadenza, $annoscadenza, $cvv);
            $conn->exec($sqlPagamento);
            $last_id_Pagamento = $conn->lastInsertId();

            $utente = $_SESSION["uid"];
            $data= date('Y-m-d H:i:s');
            $stato = "In Elaborazione";
            $sqlOrdine = $dbHelper->setOrdine($utente, $last_id_Indirizzo, $last_id_Pagamento, $data, $stato, $total_price);
            $conn->exec($sqlOrdine);
            $last_id_Ordine = $conn->lastInsertId();

            foreach ($_SESSION['cart_item'] as $key => $value) {
                $pianta = $value['_id'];
                $quantita = $value['quantita'];
                $sqlContiene = $dbHelper->setContiene($last_id_Ordine, $pianta, $quantita);
                $conn->exec($sqlContiene);
            }

            //unset($_SESSION["cart_item"]);
            //$array_ordini = $db_handle->runQuery("INSERT INTO `Indirizzo` (`Nome`, `Email`, `Cellulare`, 'Via', 'Citta', 'Provincia', 'Zip') VALUES ('$nome', '$email', '$cellulare', '$indirizzo', '$citta', '$provincia', '$zip')");

        ?>
        <div class="infoCheckout col-lg-3 col-11" style="min-width: 300px;">
        	<div class="containerInfoCheckout">
              <h3>Indirizzo Spedizione</h3>
              <div>Nome: <span><?php echo $nome ?></span></div>
              <div>Cognome: <span><?php echo $cognome ?></span></div>
              <div>Data: <span><?php echo $data ?></span></div>
              <div>E-mail: <span><?php echo $email ?></span></div>
              <div>Cellulare: <span><?php echo $cellulare ?></span></div>
              <div>Indirizzo: <span><?php echo $indirizzo ?></span></div>
              <div>Citta: <span><?php echo $citta ?></span></div>
              <div>Provincia: <span><?php echo $provincia ?></span></div>
              <div>Codice Postale: <span><?php echo $zip ?></span></div>     
            </div>
        </div>
        <div class="infoCheckout col-lg-3 col-11" style="min-width: 300px;">
        	<div class="containerInfoCheckout">
              <h3>Pagamento</h3>
              <div>Intestatario Carta <span><?php echo $nomecarta ?></span></div>
              <div>Numero della Carta: <span><?php echo $numerocarta ?></span></div>
              <div>Mese Scadenza: <span><?php echo $mesescadenza ?></span></div>
              <div>Anno Scadenza: <span><?php echo $annoscadenza ?></span></div>
              <div>CVV: <span><?php echo $cvv ?></span></div>               
        	</div>
        </div>
		</div>
    

<script  src="app.js"></script>
</main>

<?php include "footer.php"?>


</body>
</html>
