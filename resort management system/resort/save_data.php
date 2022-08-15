<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./save_data.css">
    <link rel="stylesheet" href="./search.css">
    <title>resort info</title>
</head>
<body>
    <div class="welcome_page">
    <h1>Resort Informations !!</h1>
    </div>
    
</body>
</html>

<div class="main_div">
    <div class="form_section">
        <form action="create_resort.php" method="POST">
            <input type="submit" name="create_resort" value="Create Resort">
        </form>
        <form action="" method="">
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
                
            $result_per_page = 10; 
            $query = "SELECT * FROM `resort_info`";
            $concat = mysqli_query($db_connection,$query);
            $count = mysqli_num_rows($concat);

            $number_f_pages = ceil($count/$result_per_page);

            if(!isset($_GET['page'])){
                $page = 1;
            }
            else{
                $page = $_GET['page'];
            }

            $this_page_first_result = ($page-1)*$result_per_page;

            $query = "SELECT * FROM resort_info LIMIT ". $this_page_first_result . ',' . $result_per_page;
            $concat = mysqli_query($db_connection,$query);

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
        <form action="search.php" method="POST">
        <br>
            <input type="text" name="search_username" placeholder="search username">
            <input type="submit" name="search" value="Search">
        </form>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th># ......</th>
                    <th>Resort Name ............</th>
                    <th>Email ................................</th>
                    <th>Phone No .............</th>
                    <th>Address ...............................</th>
                    <th>Profile ...............</th>
                    <th>Action.................</th>
                </tr>
            </thead>

        <?php
        $serial_number = 0;
                while($row = mysqli_fetch_assoc($concat)){
                    $id = $row["no"];
                    $resort_name = $row["resort_name"];
                    $mail = $row["resort_mail"];
                    $number = $row["resort_phone"];
                    $address = $row["resort_address"];
                    $profile = $row["resort_photos"];
                    $serial_number++;
        ?>
            <tbody>
                <tr>
                    <td><?php echo "$serial_number"?>
                    <td><?php echo "$resort_name"?></td>
                    <td><?php echo $mail?></td>
                    <td><?php echo  $number?></td>
                    <td><?php echo  $address?></td>
                    <td><img width='30px' src='profile/<?php echo $profile?>' alt=""></td>
                    <td><a class="edit" href="edit.php?edit=<?php echo $id;?>">Edit</a> ||
                    <a class="delete" onclick="return confirm('Are you sure??')" href="delete.php?id=<?php echo $id; ?>&profile=<?php echo $profile?>">Delete</a></td>
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
        <div class="pagination1">
        <?php
        for ($page= 1; $page<=$number_f_pages; $page++){
            echo '<a href="save_data.php?page=' . $page . '">' . $page . '</a>';
        }
        ?>
        </div>

    </div>
</div>


<!-- ............... Edit and Show S-code.................... -->

<?php


    $connection = mysqli_connect("localhost","root","","crud");

    if ($connection){
        echo "";
    }
    else{
     echo "Not Connected!!";
    }


    if (isset($_REQUEST["submit"])){
        $r_name =  $_REQUEST["r_name"];
        $r_mail = $_REQUEST["r_mail"];
        $r_number = $_REQUEST["r_number"];
        $r_address = $_REQUEST["r_address"];

        $hidden_id = $_REQUEST["updating_hidden_id"];


        $img_recv = $_FILES["upload_image"]; // img upload
        
        $image_name = $img_recv["name"];
        $image_tem_name = $img_recv["tmp_name"]; // need a file moveded

        if(!empty($image_name)){
            $loc = "profile/";
            if (move_uploaded_file($image_tem_name,$loc.$image_name)){
                header("location: save_data.php");
                // $path = $loc.$image_name;
            }
        }
        else{
            echo "Your file is empty";
        }

       
        $update_query = "UPDATE resort_info SET resort_name='$r_name', resort_mail='$r_mail', resort_phone='$r_number', resort_address ='$r_address', resort_photos='$image_name' WHERE no = $hidden_id";
        
        $final_updat_query = mysqli_query($connection,$update_query);

        if($final_updat_query){
            header("location: save_data.php?updated");
        }
    }

?>


