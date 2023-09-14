<?php
    session_start();
    include("style.php");
    require("model.php");
    $action = $_GET['action'] ?? NULL;
    $auth = $_SESSION['user_logged_in'] ?? NULL;
    if($auth == NULL){
        include("topNa.php");
    }
    if($auth == 1){
        include("topA.php");
    }

    if(isset($_POST['dbAction'])){
        $dbAction = $_POST['dbAction'];
        if($dbAction == "create"){
            create();
        }
        if($dbAction == "login"){
            $verify = verify();
            if($verify == 1){
                $_SESSION['user_logged_in'] = TRUE;
                header('Location:index.php');
            }else{
                echo "problem signing in!";
                $action = "login";
            }
        }
    }
    if($action == NULL){
        $elements = read();
        include("home.php");
    }

    if($action == "create"){
        include("create.php");
    }

    if($action == "login"){
        include("login.php");
    }

    if($action == "logout"){
        include("logout.php");
    }
    if($action == "secret"){
        include("secret.php");
    }
?>