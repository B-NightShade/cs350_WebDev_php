<?php
    session_set_cookie_params(300,'/');
    session_start();

    $newColor = $_POST["newColor"] ?? 'blank';
    $colors = $_SESSION['colors'] ?? array();
    if($newColor != 'blank'){
        if (in_array($newColor, $colors)===false){
            $colors[$newColor] = $newColor;
        }
    }

    $chosenColors = $_POST['chosenColors']?? '';
    if($chosenColors !== ''){
        foreach($chosenColors as $cc){
            unset($_SESSION[$cc]);
            unset($colors[$cc]);
        }
    }
    $_SESSION['colors'] = $colors;
?>

<hmtl>
    <a href="add.php">ADD</a>
    <a href="cart.php">CART</a>
    <h1>CART</h1>
    <form method="POST">
        <?php
            foreach($colors as $color):
        ?>
            <span style='background-color: <?php echo $color;?>; color: <?php echo $color;?>;'>test</span>
            <input type="checkbox" name="chosenColors[]" value="<?php echo $color;?>">
            <br>

        <?php endforeach; ?>

        <input type ="submit" name="update cart">
    </form>
</hmtl>