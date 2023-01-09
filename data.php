<?php 

include('./components/connection.php');
include('./core.php');


$query = "SELECT * FROM house_list";
$result = mysqli_query($con, $query);
$response = array();

if ($result){

    header("Content-Type: JSON");
    $i = 0;
    while ($row = mysqli_fetch_assoc($result)){

    $imageSplit = explode('/', $row['images']); 
    $img = $imageSplit[1];
    
    $response[$i]['id'] = $row['id'];
    $response[$i]['name'] = $row['name'];
    $response[$i]['parking'] = $row['parking'];
    $response[$i]['shower'] = $row['shower'];
    $response[$i]['floor'] = $row['floor'];
    $response[$i]['images'] = $img;
    $i++;
    }
    echo json_encode($response, JSON_PRETTY_PRINT);
}


?>