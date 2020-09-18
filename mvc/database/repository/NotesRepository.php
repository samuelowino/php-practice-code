<?php
    class NotesRepository implements CrudeRepository{
        
        CONST TABLE_NAME = "notes_tb";
        private DatabaseContract $connector;

        public function __constructor(){
            $this->connector = new DatabaseContract();
        }
        
        /**
         * Create entity in database
         * 
         * @param $entity - Generic entity
         */
        public function create($entity){
            $connection = $this->connector->dbConnect();
            $this->connector->insertNote($entity, $connection);
        }

        /**
         * Find entity by @unique $id
         * @param $id
         * 
         */
        public function findByOneById($id){
            $this->connector->findNoteById($id);
        }

        /**
         * Find all existing values in database
         * 
         */
        public function findAll(){
            $this->connector->findAllNotes($id);
        }

        /**
         * Update entity
         * 
         * @param $id
         * @param $entity
         * 
         */
        public function update($id, $entity){
            $this->connector->updateNote($id, $entity);
        }

        /**
         * Delete the entity based on it's $id
         * @param $id
         */
        public function delete($id){
            $this->connector->deleteNote($id);
        }

        /**
         * Check if entity exists based on its $id
         * 
         */
        public function existsById($id){
            $this->connector->notesExistsById($id);
        }
    }
?>