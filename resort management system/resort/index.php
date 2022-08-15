<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./index.css">
    <title>Resort</title>
</head>
<body>
    
</body>
</html>

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
                $result_per_page = 4; 
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


        <table class="table">

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
    <div class="tmd">
        <div class="timgd">
            <tbody>
            <td class="tdname"><?php echo "$resort_name"?></td>
                <tr>
                <!-- <td><?php echo "$serial_number"?> -->
                <td><img width='30px' src='profile/<?php echo $profile?>' alt=""></td>
                <!-- <td><?php echo $mail?></td> -->
                <!-- <td><?php echo $number?></td> -->
                <!-- <td><?php echo  $address?></td> -->
                <!-- <td><a href="edit.php?edit=<?php echo $id;?>">Edit</a> ||
                <a onclick="return confirm('Are you sure??')" href="delete.php?id=<?php echo $id; ?>&profile=<?php echo $profile?>">Delete</a></td> -->
                </tr>
            </tbody>
        </div>
    </div>
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
        echo '<a href="index.php?page=' . $page . '">' . $page . '</a>';
    }
    ?>
    </div>
</div>

<div class="button">
    <form action="">
        <input type="submit" name="book_now" value="Book Now">
    </form>
</div>
