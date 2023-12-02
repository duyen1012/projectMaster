<?php
function product(){
    if(!empty($_SESSION['product'])){
        return $_SESSION['product'];
    }
    return FALSE;
    }
?>