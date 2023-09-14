<html>
    <nav>
    <ul>
        <li><a href="read.php">Read</a></li>
        <li><a href="create.php">Create</a></li>
    </ul>
</nav>

    <?php
        $id = $_GET['id'] ?? "";
        //echo $id;
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
            $query = "SELECT * FROM cumro_12 WHERE bookId=:id";
            $stmt = $db->prepare($query);
            $stmt->bindValue(':id',$id);
            $stmt->execute();
            $row = $stmt->fetch();
            $stmt->closeCursor();
        }
    ?>

    <h1> UPDATE </h1>
    <form action="read.php" method = "POST">
        Title:<input type="text" name="title" value ="<?php echo $row['title'] ?? "";?>" required><br>
        Author:<input type="text" name="author" value="<?php echo $row['author'] ?? ""; ?>" required><br>
        Genre:<input type="text" name="genre" value="<?php echo $row['genre'] ?? ""; ?>" required><br>
        Number of Pages:<input type="number" name="numberPages" value ="<?php echo $row['pages']; ?>" min="1" step="1" required><br>
        ISBN:<input type="text" name="isbn" value="<?php echo $row['ISBN'] ?? ""; ?>" required><br>
        <input type="hidden" value="update" name="update">
        <input type="hidden" value="<?php echo $id ?>" name="id">
        <input type="submit" value="UPDATE">
    </form>

    <style>
          ul{
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        li{
            display:inline;
            font-size: large;
        }
        li a{
            color:darkviolet;
        }
        li a:hover{
            background-color: aqua;
        }
        a:hover{
            background-color: teal;
            color:black;
        }
        body{
            background-color: darkgrey;
            color: darkgreen;
        }
        h1{
            color:orangered;
        }
    </style>
</html>