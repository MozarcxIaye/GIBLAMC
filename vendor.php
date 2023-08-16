<?php
// make connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $db = "gamc";

  $insert = false;

  $conn = mysqli_connect($servername, $username, $password, $db);

  if(!$conn){
    die ("An error occured while establishing connection to db" . mysqli_connect_error()); 
  }
//   if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//     $title = $_POST['title'];
//     $description = $_POST['description'];

//     $sql = "INSERT INTO `notes` (`Title`, `Description`) VALUES ('$title', '$description')";
//     $result = mysqli_query($conn, $sql);

//     if ($result){
//       $insert = true;
//     } else {
//       // echo "Error occured";
//     }

//   }

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff List</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-0 border-bottom sticky-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand text-danger" href="/Gamc/index.php">G<span class='text-primary ms-1'>AMC<span></a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/Gamc/index.php">Go to HomePage</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>


    <main id="branch_home" class="border-top bg-light ">
        <h1 class="staff_heading m-5 text-dark">Vendor List</h1>

        <div class="table-container bg-light mx-5 mb-5">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">Vendor_Id</th>
                        <th scope="col">Vendor_Name</th>
                        <th scope="col">Vendor_Contact</th>
                        <th scope="col">Vendor_Company</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM tablevendor";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
      <th scope='row'>" . $row['Vendor_Id'] . "</th>
      <td>" . $row['Vendor_Name'] . "</td>
      <td>" . $row['Vendor_Contact'] . "</td>
      <td>" . $row['Vendor_Company'] . "</td>
    </tr>";
                    }

                    ?>


                </tbody>
            </table>

        </div>

    </main>


    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable();
        });
    </script>
</body>

</html>