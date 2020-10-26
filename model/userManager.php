<?php
require "model/DBmanager.php";

class UserManager extends DBmanager {
  public function getUserByMail(User $user):?User {
    $query = $this->getDb()->prepare("SELECT * FROM User WHERE email = :email");
    $query->execute([
      "email" => $user->getEmail()
    ]);
    $query->setFetchMode(PDO::FETCH_CLASS, 'User');
    return $query->fetch();
  }
}
?>