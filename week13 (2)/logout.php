<?php
echo "Logout";
$auth = $_SESSION['user_logged_in'] ?? NULL;
if($auth == NULL){
    header('Location:index.php');
}
if($auth == 1){
    session_unset();
    echo "here";
    header('Location:index.php');
}

?>