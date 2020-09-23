<?php 

    require('../../database/DatabaseContract.php');
    require('../../database/CrudeRepository.php');
    require('../UserService.php');
    require('../../database/repository/UsersRepository.php');

    class UserServiceImpl implements UserService {

        private UserRepository $userRepository;

        public function __construct(){
            echo "User service instantiated";
            $this->connector = new DatabaseContract();
        }

        /**
         * Registers system user
         * 
         * @param $user
         * 
         */
        public function registerUser($user){
            $this->userRepository->create($user);
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
