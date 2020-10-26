<?php
abstract class Hydrate {
  protected ?int $id;

  public function getId():int
  {
      return $this->id;
  }


  public function setId(int $id):self
  {
      $this->id = $id;

      return $this;
  }

  protected function hydrate(array $data) {
    foreach ($data as $key => $value) {
      $method = "set" . ucfirst($key);
      if(method_exists($this, $method)) {
        // Santize every entries in object
        $value = htmlspecialchars($value);
        $this->$method($value);
      }
    }
  }
}
?>