<?php 
    /**
     * User model, POPO object
     */
    
    class User{
        private $id;
        private $firstName;
        private $lastName;
        private $email;
        private $phoneNumber;
        private $password;
        
        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
        }

        public function setLastName($lastName){
            $this->lastName = $lastName;
        }

        public function getLastName(){
            return $this->lastName;
        }

        public function setEmail($email){
            $this->email = $email;
        }

        public function getEmail(){
            return $this->email;
        }

        public function setPhoneNumber(){
            return $this->phoneNumber;
        }

        public function setPassword($password){
            $this->password = $password;
        }

        public function toString(){
            return "User { id".$this->id
            ."\nLast Name:".$this->lastName
            ."\nFirst Name:".$this->firstName
            ."\nEmail:".$this->email
            ."\nPassword:".$this->password
            ."\n}";
        }
    }
?>
