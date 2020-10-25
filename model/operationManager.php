<?php
require "model/DBmanager.php";

class OperationManager extends DBmanager {
    public function new_operation(array $operation) {
        $query =$this->getDb()->prepare(
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
}
?>