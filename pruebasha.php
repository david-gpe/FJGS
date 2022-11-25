<?php 
    $variable = "tiger"; 
    echo $variable ." "; 
    $encrypt = sha1($variable); 
    echo $encrypt ." "; 
    $decrypt = sha1($encrypt); 
    echo $decrypt ." "; 
?> 