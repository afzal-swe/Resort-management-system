
<!-- Delete from resort_info -->

<?php
    $connection = mysqli_connect("localhost","root","","crud");

    if ($connection){
        echo "";
    }
    else{
     echo "Not Connected!!";
    }
    $recv = $_REQUEST["id"];
    $recv_fileName = $_REQUEST["profile"]; // photo delete from file

    $query = "DELETE FROM resort_info WHERE no = $recv";
    // $concat = mysqli_query($connection,$query);
    $run_delete_query = mysqli_query($connection,$query);

    if ($run_delete_query){
        unlink("profile/$recv_fileName"); // photo delete from file
        header("location: save_data.php?deleted");
    }
?>