<?php
   include "./azioni.php";
   // include "lista.php";
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
         <link href="assets/css/bootstrap-responsive.css" rel="stylesheet">
      <?php include "head.php"?>
   
   </head>
    <body>
        <div class="row">  
           
           <div class="col-11 regionLogin">
                <h2 class="titoloLogin">Login</h2>
                    <form class="row form-horizontal" method="post">
                            <div class="col-md-5 col-lg-5">
                                <input type="text" class="form-control" id="inputUser" placeholder="Username" name="username">
                            </div>
                            <div class="col-md-5 col-lg-5">
                                <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
                            </div>
                            <div class="col-md-12 col-lg-12">
                                <button type="submit" class="btn btn-primary" name="login">Login</button>
                            </div>						
                    </form>

            </div>
             <div class="col-12 d-none d-lg-block ">
          		<div style="width: 728px; margin: 0px auto;">
            	<script>!function(d,l,e,s,c){e=d.createElement("script");e.src="//ad.altervista.org/js.ad/size=728X90/?ref="+encodeURIComponent(l.hostname+l.pathname)+"&r="+Date.now();s=d.scripts;c=d.currentScript||s[s.length-1];c.parentNode.insertBefore(e,c)}(document,location)</script>
          		</div>
          </div>
            <div class="col-sm-11 regionLogin">
                <h2 class="titoloLogin">Registrati</h2>
                    <form class="row form-horizontal" method="post">
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="inputName" placeholder="Nome" name="name">
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="inputSurname" placeholder="Cognome" name="surname">
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" id="inputUser" placeholder="Username" name="username">
                            </div>
                            <div class="col-md-5">
                                <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email">
                            </div>
                            <div class="col-md-5">
                                <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
                            </div>
                            <div class="col-md-12 col-sm-12">
                                <button type="submit" class="btn btn-primary" name="register">Registrati</button>
                            </div>
                    </form>
            </div>           
        </div>
        
        <?php include "footer.php"?>
            
    </body>
</html>
