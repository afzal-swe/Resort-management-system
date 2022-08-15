<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./save_data.css">
    <title>cPanel</title>
</head>
<body>
    <div class="welcome_page">
    <h1>All Members Information !!</h1>
    </div>
    
</body>
</html>

<div class="main_div">
    <div class="form_section">
        <form action="create_resort.php" method="POST">
            <input type="submit" name="create_resort" value="Create Resort">
        </form>
        <form action="save_data.php" method="POST">
            <input type="submit" name="show_resort_data" value="Show Resort Info">
        </form>
        <form action="" method="">
            <input type="submit" name="reate_resort" value="Single Package">
        </form>
        <form action="" method="">
            <input type="submit" name="how_resort_data" value="Couple Package">
        </form>
        <form action="" method="">
            <input type="submit" name="how_resort_data" value="Family Package">
        </form><form class="add_member" action="add_member.php" method="POST">
            <input type="submit" name="add_member" value="Add Member">
        </form><br>
        <form class="visit" action="index.php" method="POST">
            <input type="submit" name="how_resort_data" value="Visit Store">
        </form>
    </div>

    <div class="main_data">
        <!-- Create resort Code -->

        <?php
            $db_connection = mysqli_connect("localhost","root","","crud");

            if($db_connection){
                echo "";
            }
            else{
                echo "Not Connected!!";
            }
                
                $query = "SELECT * FROM `add_member`";
                $concat = mysqli_query($db_connection,$query);

            $count = mysqli_num_rows($concat);

            if ($count > 0 ){
                // if (isset($_REQUEST["updated"])){ // Edit notification
                //     echo "<font color='green'>Data Update Successfull !!</font>";
                // }
                // if (isset($_REQUEST["deleted"])){ // deleted notification
                //     echo "<font color='green'>Data deleted Successfull !!</font>";
                // }
                // if (isset($_REQUEST["del"])){ // deleted notification
                //     echo "<font color='green'>Select Data deleted Successfull !!</font>";
                // }
        ?>


        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th># ......</th>
                    <th>Email ................................</th>
                    <th>Password ................................</th>
                    <th>Action.................</th>
                </tr>
            </thead>

        <?php
        $serial_number = 0;
                while($row = mysqli_fetch_assoc($concat)){
                    $id = $row["Id"];
                    $mail = $row["Admin_Email"];
                    $password = $row["Admin_Password"];
                    $serial_number++;
        ?>
            <tbody>
                <tr>
                    <td><?php echo "$serial_number"?>
                    <td><?php echo $mail?></td>
                    <td><?php echo  $password?></td>
                    <td><a href="edit_all_member.php?edit=<?php echo $id;?>">Edit</a> ||
                    <a onclick="return confirm('Are you sure??')" href="delete_all_member.php?id=<?php echo $id;?>">Delete</a></td>
                </tr>
            </tbody>
            
        <?php
                }
        ?>
        </table>

        <?php
            }
            else{
                echo "You don't have any data!!";
            }
        ?>

    </div>
</div>


<!-- ............... Edit and Show S-code....................

<?php


    $connection = mysqli_connect("localhost","root","","crud");

    if ($connection){
        echo "";
    }
    else{
     echo "Not Connected!!";
    }

    if (isset($_REQUEST["submit"])){
        $admin_mail = $_REQUEST["admin_mail"];
        $admin_password = $_REQUEST["admin_password"];

        $hidden_id = $_REQUEST["updating_hidden_id"];
        $update_query = "UPDATE add_member SET Admin_Email='$admin_mail', Admin_Password='$admin_password' WHERE Id = $hidden_id";
        
        $final_updat_query = mysqli_query($connection,$update_query);

        if($final_updat_query){
            header("location: all_member.php?updated");
        }
    }

?> -->


