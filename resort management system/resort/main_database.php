
<!-- Login Code -->

<?php

    $db_email = "admin@gmail.com";
    $db_pass = "admin@gmail.com";

    $a_email = $_POST["email"];
    $a_pass = $_POST["password"];

    if (($db_email == $a_email) && ($db_pass == $a_pass)==true){
        if(($a_pass >=5 && $a_pass >=10)){
            echo "Login Successful !!<br>";
            header("location: admin.php");
?>
<?php
        }
        else{
            header("location: login.php?pass=Wrong password !!");
        }

    }
    else if (( $db_email ==  $a_email)==false){
        header("location: login.php?user=Wrong username !!");
    }
    else if (($db_pass == $a_pass)==false){
        header("location: login.php?pass=Wrong Password !!");
    }
    else{
        header("location: login.php?inv=Accout isn't found!!");
    }
?>