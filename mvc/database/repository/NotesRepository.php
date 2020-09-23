<?php

    require('../CrudeRepository.php');
    require('../DatabaseContract.php');

    class NotesRepository implements CrudeRepository{
        
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
            $this->connector->insertNote($entity, $connection);
        }

        /**
         * Find entity by @unique $id
         * @param $id
         * 
         */
        public function findByOneById($id){
            $connection = $this->getConnection();
            $this->connector->findNoteById($id, $connection);
        }

        /**
         * Find all existing values in database
         * 
         */
        public function findAll(){
            $connection = $this->getConnection();
            $this->connector->findAllNotes($connection);
        }

        /**
         * Update entity
         * 
         * @param $id
         * @param $entity
         * 
         */
        public function update($id,$entity){
            $connection = $this->getConnection();
            $this->connector->updateNote($id,$entity, $connection);
        }

        /**
         * Delete the entity based on it's $id
         * @param $id
         */
        public function delete($id){
            $connection = $this->getConnection();
            $this->connector->deleteNote($id, $connection);
        }

        /**
         * Check if entity exists based on its $id
         * 
         */
        public function existsById($id){
            $connection = $this->getConnection();
            $this->connector->notesExistsById($id, $connection);
        }

        public function findByUserId($ownerId){
            $note = new Note();
            $connection = $this->getConnection();
            $note = $this->connector->getNotesByOwnerId($connection, $ownerId);
            return $note;
        }

        public function getConnection(){
            $connection = $this->connector->dbConnect();
            return $connection;
        }
    }
?>