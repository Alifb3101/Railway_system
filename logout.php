<?php 
    session_start();
    
    //check is user logged-in or not
    //if logged-in then logout the user    
    if(isset($_SESSION["uname"])){
        $_SESSION["uname"]= null;
        unset($_SESSION["uname"]);    
    }

    //this is for admin
    if(isset($_SESSION["adminuname"])){
        $_SESSION["adminuname"]= null;
        unset($_SESSION["adminuname"]);    
    }
    session_destroy();

    // redirect to index page with logout=1
    header("location: index.php?logout=1");
 ?>