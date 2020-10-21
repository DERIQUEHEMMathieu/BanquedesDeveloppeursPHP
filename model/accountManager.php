<?php

class AccountManager extends DBmanager {
 // Get all accounts with the last related operation for the logged user
    public function get_accounts(Array $user) :?Array {
        $query = $this->_db->prepare(
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
}