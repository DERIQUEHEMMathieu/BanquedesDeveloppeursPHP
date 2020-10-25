<?php

class Account
{

  protected int $id;
  protected array $user;
  protected array $account;
  protected int $accountID;

  public function setId(int $id) {
    $this->id = $id;
  }

  public function getId():int {
    return $this->id;
  }

  public function hydrate(array $data) {
    foreach ($data as $key => $value) {
      $methode = "set". ucfirst($key);
      $this->$methode($value);
    }
    }

    function __construct(array $data = null)
    {
    if($data) {
    $this->hydrate($data);
    }
    }
}