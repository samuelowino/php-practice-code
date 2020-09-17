<?php 
    /**
     * Note model, POPO object
     */

    class Note{
        private $id;
        private $ownerId;
        private $created;
        private $title;
        private $body;

        public function setId($id){
            $this->id = $id;
        }

        public function getId(){
            return $this->id;
        }

        public function setOwnerId($userId){
            $this->ownerId = $userId;
        }

        public function getOwnerId(){
            return $this->ownerId;
        }

        public function setCreated($created){
            $this->created = $created;
        }

        public function getCreated(){
            return $this->created;
        }

        public function setTitle($title){
            return $this->title;
        }

        public function setBody($body){
            $this->body = $body;
        }

        public function getBody(){
            return $this->body;
        }
    }
?>