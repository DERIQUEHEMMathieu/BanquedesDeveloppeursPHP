<?php
require "model/DBmanager.php";
require "model/entity/hydrate.php";

class AccountManager extends DBmanager {

  public function getAccounts($user):?Array {
    $query = $this->getDb()->prepare(
      "SELECT a.id, a.amount, a.opening_date, a.account_type, o.amount AS operation_amount, o.registered, o.label
      FROM Account AS a
      LEFT JOIN Operation AS o
      ON a.id = o.account_id
      WHERE a.user_id = :user_id && (o.id = (
          SELECT MAX(o2.id)
          FROM Operation AS o2
          WHERE o2.account_id = a.id
      	)OR o.id IS NULL)"
    );
    $query->execute([
      "user_id" => $user->getId()
    ]);
    $accounts = $query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($accounts as $key => $account) {
      $accounts[$key] = new Account($account);
      if(!empty($account["operation_amount"]))
      $accounts[$key]->setLast_operation(new Operation($account));
    }
    return $accounts;
  }

  public function getSingleAccount($id, $user) {
    $query = $this->getDb()->prepare(
      "SELECT a.*, o.id AS operation_id, o.operation_type, o.amount AS operation_amount, o.label, o.registered FROM Account AS a
       LEFT JOIN Operation AS o
       ON a.id = o.account_id
       WHERE a.id = :id
       AND a.user_id = :user_id
       ORDER BY operation_id DESC
    ");
    $query->execute([
      "id" => $id,
      "user_id" => $user->getId()
    ]);
    $data = $query->fetchAll(PDO::FETCH_ASSOC);
    $account = new Account($data[0]);
    if(isset($data[0]["operation_amount"])) {
      foreach ($data as $key => $operation) {
        $operationObject = new Operation($operation);
        // Avoid to get account id in all operations
        $operationObject->setId($operation["operation_id"]);
        $account->addOperation($operationObject);
      }
    }
    return $account;
  }

  public function newAccount($account) {
    $query = $this->getDb()->prepare(
      "INSERT INTO Account(amount, opening_date, account_type, user_id)
      VALUES(:amount, NOW(), :account_type, :user_id)"
    );

    $result = $query->execute([
      "amount" => $account->getAmount(),
      "account_type" => $account->getAccount_type(),
      "user_id" => $account->getUser()->getId()
    ]);

    return $result;
  }

  public function suppressAccount (int $accountID) {
    $query = $this->getDb()->prepare(
      "DELETE FROM Account
      WHERE id = :account_id
    ");
    $result = $query->execute([
      "account_id"=>$accountID
    ]);
    return $result;
  }
}

  function get_only_account($_db, $id, $user) {
    $query = $_db->prepare(
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

  function get_account_list($_db, $user) {
    $query = $_db->prepare(
      "SELECT id, account_type, amount FROM Account
      WHERE user_id = :user_id"
    );
    $query->execute([
      "user_id" => $user["id"]
    ]);
    return $query->fetchAll(PDO::FETCH_ASSOC);
}

  function update_account_amount($_db, $account) {
    try {
      $this->pdo->beginTransaction();
      $query = $_db->prepare(
        "UPDATE Account
        SET amount = :amount
        WHERE id = :id"
      );
      $result = $query->execute([
        "amount" => $account["amount"],
        "id" => $account["id"]
      ]);
      $this->pdo->commit();
      return $result;
    } catch (\Exception $e) {
      $this->pdo->rollBack();
    }
  }
?>