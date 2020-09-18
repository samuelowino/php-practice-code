<?php
    class UserRepository implements CrudeRepository {
        
        private DatabaseContract $connector;

        public function __construct(){
            $this->connector = new DatabaseContract();
        }
        
        /**
         * Create entity in database
         * 
         * @param $entity - Generic entity
         */
        public function create($entity){
            $connection = $this->getConnection();
            $this->connector->insertUser($entity, $connection);
        }

        /**
         * Find entity by @unique $id
         * @param $id
         */
        public function findByOneById($id){
            $connection = $this->getConnection();
            $this->connector->findByUserById($id, $connection);
        }

        /**
         * Find all existing values in database
         * 
         */
        public function findAll(){
            $connection = $this->getConnection();
            $this->connector->findAllUsers($connection);
        }

        /**
         * Update entity
         * 
         * @param $id
         * @param $entity
         */
        public function update($id, $entity){
            $connection = $this->getConnection();
            $this->connector->updateUser($id, $entity, $connection);
        }

        /**
         * Delete the entity based on it's $id
         * @param $id
         */
        public function delete($id){
            $connection = $this->getConnection();
            $this->connector->deleteUser($id,$connection);
        }

        /**
         * Check if entity exists based on its $id
         * 
         */
        public function existsById($id){
            $exists = false;
            $connection = $this->getConnection();
            $exists = $this->connector->userExistsById($id,$connection);
            return $exists;
        }

        public function getConnection(){
            $connection = $this->connector->dbConnect();
            return $connection;
        }
    }
?>