<!-- Delete from add_member -->
<?php

    $connection = mysqli_connect("localhost","root","","crud");

    if ($connection){
        echo "";
    }
    else{
     echo "Not Connected!!";
    }
    $recv = $_REQUEST["id"];

    $query = "DELETE FROM add_member WHERE Id = $recv";
    // $concat = mysqli_query($connection,$query);
    $run_delete_query = mysqli_query($connection,$query);

    if ($run_delete_query){
       
        header("location: all_member.php?deleted");
    }
?>