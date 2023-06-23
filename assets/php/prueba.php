<?php

if($_POST){
    if($_POST['notepad']){
        echo "Texto del bloc enviado";
        header("Location: ../../index.html");

    } else {
        echo "No hay texto";
        header("Location: ../../index.html");
    }
}

?>