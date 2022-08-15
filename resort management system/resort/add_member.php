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
    <h1>Add Members !!</h1>
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
        <form class="form_resort" action="all_member.php" method="POST" enctype="multipart/form-data">
            <input type="mail" name="mail", placeholder="E-mail"><br>
            <input type="password" name="member_password", placeholder="password"><br>
            <input class="save" type="submit" name="submit_info" value="Save">
            
        </form>
    </div>
</div>