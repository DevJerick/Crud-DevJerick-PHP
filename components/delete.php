<?php 

include('./connection.php');

if(isset($_POST['submit'])){

$id = $_POST['id'];


$query = "DELETE FROM house_list WHERE id='$id'";
$result = mysqli_query($con, $query);

if ($result){
    header('Location:../index.php');
     exit;
}

}

?>