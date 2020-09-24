<?php
    require("vendor/autoload.php");

    $userService = new App\Services\Impl\UserServiceImpl();
    $notesService = new App\Services\Impl\NoteServiceImpl();

?>

<html>
    <head>
        <title>The Nebula Notes Application</title>
    </head>
    <body>
        <p>Welcome to Nebula Notes App</p>
        <p>Sign up to Proceed</p>
        <span><a href="#">Register</a></span><br/>
        <span><a href="#">Alreay have an account? Sign in</a></span><br/>
    </body>
</html>