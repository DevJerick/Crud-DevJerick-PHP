<?php 

include('./connection.php');


if (isset($_POST['submit'])){

    $id = $_POST['id'];
    $name = $_POST['name'];
    $parking = $_POST['parking'];
    $shower = $_POST['shower'];
    $floor = $_POST['floor'];
    $image =$_FILES['file'];


    
    $imageFileName = $image['name']; // Get the image file name from $image
    
    $imageFileTemp = $image['tmp_name']; // Get the image temp name from $image

    $filename_separate = explode('.', $imageFileName); //  Split the image file name

    $file_extension = strtolower($filename_separate[1]); //  Get the extension file from $filename_extension and set to small letter

    $extension = array('jpeg', 'jpg', 'png'); // Image extension file name type

    if (in_array($file_extension, $extension)){
    $upload_image = '../img/'.$imageFileName; 
    move_uploaded_file($imageFileTemp, $upload_image);

    $insert_image = 'img/'.$imageFileName;

    $query = "UPDATE house_list SET name='$name', parking='$parking', shower='$shower', floor='$floor', images='$insert_image' WHERE id='$id'";
    $result = mysqli_query($con, $query);
    if ($result){
       header('Location:../index.php');
    } else {
        die(mysqli_error($con));
    }
   } 
}


?>