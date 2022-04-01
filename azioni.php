<?php 

    session_start();
    include("dbController.php");


if(isset($_GET['logout'])){
    session_destroy();
    $_SESSION['uid']=null;
    setcookie('LOGIN', $_SESSION['uid'], -1); // Cancella Cookie
    header("Location: /Vivaio/gestioneOrdini.php");
    exit();
}




if(isset($_POST['username']) && isset($_POST['password'])){
    try {
        $dbHelper = new DBHelper();
        $username = $conn->quote($_POST['username']);
        $sql = $dbHelper->getUtente($username);
        $stmt = $conn->query($sql);

        if($stmt->rowCount()==1){
            $res=$stmt->fetch();
            $stored_pass = $res['password'];
            $inserted_pass = md5($_POST["password"]);
            if($stored_pass==$inserted_pass){
                $_SESSION['uid']=$res['_id_utente'];
                setcookie("LOGIN", $_SESSION['uid'], time()+2592000); // Identifica l'utente + 30 giorni
                header('Location: gestioneOrdini.php');
            }
        }
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    $conn = null;
}


if(isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST["password"]);

    try {
        $conn = new PDO("mysql:host=localhost;dbname=$database","$user","");
        $dbHelper = new DBHelper();
        $sql = $dbHelper->setUtente($name, $surname, $email, $username, $password);
        $conn->exec($sql);
        $last_id = $conn->lastInsertId();
        $_SESSION['uid']=$last_id;
        header('Location: gestioneOrdini.php');

    } catch (Exception $e) {
        echo $e->getMessage();
    }
    $conn = null;
}

if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        case "add":
            if(!empty($_POST["quantita"])) {
                $dbHelper = new DBHelper();
                $id = $_GET["code"];
                $sql = $dbHelper->getPiante($id); //Prendo la Pianta con id="code"
                $stmt = $conn->query($sql);
                $productByCode = $stmt->fetchAll();
                //Metto i suoi valori in un array con il nome come chiave
                $itemArray = array($productByCode[0]["Nome"]=>array('_id'=>$productByCode[0]["_id_pianta"], 'nome'=>$productByCode[0]["Nome"], 'quantita'=>$_POST["quantita"], 'prezzo'=>$productByCode[0]["Prezzo"], 'sconto'=>$productByCode[0]["Sconto"], 'image'=>$productByCode[0]["Image"]));
                    
                if(!empty($_SESSION["cart_item"])) {	//controllo se il carrello è vuoto
                    $giaPresente = false;
                    foreach ($_SESSION["cart_item"] as $key => $value) {      //ciclo per vedere se già c'è             
                        if($key == $productByCode[0]["Nome"]){
                            $giaPresente = true;
                        }
                    }
                    if($giaPresente == true){	// Se è già presente aggiorno la quantita
                        foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productByCode[0]["Nome"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["quantita"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantita"] += $_POST["quantita"];
                            }
                        }
                    } else {	// altrimenti unico l'array del carrello con quello dell'elemento aggiunto
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            break;
        case "remove":
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_GET["code"] == $_SESSION["cart_item"][$k]['_id']){
                        if($_SESSION["cart_item"][$k]['quantita'] > 1){	// diminuisco la quantita se è piu di 1 altrimenti lo elimino
                            $_SESSION["cart_item"][$k]['quantita'] = (int)$_SESSION["cart_item"][$k]['quantita'] - 1;
                        } else {
                            unset($_SESSION["cart_item"][$k]);
                        }
                    }   				
                    if(empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                    }
                }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
        break;	
        }
    }  
?>
