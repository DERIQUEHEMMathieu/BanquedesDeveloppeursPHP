<?php
require "model/connexion.php";

// Register a new operation in database
function new_operation($db, $operation) {
  $query = $db->prepare(
    "INSERT INTO Operation(operation_type, amount, registered, account_id)
    VALUES(:operation_type, :amount, NOW(), :account_id)"
  );
  $result = $query->execute([
    "operation_type" => $operation["operation_type"],
    "amount" => $operation["amount"],
    "account_id" => $operation["account_id"]
  ]);
  return $result;
}
?>