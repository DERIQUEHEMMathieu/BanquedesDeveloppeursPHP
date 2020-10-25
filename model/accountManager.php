<?php
require "model/DBmanager.php";
require "model/entity/accountClass.php";
class AccountManager extends DBmanager {
 // Get all accounts with the last related operation for the logged user
    public function get_accounts(array $user) :?Array {
        $query = $this->getDb()->prepare(
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

    public function get_single_account(int $id) {
        $query = $this->getDb()->prepare(
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

    public function get_only_account( int $id, array $user) {
        $query = $this->getDb()->prepare(
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

    public function get_account_list(array $user) {
        $query = $this->getDb()->prepare(
            "SELECT id, account_type, amount FROM Account
            WHERE user_id = :user_id"
        );
        $query->execute([
            "user_id" => $user["id"]
        ]);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function update_account_amount(array $account) {
        $query = $this->getDb()->prepare(
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

      public function new_account(array $account, array $user) {
        $query = $this->getDb()->prepare(
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
?>