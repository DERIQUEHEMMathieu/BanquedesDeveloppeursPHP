<?php
try {
  $db = new PDO('mysql:host=localhost;dbname=banque_php', "BanquePHP", "banque76");
} catch (\Exception $e) {
  echo "Erreur lors de la conenxion à la base de donées: " . $e->getMessage() . "<br/>";
  die();
}
?>