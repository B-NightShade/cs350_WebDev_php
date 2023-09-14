<h1>Secret!</h1>
<?php
    $auth = $_SESSION['user_logged_in'] ?? NULL;
    if($auth == NULL){
        header('Location:index.php');
    }
?>
<h2>Hello, the secret message is cookies!</h2>