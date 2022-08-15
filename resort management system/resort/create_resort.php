<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./create_resort.css">
    <title>add resort</title>
</head>
<body>
    <div class="welcome_page">
    <h1>Add Resort Informations !!</h1>
    </div>
    
</body>
</html>


<div class="main_div_create">
    <div class="add_form_section">
        <form action="admin.php" method="POST">
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

    <div class="create_resort">
        <form class="form_resort" action="create_resort.php" method="POST" enctype="multipart/form-data">
            Name </br>
            <input type="text" name="resort_name" placeholder="Resort Name"><br>
            E-mail <br>
            <input type="mail" name="mail", placeholder="E-mail"><br>
            Phone <br>
            <input type="number" name="number" placeholder="Phone"><br>
            Address <br>
            <input type="text" name="address" placeholder="Address"><br>
            <input type="file" name="upload_img" value="Upload"><br>
            <input class="save" type="submit" name="submit_info" value="Save"><br>
            <input type="hidden" name="updating_hidden_id" value="<?php echo $recv?>">
            
        </form>
    </div>
</div>

<!-- ...............add Database.................. -->
<?php
    if(isset($_POST["submit_info"])){

        $resort_name = $_POST["resort_name"];
        $mail = $_POST["mail"];
        $number = $_POST["number"];
        $address = $_POST["address"];

       
        $hidden_id = $_REQUEST["updating_hidden_id"];

        $img_recv = $_FILES["upload_img"]; // img upload
        
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

        if($resort_name && $mail &&  $number){
            $db_connection = mysqli_connect("localhost","root","","crud");

            if($db_connection){
                echo "";
            }
            else{
                echo "Not Connected!!";
            }

            $query = "INSERT INTO resort_info (resort_name, resort_mail, resort_phone, resort_address, resort_photos)";
            $query .= "VALUES ('$resort_name', '$mail', '$number', '$address', '$image_name')";
            
            $result = mysqli_query($db_connection,$query);

            if($result){
                header("location: save_data.php?reg=Data Successfully Upload !!");
            }
            else{
                header("logation: save_data.php?regwr=Data isn't Successfully Upload !!");
            }
        }
        else{
            header("logation: save_data.php?regw=Data isn't Successfully Upload !!");
        } 
    }
?>





