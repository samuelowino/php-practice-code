<?php 

    namespace App\Database;
    use App\Model\Note;
    use App\Model\USer;

    class DatabaseContract{
        private \mysqli $connection;
        private $database_name = "nebula_notes_db";
        private $host = "localhost";
        private $port = "3306";
        private $username = "root";
        private $password = "";

        private CONST NOTES_TABLE_NAME = "notes_tb";
        private CONST USERS_TABLE_NAME = "users_tb";

        function __construct()
        {
            echo "__Database contract instatiated__";
        }

        public function dbConnect(){
            echo "\n__Connecting to db...\n";
            echo "__mysqli connection is null... connecting...";
            $this->connection = new \mysqli($this->host, 
            $this->username, 
            $this->password);
        
            echo "__ completed connection creation__";
            return $this->connection;
        }

        public function createNotesTable(\mysqli $connection){
            $sql = "CREATE TABLE IF NOT EXISTS "
            .self::NOTES_TABLE_NAME 
            ." (id int(11),"
            ."ownerId int(11),"
            ."created VARCHAR(22) "
            ."title VARCHAR(225) "
            ."body VARCHAR(225);";
            $connection->query($sql);
            $connection->close();
        }

        public function createUsersTable(\mysqli $connection){
            $sql = "CREATE TABLE IF NOT EXISTS "
            .self::USERS_TABLE_NAME
            ." (id int(11), "
            ."first_name VARCHAR(225), "
            ."last_name VARCHAR(225), "
            ."email VARCHAR(225), "
            ."phone_number VARCHAR(225), "
            ."password VARCHAR(225));";

            $connection->query($sql);
            $connection->close();
        }

        public function createDatabaseIfNeccessary(\mysqli $connection){
            $sql = "CREATE DATABASE IF NOT EXISTS ".$this->database_name;
            $connection->query($sql);
            $connection->close();
        }

        /**
         * =======================
         * | Notes Persistence   |
         * =======================
         */

        public function insertNote($entity, \mysqli $connection){
            $id = $entity->getId();
            $ownerId = $entity->getOwnerId();
            $created = $entity->getCreated();
            $title = $entity->getTitle();
            $body = $entity->getBody();


            $sql = "INSERT INTO ".self::NOTES_TABLE_NAME
            ." VALUES("
            ." (".$id.",".$ownerId.",".$created.",".$title.",".$body.");";

            $connection->query($sql);
        }

        public function findNoteById($id, \mysqli $connection){

            $note = new Note();

            $sql = "SELECT * FROM ".self::NOTES_TABLE_NAME
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

        public function findAllNotes(\mysqli $connection){
            $notes = array();

            $sql = "SELECT * FROM ".self::NOTES_TABLE_NAME;
            $cursor = $connection->query($sql);
            if($cursor->num_rows > 0){
                while($row = $cursor->fetch_assoc){
                    $note = new Note();
                    $note->setId($row["id"]);
                    $note->setOwnerId($row["ownerId"]);
                    $note->setCreated($row["created"]);
                    $note->setTitle($row["title"]);
                    $note->setBody($row["body"]);

                    $notes = array_push($notes, $note);
                }
            }

            return $notes;
        }

        public function updateNote($id, Note $entity, $connection){
            $sql = "UPDATE TABLE ".self::NOTES_TABLE_NAME
            ." SET title = ".$entity->getTitle().","
            ."body = ".$entity->getBody()
            ." WHERE id = ".$entity->getId()
            .";"; 

            $connection->query($sql);
        }

        public function deleteNote($id, \mysqli $connection){
            $sql = "DELETE FROM ".self::NOTES_TABLE_NAME
            ." WHERE id = ".$id
            .";";
            $connection->query($sql);
        }

        public function notesExistsById($id,\mysqli $connection){
            $exists = false;
            
            $sql = "SELECT COUNT(*) AS total FROM "
            .self::NOTES_TABLE_NAME
            ." WHERE id = ".$id;
            
            $cursor = $connection->query($sql);
            if($cursor->num_rows > 0){
                $row = $cursor->fetch_assoc;
                $exists = $row["total"] > 0;
            }

            return $exists;
        }

        public function getNotesByOwnerId(\mysqli $connection, $ownerId){
            $note = new Note();

            $sql = "SELECT * FROM ".self::NOTES_TABLE_NAME
            ." WHERE ownerId = ".$ownerId;
            $cursor = $connection->query($sql);
            if($cursor->num_rows > 0){
                while($row = $cursor->fetch_assoc){
                    $note->setId($row["id"]);
                    $note->setOwnerId($row["ownerId"]);
                    $note->setCreated($row["created"]);
                    $note->setTitle($row["title"]);
                    $note->setBody($row["body"]);
                }
            }

            return $note;
        }

        /**
         * =================
         * | User Persistence |
         * =================
         */


        public function insertUser(User $entity,\mysqli $connection){
            echo "Database contract insert user ".$entity;
            
            $sql = "INSERT INTO ".self::USERS_TABLE_NAME
            ."VALUES ("
            .$entity->getId()
            .","
            .$entity->getFirstName()
            .","
            .$entity->getLastName()
            .","
            .$entity->getEmail()
            .","
            .$entity->getPhoneNumber()
            .","
            .$entity->getPassword()
            .");";

            $connection->query($sql);
        
        }

        public function findByUserById($id, \mysqli $connection){
            $user = new User();
            $sql = "SELECT * FROM ".self::USERS_TABLE_NAME
            ." WHERE id = ".$id;
            $cursor = $connection->query($sql);
            if($cursor->num_rows > 0){
                $row = $cursor->fetch_assoc;
                $user->setId($row["id"]);
                $user->setFirstName($row["first_name"]);
                $user->setEmail($row["email"]);
                $user->setPhoneNumber($row["phone_number"]);
                $user->setPassword($row["password"]);
                return $user;
            }else {
                echo "No user with matching id found in database";
                return null;
            }
        }

        public function findAllUsers(\mysqli $connection){
            $users = array();
            $sql = "SELECT * FROM ".self::USERS_TABLE_NAME;
            $cursor = $connection->query($sql);
            if($cursor->num_rows > 0){
                while($row = $cursor->fetch_assoc){
                    $user = new User();
                    $user->setId($row["id"]);
                    $user->setFirstName($row["first_name"]);
                    $user->setEmail($row["email"]);
                    $user->setPhoneNumber($row["phone_number"]);
                    $user->setPassword($row["password"]);

                    $users = array_push($users,$user);
                }
            }

            return $users;
        }

        public function updateUser($id, User $entity, \mysqli $connection){
            $sql = "UPDATE TABLE ".self::USERS_TABLE_NAME
            ." SET first_name = ".$entity->getFirstName().","
            ."last_name = ".$entity->getLastName()
            ."email = ".$entity->getEmail()
            ."phone_number = ".$entity->getPhoneNumber()
            ."password = ".$entity->getPassword()
            ." WHERE id = ".$entity->getId()
            .";"; 

            $connection->query($sql);
        }

        public function deleteUser($id, \mysqli $connection){
            $sql = "DELETE FROM ".self::USERS_TABLE_NAME
            ." WHERE id = ".$id;
            $connection->query($sql);
        }


        public function userExistsById($id,\mysqli $connection){
            $exists = false;
            
            $sql = "SELECT COUNT(*) AS total FROM "
            .self::USERS_TABLE_NAME
            ." WHERE id = ".$id;
            
            $cursor = $connection->query($sql);
            if($cursor->num_rows > 0){
                $row = $cursor->fetch_assoc;
                $exists = $row["total"] > 0;
            }

            return $exists;
        }

        public function deleteUserByEmail($email, \mysqli $connection){
            $sql = "DELETE FROM ".self::USERS_TABLE_NAME
            ." WHERE email = ".$email;
            $connection->query($sql);
        }


    }
?>
