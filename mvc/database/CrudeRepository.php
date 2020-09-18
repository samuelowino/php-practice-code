<?php
    interface CrudeRepository{

        /**
         * Create entity in database
         * 
         * @param $entity - Generic entity
         */
        public function create($entity);

        /**
         * Find entity by @unique $id
         * @param $id
         */
        public function findByOneById($id);

        /**
         * Find all existing values in database
         * 
         */
        public function findAll();

        /**
         * Update entity
         * 
         * @param $id
         * @param $entity
         */
        public function update($id, $entity);

        /**
         * Delete the entity based on it's $id
         * @param $id
         */
        public function delete($id);

        /**
         * Check if entity exists based on its $id
         * 
         */
        public function existsById($id);
    }
?>