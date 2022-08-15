<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php

// Connect to database
$con = mysqli_connect("localhost", "root", "", "pagination");
if($con){
    echo "";
}
else{
    echo "Not Connected!!";
}

// Define how many results you want per page
$result_per_page = 4;

// Find out the number of results stroed in database 
$sql = "SELECT * FROM alophabel_test";
$result = mysqli_query($con,$sql);
$number_of_page = mysqli_num_rows($result);

// while($row = mysqli_fetch_array($result)){
//     echo $row["id"]." ".$row["alphabat"]."<br>";
// }

// Determine number of total pages available
$number_f_pages = ceil($number_of_page/$result_per_page); // total page countes

// Determine which page number visitor is currently on
if(!isset($_GET['page'])){
    $page = 1;
}
else{
    $page = $_GET['page'];
}

// Determine the sql LIMIT startingt number for the results on the displaying page
$this_page_first_result = ($page-1)*$result_per_page;

// Retrieve selected results from database and display them on page
$sql = "SELECT * FROM alophabel_test LIMIT " . $this_page_first_result . ','. $result_per_page;
$result = mysqli_query($con, $sql);


while($row = mysqli_fetch_array($result)){
    echo $row["id"]." ".$row["alphabat"]."<br>";
}

// Display the links to the pages
for ($page = 1; $page<=$number_f_pages; $page++){
    echo '<a href="pagination.php?page=' . $page . '">' . $page . '</a>';

}
?>

</body>
</html>