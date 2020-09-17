<?php 

    include 'dateTimeUtils.php';

    # Hello World
    echo "\nHello World PHP";

    # Conditional
    if(1 == 1){
        echo "\nOne is equal to one";
    }

    # Basic Data Types & Variables
    $firstName = "Joel";
    $lastName = "Wanga";
    $age = 21;
    $isStudent = false;
    $averageMarks = 24.5;
    

    # Concatenation
    echo "\nStudent Details:\nFirst Name "
    .$firstName.":Last Name " 
    .$lastName.":age " 
    .$age.":isStudent " 
    .$isStudent." Average Marks" 
    .$averageMarks."|";

    # Constants
    CONST PI = 3.14;
    CONST APP_NAME = "facebook";
    CONST YEAR_OF_LEARNING = 2020;

    echo "\nConstants\nPI".PI."\nAPP_NAME".APP_NAME."\nYEAR OF LEARNING".YEAR_OF_LEARNING;

    # Expressions and Operators
    ## Arithmetic
    $milk = 211;
    $meat = 500;
    $teaLeaves = 400;

    ###Sum
    $budget = $milk + $meat + $teaLeaves;

    echo "\nBudget = milk + meat + teaLeves:".$budget;

    ###Subtraction
    $minusMilk = $budget - $milk;

    echo "\nMinusMilk = budget - milk:".$minusMilk;

    ###Multiplication
    $yearlyBudget = $budget * 12;

    echo "\nYearly budget = budget * 12:".$yearlyBudget;

    ###Division
    $averageBudget = $budget / 3;

    echo "\nAverage budget = budget / 3:".$averageBudget;

    ##Logical Operators
    echo "\nPHP Logical Operators";

    ###Equal
    if($milk = 211){
        echo "\nMilk price is equal to 211";
    }

    if($budget > 1000){
        echo "\nBudget is greater than 1000";
    }else {
        echo "\nBudget is not greater than 1000";
    }

    if($budget < 2000){
        echo "\nBudget is less than 2000";
    }else{
        echo "\nBudget is not less than 2000";
    }

    ###AND
    if($budget > 1000 && $milk < 1000){
        echo "\nBudget is greater than 1000 and milk is less than 1000";
    }else{
        echo "\nBudget is not greater than 1000 and milk and not less than 1000, one of the conditions is false";
    }

    ###OR
    if($budget > 1000 || $milk === 100){
        echo "\nEither budget is greater than 1000 OR milk is equal to 100";
    } else {
        echo "\nBudget is not greater than 1000 and milk is not equal to 100, none of the conditions are true";
    }

    if($budget !== 1000){
        echo "\nBudget is not equal to 1000";
    }else{
        echo "\nBudget is actually equal to 1000";
    }


    ##Switch Statement with forLoop
    for($count = 0;$count < 4;$count++){
        switch($count){
            case 0:
                echo "\nMilk price passed into switch";
            break;
            case 1:
                echo "\nMeat price passed into switch";
            break;
            case 2:
                echo "\nTea Leaves prices passed into swtich statement";
            break;
            default:
                echo "\nNo Matching value passed into this switch statement";
        }
    }


    # While Loop
    $age = 1;

    while($age < 18){
        echo "\nUnder age users are forbidden...";
        $age++;
    }

    echo "\nCongratulations you are not under age:".$age;

    # Do-While Loop
    $year = 1995;
    do{
        echo "\nWe are waiting for 2021, still not yet this is still ".$year;
        $year++;
    }while($year != 2021);

    echo "\nWelcome to the year ".$year."!!";

    # PHP Collections - Arrays && forEach loops

    $studentIds = array(1,2,3,4,5,6,7,8);
    $cities = array("Washington DC","Nairobi","Sydney","Beirut");
    $currecies = array("USD","KSH","EUR","AUD");

    foreach($studentIds as $ID){
        echo "\nStudent ID:".$ID;
    }

    foreach($cities as $city){
        echo "\nCity:".$city;
    }

    foreach($currecies as $currency){
        echo "\nCurrency:".$currency;
    }

    # Functions

    function printMessage($message){
        echo "\nThe message received is".$message;
    }

    function sum($val1,$val2){
        $sum = $val1 + $val2;
        return $sum;
    }

    printMessage("\nPHP is actaully not that bad...");
    $sum = sum($milk, $meat);
    echo "\nSum from func sum() is :".$sum;

    ## Include files
    echo "\n\nCurrent DateTime ".getCurrentDate();

    echo "\nCurrent TimeStamp ".getTimeStamp();


?>