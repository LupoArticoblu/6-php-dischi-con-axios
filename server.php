<?php
$string = file_get_contents('dischi.json');
$disc_list = json_decode($string, true);
$result = [];

//usare empty qui è un errore poiche l'oggetto indicizzato a 0 mi restituisce null e quindi mi fornirà come result la lista array di dischi
if (!isset($_GET['discIndex'])) {
  //non invio la richiesta dettaglio e quindi stampo tutti i dischi
  $result = $disc_list;
}else{
  //invio la richiesta dettaglio
  $result = $disc_list[$_GET['discIndex']];
}

header('Content-Type: application/json');

echo json_encode($result);