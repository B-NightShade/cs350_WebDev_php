<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
</html>
<Body>
    <?php
    if (!empty($_POST["userName"])) {
        $userName = $_POST["userName"];
    }else{
        $userName = "";
    }
    if(!empty($_POST["types"])){
        $types = $_POST["types"];
    }else{
        $types = "";
    }
    if(!empty($_POST["size"])){
        $size = $_POST["size"];
    }else{
        $size = "";
    }
    if(!empty($_POST["extras"])){
        $extras = $_POST["extras"];
    }else{
        $extras = ".";
    }
    ?>

<?php
    $stringGreeting =""; 
    $stringOrder="";

    if(empty($_POST)){
    $stringGreeting = "You have not made an order!";
} else {

    $stringGreeting = $stringGreeting . $userName;
    if (!empty($_POST["userName"])) {
        $stringGreeting = $stringGreeting . ", your order is ready!";
    } else {
        $stringGreeting = $stringGreeting . "Your order is ready!";
    }

    $stringOrder = $stringOrder . "You had a " . $size . " " . $types;

    if (!empty($_POST["extras"])) {
        $stringOrder = $stringOrder . " with ";
        if (count($extras) > 2) {
            for ($i = 0; $i < count($extras) - 1; $i++) {
                $stringOrder = $stringOrder . $extras[$i] . ", ";
            }
            $amount = count($extras) - 1;
            $stringOrder = $stringOrder . "and " . $extras[$amount] . ".";
        } else if (count($extras)== 2) {
            $stringOrder = $stringOrder . $extras[0] . " and " . $extras[1] . "."; 
        }else {
            $stringOrder = $stringOrder . $extras[0] . ".";
        }
    } else {
        $stringOrder = $stringOrder . $extras;

    }
}
?>
 
    <h1><?php echo $stringGreeting ?></h1> 
    <?php echo $stringOrder?>

</Body>