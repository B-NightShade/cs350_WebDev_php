<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css"/>
    </head>

<?php
    $originalEncrypt = $_POST["messageEncrypt"] ?? '';
    $originalDecrypt = $_POST["messageDecrypt"] ?? '';
    if($originalEncrypt != ''){
        $shiftedEncrypt = '';
        for($i = 0; $i < strlen($originalEncrypt); $i++){
            if(ctype_alpha($originalEncrypt[$i])){
                if(ctype_lower($originalEncrypt[$i])){
                    $ascii = ord($originalEncrypt[$i]) -97;
                    $ascii += $_POST["shiftEn"];
                    $ascii %= 26;
                    $ascii +=97;
                    $char = chr($ascii);
                    $shiftedEncrypt .= $char;
                }else{
                    $ascii = ord($originalEncrypt[$i]) -65;
                    $ascii += $_POST["shiftEn"];
                    $ascii %= 26;
                    $ascii +=65;
                    $char = chr($ascii);
                    $shiftedEncrypt .= $char;
                }
            }else{
                $shiftedEncrypt .= $originalEncrypt[$i];
            }
        }
    }
    if($originalDecrypt != ''){
        $shiftedDecrypt = '';
        for($i = 0; $i < strlen($originalDecrypt); $i++){
            if(ctype_alpha($originalDecrypt[$i])){
                if(ctype_lower($originalDecrypt[$i])){
                    $ascii = ord($originalDecrypt[$i]) -97;
                    $shift = $_POST["shiftDec"] %26;
                    $shift = 26 - $shift;
                    $ascii += $shift;
                    $ascii %= 26;
                    $ascii +=97;
                    $char = chr($ascii);
                    $shiftedDecrypt .= $char;
                }else{
                    $ascii = ord($originalDecrypt[$i]) -65;
                    $shift = $_POST["shiftDec"] %26;
                    $shift = 26 - $shift;
                    $ascii += $shift;
                    $ascii %= 26;
                    $ascii +=65;
                    $char = chr($ascii);
                    $shiftedDecrypt .= $char;
                }
            }else{
                $shiftedDecrypt .= $originalDecrypt[$i];
            }
        }
    }
    $decryptMsg = $shiftedEncrypt ?? '';
    $decryptShift = ($_POST["shiftEn"]) ?? 0;
    $encryptMsg = $shiftedDecrypt ?? '';
    $encryptShift = ($_POST["shiftDec"]) ?? 0;   
?>

<h1>Encrypt!</h1>
<form method="POST">
    Message: <input type="text" name="messageEncrypt" value="<?php echo $encryptMsg ?>"><br>
    <input type="range" min="0" value="<?php echo $encryptShift?>" class="slider" step='1' id="myRange" name="shiftEn"><br>
    <p id="sliderValue"></p>
    <input type="submit" value="Encrypt">
</form>

<hr>
<h1>Decrypt!</h1>
<form method="POST">
    Message: <input type="text" name="messageDecrypt" value="<?php echo $decryptMsg ?>"><br>
    <input type="range" min="0" class="slider" step='1' id="myRangeDec" value="<?php echo $decryptShift?>" name="shiftDec"><br>
    <p id="sliderValueDec"></p>
    <input type="submit" value="Decrypt">
</form>


<script>
const value = document.querySelector("#sliderValue")
const input = document.querySelector("#myRange")
value.textContent = input.value
input.addEventListener("input", (event) =>{
    value.textContent = event.target.value
})

const valueDec = document.querySelector("#sliderValueDec")
const inputDec = document.querySelector("#myRangeDec")
valueDec.textContent = inputDec.value
inputDec.addEventListener("input", (event) =>{
    valueDec.textContent = event.target.value
})
</script>

</html>