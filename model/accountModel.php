<?php
require "model/DBmanager.php";

class UserManager extends DBmanager {

}


// Get all accounts with the last related operation for the logged user
function get_accounts(PDO $db, Array $user) :?Array {
  $query = $db->prepare(
    "SELECT a.id, a.amount, a.opening_date, a.account_type, o.amount AS operation_amount, o.registered, o.label
     FROM Account AS a
     LEFT JOIN (
    	  SELECT o1.* FROM Operation as o1
        LEFT JOIN Operation AS o2
        ON o1.account_id = o2.account_id
        AND o1.id < o2.id
        WHERE o2.id IS NULL
    ) AS o
    ON a.id = o.account_id
    WHERE user_id = :user_id"
  );
  $query->execute([
    "user_id" => $user["id"]
  ]);
  return $query->fetchAll(PDO::FETCH_ASSOC);
}

// Get one account withe all the related operations
function get_single_account($db, $id) {
  $query = $db->prepare(
    "SELECT a.*, o.id AS operation_id, o.operation_type, o.amount AS operation_amount, o.label, o.registered FROM Account AS a
     LEFT JOIN Operation AS o
     ON a.id = o.account_id
     WHERE a.id = :id
     ORDER BY operation_id DESC
  ");
  $query->execute([
    "id" => $id
  ]);
  return $query->fetchAll(PDO::FETCH_ASSOC);
}

// Get one account information (used in the update amount process)
function get_only_account($db, $id, $user) {
  $query = $db->prepare(
    "SELECT id, amount FROM Account
     WHERE id = :id
     AND user_id = :user_id"
   );
  $query->execute([
    "id" => $id,
    "user_id" => $user["id"]
  ]);
  return $query->fetch(PDO::FETCH_ASSOC);
}

// Get the list of accounts for one user in order to make dropdown menus
function get_account_list($db, $user) {
  $query = $db->prepare(
    "SELECT id, account_type, amount FROM Account
    WHERE user_id = :user_id"
  );
  $query->execute([
    "user_id" => $user["id"]
  ]);
  return $query->fetchAll(PDO::FETCH_ASSOC);
}

// Update the amount of one account (used in operation process)
function update_account_amount($db, $account) {
  $query = $db->prepare(
    "UPDATE Account
    SET amount = :amount
    WHERE id = :id"
  );
  $result = $query->execute([
    "amount" => $account["amount"],
    "id" => $account["id"]
  ]);
  return $result;
}

function new_account($db, $account, $user) {
  $query = $db->prepare(
    "INSERT INTO Account(amount, opening_date, account_type, user_id)
    VALUES(:amount, NOW(), :account_type, :user_id)"
  );

  $result = $query->execute([
    "amount" => $account["amount"],
    "account_type" => $account["account_type"],
    "user_id" => $user["id"]
  ]);
  return $result;
}

function suppressAccount (PDO $db, int $accountID) {
  var_dump($db);
  $query = $db->prepare(
    "DELETE FROM Account
    WHERE id = :account_id
  ");
  $result = $query->execute([
    "account_id"=>$accountID
  ]);
  var_dump($result);
  return $result;
}
?>