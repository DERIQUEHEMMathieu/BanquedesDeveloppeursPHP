<?php
require "model/connexion.php";

// Function used to log the user
function get_user_by_email($db, $post_data) {
  $query = $db->prepare("SELECT * FROM User WHERE email = :email");
  $query->execute([
    "email" => $post_data["email"]
  ]);
  return $query->fetch(PDO::FETCH_ASSOC);
}
?>