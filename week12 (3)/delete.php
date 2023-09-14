<?php
        $id = $_GET['id'] ?? "";
        $dsn = "mysql:host=localhost;dbname=cs_350";
        $username = "student";
        $password = "CS350";

        try{
            $db = new PDO($dsn, $username, $password);
        }catch(PDOException $e){
            $msg = $e->getMessage();
            echo "<p>ERROR: $msg </p>";
        }

        if(isset($_GET['id'])){
            $query = "DELETE FROM cumro_12 WHERE bookId=:id";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':id',$id);
            $stmt->execute();
            $stmt->closeCursor();
        }

        header('Location:read.php');
    ?>