<?php 
    class NotesServiceImpl implements NoteService{
        
        private NotesRepository $notesRepository;

        public function __construct(){
            $notesRepository = new NotesRepository();
        }

        /**
         * Create a new note
         * @param $Note
         * 
         */
        public function createNote(Note $note){
            $this->notesRepository->create($note);
        }

        /**
         * Delete existing note
         * @param $id
         * 
         */
        public function deleteNote($id){
            $this->notesRepository->delete($id);
        }

        /**
         * Get notes belonging to this owner email
         * @param $ownerEmail
         */
        public function getOwnerNotes($ownerEmail){
            $note = new Note();
            $note = $this->notesRepository->findByUserId($ownerEmail);
            return $note;
        }

        /**
         * Get all notes
         *
         */
        public function getAllNotes(){
           $notes = array();
           $notes = $this->notesRepository->findAll();
           return $notes;
        }
    }
?>
