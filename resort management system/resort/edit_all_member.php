<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./save_data.css">
    <title>edit page</title>
</head>
<body>
    <div class="welcome_page">
    <h1>Addmin Edit Options !!</h1>
    </div>
    
</body>
</html>


<?php

    $connection = mysqli_connect("localhost","root","","crud");

    if ($connection){
        echo "";
    }
    else{
     echo "Not Connected!!";
    }

    if (isset($_REQUEST["edit"])){
        $recv = $_REQUEST["edit"];

        $get_info = "SELECT * FROM add_member WHERE Id = $recv";

        $run_update_info = mysqli_query($connection,$get_info);

        while ($row = mysqli_fetch_assoc($run_update_info)){
?>
            <form class="edit_form" action="all_member.php" method="POST" enctype="multipart/form-data">
                <input class="input" type="email" name="admin_mail" value="<?php echo $row['Admin_Email']?>">
                <input class="input" type="password" name="admin_password" value="<?php echo $row['Admin_Password']?>">
                <input class="input" type="submit" name="submit" value="Confirm"><br>
                <input type="hidden" name="updating_hidden_id" value="<?php echo $recv?>">
            </form>
<?php
        }
    }
?>






