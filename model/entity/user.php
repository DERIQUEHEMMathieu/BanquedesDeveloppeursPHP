<?php
require_once "model/entity/hydrate.php";

class User extends Hydrate {

  protected string $lastname;
  protected string $firstname;
  protected string $email;
  protected string $city;
  protected string $cityCode;
  protected string $sex;
  protected string $password;
  protected string $birthdate;

  public function __construct(array $data = null) {
    if($data) {
      $this->hydrate($data);
    }
  }

  public function getLastname():string
  {
      return $this->lastname;
  }


  public function setLastname(string $lastname):User
  {
      $this->lastname = $lastname;

      return $this;
  }

  public function getFirstname():string
  {
      return $this->firstname;
  }


  public function setFirstname(string $firstname):User
  {
      $this->firstname = $firstname;

      return $this;
  }

  public function getEmail():string
  {
      return $this->email;
  }


  public function setEmail(string $email):User
  {
      if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $this->email = $email;
        return $this;
      }
      throw new Exception("Format d'email incorrect");
  }

  public function getCity():string
  {
      return $this->city;
  }


  public function setCity(string $city):User
  {
      $this->city = $city;

      return $this;
  }

  public function getCityCode():string
  {
      return $this->cityCode;
  }


  public function setCityCode(string $cityCode):User
  {
      $this->cityCode = $cityCode;

      return $this;
  }

  public function getSex():string
  {
      return $this->sex;
  }


  public function setSex(string $sex):User
  {
      $this->sex = $sex;

      return $this;
  }

  public function getPassword():string
  {
      return $this->password;
  }


  public function setPassword(string $password):User
  {
      $this->password = $password;

      return $this;
  }

  public function getBirthdate():string
  {
      return $this->birthdate;
  }


  public function setBirthdate(string $birthdate):User
  {
      $this->birthdate = $birthdate;

      return $this;
  }

}
?>