<html>
<h1>login</h1>
    <form action="index.php" method="POST">
        username: <input type="text" name="username"><br>
        password: <input type="password" name="password"><br>
        <input type="hidden" name="dbAction" value="login">
        <input type="submit" value="login">
    </form>
</hmtl>