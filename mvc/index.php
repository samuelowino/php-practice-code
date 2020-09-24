<?php
    require("vendor/autoload.php");

    $userService = new App\Services\Impl\UserServiceImpl();
    $notesService = new App\Services\Impl\NoteServiceImpl();

    $user = new App\Model\User();
    $user->setId(1);
    $user->setFirstName("Spider");
    $user->setLastName("Man");
    $user->setEmail("spider.man@spiderweb.com");
    $user->setPassword("supersecretpassword");
    $user->setPhoneNumber("+165711111111");

    $userService->registerUser($user);

?>

