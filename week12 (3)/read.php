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

    if (isset($_POST['create'])){
        $insert = "INSERT INTO cumro_12
                        (title, author, genre, pages, ISBN)
                    VALUES
                        (:title, :author, :genre, :pages, :ISBN)";

         $statement = $db->prepare($insert);
         $statement->bindValue(':title',$_POST['title']);
         $statement->bindValue(':author',$_POST['author']);
         $statement->bindValue(':genre',$_POST['genre']);
         $statement->bindValue(':pages',$_POST['numberPages']);
         $statement->bindValue(':ISBN',$_POST['isbn']);
         $statement->execute();
         $statement->closeCursor();
    }

    if (isset($_POST['update'])){
        $update = "UPDATE cumro_12
                    SET
                        title=:title, author=:author, genre=:genre, pages=:pages, ISBN=:ISBN
                    Where
                        bookId=:id";

         $statement = $db->prepare($update);
         $statement->bindValue(':title',$_POST['title']);
         $statement->bindValue(':author',$_POST['author']);
         $statement->bindValue(':genre',$_POST['genre']);
         $statement->bindValue(':pages',$_POST['numberPages']);
         $statement->bindValue(':ISBN',$_POST['isbn']);
         $statement->bindValue(':id',$_POST['id']);
         $statement->execute();
         $statement->closeCursor();
    }
?>
<html>
    <nav>
    <ul>
        <li><a href="read.php">Read</a></li>
        <li><a href="create.php">Create</a></li>
    </ul>
</nav>


    <?php
        echo "<h1> READ </h1>";

        $query = "SELECT * FROM cumro_12";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch();
    ?>

<table border="2">
        <tr>
            <th>BookId</th>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Number Pages</th>
            <th>ISBN</th>
        </tr>

        <?php while($row != NULL):?>
            <tr>
            <?php $id = $row['bookId']; ?>
            <td><?php echo $row['bookId']; ?> </td>
            <td><?php echo $row['title']; ?> </td>
            <td><?php echo $row['author']; ?></td>
            <td><?php echo $row['genre']; ?> </td>
            <td><?php echo $row['pages']; ?> </td>
            <td><?php echo $row['ISBN']; ?></td>
            <td><a href="update.php?id=<?php echo $id; ?>">Update</a></td>
            <td><a href="delete.php?id=<?php echo $id; ?>">Delete</a></td>
            </tr>
            <?php $row = $stmt->fetch(); ?>
        <?php endwhile; 
            $stmt->closeCursor();
        ?>

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
            background-color:darkgray;
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
            color: white;
        }
        h1{
            color:orangered;
        }
        th{
            background-color: black;
        }
        td{
            background-color: midnightblue;
        }
        a{
            background-color: lightgreen;
        }
    </style>
</html>