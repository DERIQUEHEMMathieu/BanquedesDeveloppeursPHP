<?php
/**
 * Classe basique qui permet de générer une connexion à la base données
 * Les identifiants de connexion sont stockés dans des constantes
 * La fonction BD() est une fonction statique, ainsi elle peut être appelée sans instancier la classe
 * Cette class n'a pas vocation à être instanciée, elle sert simplement à renvoyer un objet PDO elle est donc abstraite
 */
abstract class dataBase {

  const HOST  = "localhost";
  const NAME = "banque_php";
  const LOGIN = "BanquePHP";
  const PASSWORD = "banque76";

  public static function DB() {
    try {
    $db = new PDO("mysql:host=" . self::HOST .";dbname=" . self::NAME , self::LOGIN, self::PASSWORD);
    return $db;
    } catch (\Exception $e) {
      echo "Erreur lors de la conenxion à la base de donées: " . $e->getMessage() . "<br/>";
      die();
    }
  }
}
?>