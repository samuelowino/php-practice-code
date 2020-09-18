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
            $this->notesRepository->getByUserEmail($ownerEmail);
        }

        /**
         * Get all notes
         *
         */
        public function getAllNotes(){
            $this->notesRepository->getAllNotes();
        }
    }
?>
