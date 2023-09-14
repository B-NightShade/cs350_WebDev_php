<html>
    <nav>
    <ul>
        <li><a href="read.php">Read</a></li>
        <li><a href="create.php">Create</a></li>
    </ul>
</nav>

    <h1> CREATE </h1>
    <form action="read.php" method = "POST">
        Title:<input type="text" name="title" required><br>
        Author:<input type="text" name="author" required><br>
        Genre:<input type="text" name="genre" required><br>
        Number of Pages:<input type="number" name="numberPages" min="1" step="1" required><br>
        ISBN:<input type="text" name="isbn" required><br>
        <input type="hidden" value="create" name="create">
        <input type="submit" value="CREATE">
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
            color: purple;
        }
        h1{
            color:orangered;
        }
    </style>
</html>