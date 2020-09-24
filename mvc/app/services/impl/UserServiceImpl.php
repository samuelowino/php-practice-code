<?php 
    namespace App\Services\Impl;
    use App\Model\User;
    use App\Services\UserService;
    use App\Database\Repository\UserRepository;
    use App\Database\DatabaseContract;

    class UserServiceImpl implements UserService {

        private UserRepository $userRepository;

        public function __construct(){
            echo "\nUser service instantiated";
            $this->connector = new DatabaseContract();
            $userRepository = new UserRepository();
        }

        /**
         * Registers system user
         * 
         * @param $user
         * 
         */
        public function registerUser(User $user){
            echo "\n\n__User service create user ".$user->toString();
            $userRepository = new UserRepository();
            $userRepository->create($user);
        }

        /**
         * Sign in returning user
         * 
         * @param $email
         * @param $password
         * 
         */
        public function signInUser($email, $password){
            //TODO sign in user
        }

        /**
         * Get all registered users
         * 
         */
        public function getAllUsers(){
            $this->userRepository->findAll();
        }

        /**
         * Get user by email ifExists
         * @param $email
         * 
         */
        public function getUser($email){
            $this->userRepository->findByEmail($email);
        }

        /**
         * Delete user by $email ifExists
         * @param $email
         * 
         */
        public function deleteUser($email){
            $this->userRepository->deleteUserByEmail($email);
        }

        /**
         * Sends user forgot password email recovery
         * if email exists
         * 
         * @param $email
         *  
         */
        public function runUserForgotPassword($email){
            //TODO user password recovery service
        }
    }
?>
