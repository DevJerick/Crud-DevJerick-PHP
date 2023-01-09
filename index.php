<?php 

require_once('./components/inputs.php');
include('./components/connection.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
    <title>House List</title>
</head>

<body>

    <!-- Modal Add -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">New House</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="./components/insert.php" method="post" id="insert" enctype="multipart/form-data">
                        <?php inputFields("text", "name", "", "Name", ""); ?>
                        <?php inputFields("text", "parking", "", "Number of parking", ""); ?>
                        <?php inputFields("text", "shower", "", "Number of shower", ""); ?>
                        <?php inputFields("text", "floor", "", "Number of floor", ""); ?>
                        <?php inputFields("file", "file", "", "", ""); ?>
                    </form>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-primary" form="insert" type="submit" name="submit">Save</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Delete -->
    <div class="modal fade" id="staticDelete" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete?</p>
                    <form action="./components/delete.php" method="post">
                        <input type="hidden" id='delete_value' name="id">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" name="submit" class="btn btn-primary">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal Edit -->
    <div class="modal fade" id="staticEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="./components/update.php" method="post" id="update" enctype="multipart/form-data">
                        <input type="hidden" id='edit_value' name="id">
                        <?php inputFields("text", "name", "", "Name", "input_name"); ?>
                        <?php inputFields("text", "parking", "", "Number of parking", "input_parking"); ?>
                        <?php inputFields("text", "shower", "", "Number of shower", "input_shower"); ?>
                        <?php inputFields("text", "floor", "", "Number of floor", "input_floor"); ?>
                        <?php inputFields("file", "file", "", "", "input_file"); ?>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" form="update" name="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal View -->
    <div class="modal fade" id="staticView" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Image</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center">
                    <img src="" width="100%" alt="images" id="view-image">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <div class="container bg-light vh-100 p-5">
        <h2>House List</h2>
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"
            data-bs-whatever="@mdo">Add New House</button>

        <div class="table-responsive" id="no-more-tables">
            <table class="table bg-white">
                <thead class="bg-dark text-light my-4">
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Parking</th>
                        <th scope="col">Shower</th>
                        <th scope="col">Floor</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody class='content'>

                    <?php 
            
            $query = "SELECT * FROM house_list";

            $result = mysqli_query($con, $query) or die(mysqli_error($con));
           

            while($row = mysqli_fetch_assoc($result)){
                echo "
            <tr>
                <td data-title='Name'>$row[name]</td>
                <td data-title='Parking'>$row[parking]</td>
                <td data-title='Shower'>$row[shower]</td>
                <td data-title='Floor'>$row[floor]</td>
                <td data-title='Action' class='text-center'>
                  <button 
                  type='button' 
                  class='btn btn-primary' 
                  data-bs-toggle='modal' 
                  data-bs-target='#staticView'
                  data-images='$row[images]'
                  onclick='viewImage(this)'>
                  View
                   </button>
                  
                  <button type='button' 
                    onclick='confirmEdit(this)' 
                    data-id='$row[id]'
                    data-name='$row[name]'
                    data-parking='$row[parking]' 
                    data-shower='$row[shower]'
                    data-floor='$row[floor]'
                    data-images='$row[images]'
                    class='btn btn-primary' 
                    data-bs-toggle='modal'
                    data-bs-target='#staticEdit'>
                    Edit
                   </button>
                   
                    <button type='button' 
                    data-id='$row[id]' 
                    onclick='confirmDelete(this)' 
                    class='btn btn-danger' 
                    id='delete' 
                    data-bs-toggle='modal' 
                    data-bs-target='#staticDelete'>
                    Delete
                    </button>
                </td>
            </tr>
                ";
            }
            ?>
                </tbody>
            </table>
        </div>
    </div>



    <script src="./components/main.js"> </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>

</html>