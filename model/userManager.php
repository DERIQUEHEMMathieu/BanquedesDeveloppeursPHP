<?php
require "model/DBmanager.php";

class UserManager extends DBmanager {
    public function get_user_by_email($post_data) {
        $query = $this->getDb()->prepare("SELECT * FROM User WHERE email = :email");
        $query->execute([
          "email" => $post_data["email"]
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
      }
}
?>