<?php

require_once "model/entity/hydrate.php";

class Operation extends Hydrate {
  protected string $operation_type;
  protected int $operation_amount;
  protected string $registered;
  protected ?string $label;

  public function __construct(array $data = null) {
    if($data) {
      $this->hydrate($data);
    }
  }

  public function getOperation_type(): string
   {
       return $this->operation_type;
   }


  public function setOperation_type(string $operation_type): Operation
  {
      $this->operation_type = $operation_type;

      return $this;
  }

  public function getOperation_amount(): int
  {
       return $this->operation_amount;
  }


  public function setOperation_amount(int $operation_amount):Operation
  {
      $this->operation_amount = $operation_amount;

      return $this;
  }

  public function getRegistered():string
  {
       return $this->registered;
  }


  public function setRegistered(string $registered):Operation
  {
      $this->registered = $registered;

      return $this;
  }

  public function getLabel():?string
  {
       return $this->label;
  }


  public function setLabel(?string $label):Operation
  {
      $this->label = $label;

      return $this;
  }

}
?>