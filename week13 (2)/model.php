<?php
    $dsn = "mysql:host=localhost;dbname=cs_350";
    $username = "student";
    $password = "CS350";

    try{
        $db = new PDO($dsn, $username, $password);
    }catch(PDOException $e){
        $msg = $e->getMessage();
        echo "<p>ERROR: $msg </p>";
    }

    function create(){
        $insert = "INSERT INTO cumro_13
                        (username, password)
                    VALUES
                        (:username, :password)";
        $db = $GLOBALS['db'];
        $password = password_hash($_POST["password"],PASSWORD_DEFAULT);
        $statement = $db->prepare($insert);
        $statement->bindValue(':username',$_POST['username']);
        $statement->bindValue(':password',$password);
        $statement->execute();
        $statement->closeCursor();
    }

    function read(){
        $elements = array();
        $db = $GLOBALS['db'];
        $query = "SELECT * FROM cumro_13";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch();
        while($row != NULL){
            $elements[] = $row['userId'];
            $elements[] = $row['username'];
            $elements[] = $row['password'];
            $row = $stmt->fetch();
        }
        $stmt->closeCursor();
        return $elements;
    }

    function verify(){
        $verify = false;
        $db = $GLOBALS['db'];
        $query = "SELECT * FROM cumro_13 WHERE username = :username";
        $statement = $db->prepare($query);
        $statement->bindValue(':username',$_POST['username']);
        $statement->execute();
        $row = $statement->fetch();
        if($row != NULL){
            $stored_password = $row['password'];
            $statement->closeCursor();
            $verify = password_verify($_POST['password'],$stored_password);
        }
        return $verify;
    }

    function getUser(){
        $db = $GLOBALS['db'];
        $query = "SELECT username FROM cumro_13";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch();
        while($row != NULL){
            $uname = $row['username'];
        }
        $stmt->closeCursor();
        return $uname;
    }
?>