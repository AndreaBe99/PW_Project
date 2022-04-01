<?php

	$host = "localhost";
	$user = "pw0252051";
	$password = "";
	$database = "my_pw0252051";
	$conn = new PDO("mysql:host=localhost;dbname=$database","$user","");
class DBHelper{
	public function setIndirizzo($nome, $email, $cellulare, $indirizzo, $citta, $provincia, $zip){
		$query = "INSERT INTO `vivaio_indirizzo` (`Nome`, `Email`, `Cellulare`, `Via`, `Citta`, `Provincia`, `Zip`) VALUES ('$nome', '$email', '$cellulare', '$indirizzo', '$citta', '$provincia', '$zip')"; 
		return $query;
	}

	public function setPagamento($nomecarta, $numerocarta, $mesescadenza, $annoscadenza, $cvv){
        $query = "INSERT INTO `vivaio_pagamento` (`NomeCarta`, `NumeroCarta`, `Mese`, `Anno`, `Cvv`) VALUES ('$nomecarta', '$numerocarta', '$mesescadenza', '$annoscadenza', '$cvv')";
		return $query;
	}

	public function setOrdine($utente, $last_id_Indirizzo, $last_id_Pagamento, $data, $stato, $total_price){
        $query = "INSERT INTO `vivaio_ordine` (`Utente`, `Indirizzo`, `Pagamento`, `Data`, `Stato`, `Totale`) VALUES ('$utente', '$last_id_Indirizzo', '$last_id_Pagamento', '$data', '$stato', '$total_price')"; 
		return $query;    
	}

	public function setContiene($last_id_Ordine, $pianta, $quantita){
		$query = "INSERT INTO `vivaio_contiene` (`Ordine`, `Pianta`, `Quantita`) VALUES ('$last_id_Ordine', '$pianta', '$quantita')";
		return $query; 
	}

	public function getCarrelloOrdine($_id_ordine){
		$sql = "SELECT * FROM vivaio_contiene, vivaio_pianta WHERE vivaio_pianta._id_pianta=vivaio_contiene.Pianta AND vivaio_contiene.Ordine=$_id_ordine";
        return $sql;
	}

	public function deleteContiene($ordine){
		$sql = "DELETE FROM vivaio_contiene WHERE  vivaio_contiene.Ordine=$ordine";  
		return $sql;
	}

	public function deleteOrdine($ordine){
		$sql = "DELETE FROM vivaio_ordine WHERE  vivaio_ordine._id_ordine=$ordine";   
		return $sql;
	}

	public function getProdotti(){
		$sql = "SELECT * FROM vivaio_pianta ORDER BY _id_pianta ASC";   
		return $sql;
	}

	public function getUtente($username){
		$sql = "SELECT * FROM vivaio_utente WHERE username = $username";  
		return $sql;
	}

	public function getUtenteID($id){
		$sql = "SELECT * FROM vivaio_utente WHERE _id_utente = $id";  
		return $sql;
	}

	public function setUtente($name, $surname, $email, $username, $password){
	  	$sql = "INSERT INTO `vivaio_utente` (`nome`, `cognome`, `email`, `username`, `password`) VALUES ('$name', '$surname', '$email', '$username', '$password')";
		return $sql;
	}

	public function getPiante($code){
		$sql = "SELECT * FROM vivaio_pianta WHERE _id_pianta='$code'";
		return $sql;
	}

	public function getListaOrdine($uid){
		$sql = "SELECT * FROM vivaio_ordine, vivaio_pagamento, vivaio_indirizzo WHERE vivaio_pagamento._id_pagamento=vivaio_ordine.Pagamento AND vivaio_indirizzo._id_indirizzo=vivaio_ordine.Indirizzo AND vivaio_ordine.Utente=$uid ORDER BY vivaio_ordine._id_ordine DESC";
		return $sql;
	}
    
    public function getContatti(){
		$sql = "SELECT * FROM vivaio_contatti";
		return $sql;
	}


}


?>
