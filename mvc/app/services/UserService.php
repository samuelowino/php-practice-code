<?php

    namespace App\Services;
    
    interface UserService{

        /**
         * Registers system user
         * 
         * @param $user
         * 
         */
        public function registerUser($user);

        /**
         * Sign in returning user
         * @param $email
         * @param $password
         * 
         */
        public function signInUser($email, $password);

        /**
         * Get all registered users
         * 
         */
        public function getAllUsers();

        /**
         * Get user by email ifExists
         * @param $email
         */
        public function getUser($email);

        /**
         * Delete user by $email ifExists
         * @param $email
         */
        public function deleteUser($email);

        /**
         * Sends user forgot password email recovery
         * if email exists
         * 
         * @param $email 
         */
        public function runUserForgotPassword($email);



    }
?>
