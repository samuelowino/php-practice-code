<?php 
    interface NoteService {

        /**
         * Create a new note
         * @param $Note
         * 
         */
        public function createNote(Note $note);

        /**
         * Delete existing note
         * @param $id
         * 
         */
        public function deleteNote($id);

        /**
         * Get notes belonging to this owner email
         * @param $ownerEmail
         */
        public function getOwnerNotes($ownerEmail);

        /**
         * Get all notes
         *
         */
        public function getAllNotes();

    }
?>
