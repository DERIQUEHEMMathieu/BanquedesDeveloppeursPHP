<?php 
    class User {
        private string $firstname;
        private string $lastname;
        private string $birth_date;
        private string $email;
        private string $password;
        // private string $confirm_password;
        private string $country;
        private string $adress;
        private int $postal_code;
        private string $city;

        public function setFirstname(string $firstname) {
            $this->firstname = $firstname;
        }
        public function setLastname(string $lastname) {
            $this->lastname = $lastname;
        }
        public function setBirth_date(string $birth_date) {
            $this->birth_date = $birth_date;   
        }
        public function setEmail(string $email) {
            $this->email = $email;
        }
        public function setPassword(string $password) {
            $this->password = $password;  
        }
        public function setCountry(string $country) {
            $this->country = $country;
        }
        public function setAdress(string $adress) {
            $this->adress = $adress;
        }
        public function setPostal_code(int $postal_code) {
            $this->postal_code = $postal_code;
        }
        public function setCity(string $city) {
            $this->city = $city;
        }

        public function getFirstname():string {
            return $this->firstname;
        }
        public function getLastname():string {
            return $this->lastname;
        }
        public function getBirth_date():string {
            return $this->birth_date;
        }
        public function getEmail():string {
            return $this->email; 
        }
        public function getPassword():string {
            return $this->password;
        }
        public function getCountry():string {
            return $this->country;
        }
        public function getAdress():string {
            return $this->adress;
        }
        public function getPostal_code():int {
            return $this->postal_code;
        }
        public function getCity():string {
            return $this->city;
        }

        // public function hydrate(array $data) {
        //     foreach ($data as $key => $value) {
        //         $method = "set" . ucfirst($key);
        //         $this->method = $value;
        //     }
        // }

        public function __construct(array $data) {
            // $this->hydrate($data);
            $this->setFirstname($data["firstname"]);
            $this->setLastname($data["lastname"]);
            $this->setBirth_date($data["birth_date"]);
            $this->setEmail($data["email"]);
            $this->setPassword($data["password"]);
            $this->setCountry($data["country"]);
            $this->setAdress($data["adress"]);
            $this->setPostal_code($data["postal_code"]);
            $this->setCity($data["city"]);
        }
    }
?>
