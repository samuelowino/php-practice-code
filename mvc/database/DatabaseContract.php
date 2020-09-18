<?php 
    class DatabaseContract{
        private mysqli $connection;
        private $database_name = "nebula_notes_db";
        private $host = "localhost";
        private $port = "3306";
        private $username = "root";
        private $password = "";

        private CONST NOTES_TABLE_NAME = "notes_tb";
        private CONST USERS_TABLE_NAME = "users_tb";

        public function dbConnect(){
            if(is_null($this->connection)){
                $this->connection = new mysqli($this->host, 
                $this->username, 
                $this->password);
            }
            return $this->connection;
        }

        public function createNotesTable(mysqli $connection){
            $sql = "CREATE TABLE IF NOT EXISTS ".NotesRepository::TABLE_NAME 
            ." (id int(11),"
            ."ownerId int(11),"
            ."created VARCHAR(22) "
            ."title VARCHAR(225) "
            ."body VARCHAR(225);";
            $connection->query($sql);
            $connection->close();
        }

        public function createUsersTable(mysqli $connection){
            $sql = "CREATE TABLE IF NOT EXISTS ".UserRepository::TABLE_NAME
            ." (id int(11), "
            ."firstName VARCHAR(225), "
            ."lastName VARCHAR(225), "
            ."email VARCHAR(225), "
            ."phoneNumber VARCHAR(225), "
            ."password VARCHAR(225));";

            $connection->query($sql);
            $connection->close();
        }

        public function createDatabaseIfNeccessary(mysqli $connection){
            $sql = "CREATE DATABASE IF NOT EXISTS ".$this->database_name;
            $connection->query($sql);
            $connection->close();
        }

        public function insertNote(Note $entity, mysqli $connection){
            $id = $entity->getId();
            $ownerId = $entity->getOwnerId();
            $created = $entity->getCreated();
            $title = $entity->getTitle();
            $body = $entity->getBody();


            $sql = "INSERT INTO ".NotesRepository::TABLE_NAME.
            " VALUES("
            ." (".$id.",".$ownerId.",".$created.",".$title.",".$body.");";

            $connection->query($sql);
        }

        public function findNoteById($id, mysqli $connection){

            $note = new Note();

            $sql = "SELECT * FROM ".NotesRepository::TABLE_NAME
            ."WHERE id = ".$id;
            $cursor = $connection->query($sql);
            if($cursor->num_rows > 0){
                while($row = $cursor->fetch_assoc){
                    $note->setId($row["id"]);
                    $note->setOwnerId($row["ownerId"]);
                    $note->setCreated($row["created"]);
                    $note->setTitle($row["title"]);
                    $note->setBody($row["body"]);
                }
                return $note;
            } else{
                echo "No values found in db";
                return null;
            }
        }


    }
?>
