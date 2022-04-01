<?php 
    include "./azioni.php";
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

       
       
        <div id="shopping-cart" class=" col-lg-4 col-12"> <!-- class="col-lg-4 col-12" -->
        	<div>
            <div class="txt-heading">Carrello</div>

            <?php
            if(isset($_SESSION["cart_item"])): ?>
                <?php
                $total_quantity = 0;
                $total_price = 0;
                ?>	
             <?php if(isset( $_SESSION['uid'])): ?>
            <a class="waves-effect waves-light btn" href="checkoutIndirizzo.php"><i class="material-icons ">shopping_cart</i> Ordina</a>
           <?php endif; ?>
           <table class="tbl-cart" cellpadding="10" cellspacing="1">
                <tbody>
                    <tr>
                        <th>Prodotto</th>
                        <th>Quantità</th>
                        <th>Prezzo</th>
                        <th></th>
                    </tr>	
                    <?php
                        foreach ($_SESSION["cart_item"] as $item): ?>
                            <?php $item_price = $item["quantita"]*$item["prezzo"];?>
                                    <tr>
                                        <td class="containerTabella-nome-img"><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["nome"]; ?></td>
                                        <td><?php echo $item["quantita"]; ?></td>
                                        <td><?php echo ($item["prezzo"] - ($item["prezzo"]/100*$item["sconto"]))."€"; ?></td>
                                        <td><a class="btnRimuovi btn" href="listaProdotti.php?action=remove&code=<?php echo $item["_id"]; ?>" class="btnRemoveAction btn"><i class='material-icons medium '>delete</i></a></td>
                                    </tr>
                            <?php
                                $total_quantity += $item["quantita"];
                                $total_price += (($item["prezzo"] - ($item["prezzo"]/100*$item["sconto"]))*$item["quantita"]);
                        endforeach; ?>

                    <tr>
                        <td colspan="1" align="center">TOTALE:</td>
                        <td align="left"><?php echo $total_quantity; ?></td>
                        <td align="right" colspan="2"><strong><?php echo number_format($total_price, 2)."€"; ?></strong></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>		

            <?php else: ?>

            <div class="no-records">Il carrello è vuoto</div>
            <?php endif; ?>
            
            <a id="btnEmpty" href="listaProdotti.php?action=empty"><i class="material-icons ">remove_shopping_cart</i> Svuota Carrello</a>
       
         <div id="bannerProdotti">
         	<script>!function(d,l,e,s,c){e=d.createElement("script");e.src="//ad.altervista.org/js.ad/size=300X250/?ref="+encodeURIComponent(l.hostname+l.pathname)+"&r="+Date.now();s=d.scripts;c=d.currentScript||s[s.length-1];c.parentNode.insertBefore(e,c)}(document,location)</script>
        </div>
       </div>
       </div>
        



       <!-- <div class="txt-heading">Prodotti</div>-->
        <div id="product-grid" class="listaProdotti col-lg-8 col-12" style="clear:both"> <!-- class="listaProdotti col-lg-7 col-12" -->
            <form id="formCerca" action="azioni.php" class="col-12">
                <h2 class= "titoloCerca">Cerca Prodotto</h2>
                <input id="cercaProdotto" class="form-control" type="text" placeholder="Cerca" aria-label="Search">
            </form>

            <div class="col-lg-12">
                <div class="categorie">
                    <ul>
                        <li class="active cat" data-filter="*">Tutti</li>
                        <li class="cat">Alberi</li>
                        <li class="cat">Piante Grasse</li>
                        <li class="cat">Piante Giardino</li>
                         <li class="cat">Piante da Interno</li>
                    </ul>
                </div>
            </div>
            
                <?php
                    $dbHelper = new DBHelper();
                    $sql = $dbHelper->getProdotti();
                    $stmt = $conn->query($sql);
                    $product_array = $stmt->fetchAll();
                    if (!empty($product_array)): ?>
                        <?php foreach($product_array as $key=>$value): ?>
                            <div class=" product-item  elementoLista">
                                <form method="post" action="listaProdotti.php?action=add&code=<?php echo $product_array[$key]["_id_pianta"]; ?>">
                                <div class="product-image"><img alt='imgElemento' src="<?php echo $product_array[$key]["Image"]; ?>"></div>
                                <div class="containerNomeProdotto">
                                    <div class="nomeProdotto"><?php echo $product_array[$key]["Nome"]; ?></div>
                                    <div>Prezzo: <span><?php echo $product_array[$key]["Prezzo"]; ?></span>€</div>
                                    <div>Sconto: <span><?php echo $product_array[$key]["Sconto"]; ?></span>%</div>
                                    <div class="categoriaProdotto">Categoria: <span><?php echo $product_array[$key]["Categoria"]; ?></span></div>
                                    <div>Altezza Massima: <span><?php echo $product_array[$key]["AltezzaMax"]; ?> metri</span></div>
                                    <div class="containerAggiungi">
                                        <input type="text" id="inputQuantita"class="product-quantity" name="quantita" value="1" size="2" />
                                        <button  type="submit" value="Add to Cart" class='btnAggiungi waves-effect waves-light btn'> <i class='material-icons'>add_shopping_cart</i></button>
                                    </div>

                                </div>
                                </form>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
            </div>
          
    </main>

  
<?php //include "footer.php"?>
  

    <script  src="app.js"></script>
      <script  src="filtro.js"></script>

</body>
</html>
