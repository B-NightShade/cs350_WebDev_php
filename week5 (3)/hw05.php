<html>
    <head>
      <link rel="stylesheet" href="style.css">  
    </head>
    <body>
    <h1>Enter a number to Factor!</h1>
    <form action="hw05.php" method="POST">
        Number: <input type ="number" min = "1" name = "number">
        <br>
        <input type="submit" value="FACTOR!">
    </form>
    <?php
    $factorsMsg = "";
    $factors = array();
    $prime = " ";
    if(!empty($_POST["number"])){
        $number = $_POST["number"];
        $factorsMsg = $factorsMsg . "Factors of " . $number . ":";
        for($i = 1; $i <= $number; $i++){
            if($number % $i == 0){
                array_push($factors, $i); 
            }
        }
       if(count($factors)>2){
            $prime = $number . " is NOT PRIME!";
       } else{
            $prime = $number . " is PRIME!";
       }
    }
    ?>
    <h2><?php echo $factorsMsg ?></h2>
    <ul>
    <?php
        foreach($factors as $x):
    ?>
    <li><?php echo $x; ?> </li>
    <?php endforeach; ?>
    </ul>
    <?php
    echo $prime;
    ?>
    </body>
</html>
