<?php
    //headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application: Json');

    include_once '../services/UserService.php';
    include_once '../services/impl/UserServiceImpl.php';

    if($_POST){
        //handle post hear
    } else if($_GET){
        //handle get method here
    } else
    //http method not supported: i.e PUT

?>
