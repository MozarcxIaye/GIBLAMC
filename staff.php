<?php
// make connection
$servername = "localhost";
$username = "root";
$password = "";
$db = "gamc";

$insert = false;
$update = false;
$delete = false;

$conn = mysqli_connect($servername, $username, $password, $db);

if (!$conn) {
    die("An error occured while establishing connection to db" . mysqli_connect_error());
}


// if(isset($_GET['delete'])){
//     $sno = $_GET['delete'];
//     $delete = true;
//     $sql = "DELETE FROM `notes` WHERE `sno` = $sno";
//     $result = mysqli_query($conn, $sql);
//   }

if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `tableemp` WHERE `SN` =$sno";

    $result = mysqli_query($conn, $sql);
}


  if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  if (isset( $_POST['snoEdit'])){
     
        // Update the record
        $sno = $_POST["snoEdit"];
        $Emp_Id = $_POST["editId"];
        $Emp_Name = $_POST["editName"];
        $Emp_Department = $_POST["editDept"];
        $Emp_Service_Department = $_POST["editServDesc"];
        $Emp_Email = $_POST["editEmail"];
        $Emp_Contact = $_POST["editContact"];
        $SOL = $_POST["editSol"];
  
    // Sql query to be executed
    $sql = "UPDATE `tableemp` SET `SN` = '$sno' , `Emp_Id` = '$Emp_Id', `Emp_Name` = '$Emp_Name', `Emp_Department` = '$Emp_Department', `Emp_Service_Department` = '$Emp_Service_Department', `Emp_Email` = '$Emp_Email', `Emp_Contact` = '$Emp_Contact', `Emp_Department` = '$Emp_Department', `Emp_Service_Department` = '$Emp_Service_Department', `Emp_Email` = '$Emp_Email', `SOL` = '$SOL' WHERE `tableemp`.`SN` = $sno";
    $result = mysqli_query($conn, $sql);
    // $sql = "UPDATE `tableemp` SET `Emp_Id` = ?, `Emp_Name` = ?, `Emp_Department` = ?, `Emp_Service_Department` = ?, `Emp_Email` = ?, `Emp_Contact` = ?, `SOL` = ? WHERE `SN` = ?";
    // $stmt = mysqli_prepare($conn, $sql);
    // mysqli_stmt_bind_param($stmt, "sssssssi", $Emp_Id, $EmpName, $EmpDept, $EmpServDesc, $EmpEmail, $EmpContact, $EmpSol, $sno);
    // $updateResult = mysqli_stmt_execute($stmt);
    if($result){
      $update = true;
  } 
  else{
      echo "We could not update the record successfully";
  }
  }
  else{
    $sno = $_POST["snoEdit"];
    $Emp_Id = $_POST["editId"];
    $EmpName = $_POST["editName"];
    $EmpDept = $_POST["editDept"];
    $EmpServDesc = $_POST["editServDesc"];
    $EmpEmail = $_POST["editEmail"];
    $EmpContact = $_POST["editContact"];
    $EmpSol = $_POST["editSol"];
  
    // Sql query to be executed
    // $sql = "INSERT INTO `tableemp` (`Emp_Id`, `Emp_Name`, `Emp_Department`, `Emp_Service_Department`, `Emp_Email`, `Emp_Contact`, `SOL`) VALUES (?, ?, ?, ?, ?, ?, ?)";
    //     $stmt = mysqli_prepare($conn, $sql);
    //     mysqli_stmt_bind_param($stmt, "sssssss", $Emp_Id, $EmpName, $EmpDept, $EmpServDesc, $EmpEmail, $EmpContact, $EmpSol);
    //     $insertResult = mysqli_stmt_execute($stmt);
    $sql = "Insert into `tableemp` SET `SN` = '$SN' , `Emp_Id` = '$Emp_Id', `Emp_Name` = '$Emp_Name', `Emp_Department` = '$Emp_Department', `Emp_Service_Department` = '$Emp_Service_Department', `Emp_Email` = '$Emp_Email', `Emp_Contact` = '$Emp_Contact', `Emp_Department` = '$Emp_Department', `Emp_Service_Department` = '$Emp_Service_Department', `Emp_Email` = '$Emp_Email', `SOL` = '$SOL' WHERE `tableemp`.`SN` = $SN";
    $result = mysqli_query($conn, $sql);
     
    if($result){ 
        $insert = true;
    }
    else{
        echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
    } 
  }
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
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
   
    <link rel="stylesheet" href="Staff.css">

</head>

<body>
<!-- Modal for deleting and editing the data  -->


<!-- Modal -->
<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">Edit Staff List</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action = './staff.php' method='POST'>
                    <input type="hidden" name="snoEdit" id="snoEdit">
                    <div class="col-md-4">
                        <label for="inputEmpId" class="form-label">Emp Id</label>
                        <input type="text" class="form-control" id="inputEmpId" name="editId">
                    </div>
                    <div class="col-md-8">
                        <label for="inputEmpName" class="form-label">Emp Name</label>
                        <input type="text" class="form-control" id="inputEmpName" name="editName">
                    </div>-
                    <div class="col-6">
                        <label for="inputEmpDept" class="form-label">Emp Department</label>
                        <input type="text" class="form-control" id="inputEmpDept" name="editDept">
                    </div>
                    <div class="col-6">
                        <label for="inputServDesc" class="form-label">Emp Service Description</label>
                        <input type="text" class="form-control" id="inputServDesc" name="editServDesc">
                    </div>
                    <div class="col-md-6">
                        <label for="inputEmail" class="form-label">Emp Email</label>
                        <input type="text" class="form-control" id="inputEmail" name="editEmail">
                    </div>
                   
                    <div class="col-md-6">
                        <label for="inputContact" class="form-label">Emp Contact</label>
                        <input type="text" class="form-control" id="inputContact" name="editContact">
                    </div>
                    <div class="col-md-12">
                        <label for="inputSol" class="form-label">SOL</label>
                        <input type="text" class="form-control" id="inputSol" name="editSol">
                    </div>
                    <div class="col-md-6">
                        <!-- <label for="inputSol" class="form-label">SOL</label> -->
                        <!-- <input type="submit" class="form-control" id="inputSol" name="editSol"> -->
                        <input type=submit class="btn btn-sm btn-primary" ></input>
                    </div>
                  
                    </div>
                   
                </form>
                
            </div>
           
        </div>
    </div>
</div>

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
<?php
if($insert){
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Success!!</strong> Data updated successfully..
    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
  </div>
  ";}
  ?>

<?php
  if($update){
    
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your entry has been updated successfully..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  ?>
  <?php
  if($delete){

    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Your entry has been deleted successfully..
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
  ?>

<main id="staff_home" class="border-top bg-light ">
    <h1 class="staff_heading m-5 text-dark">All Staff List</h1>

    <div class="table-container bg-light m-2 mb-5">
        <table class="table" id="myTable">
            <thead>
                <tr>
                    <th scope="col">SN</th>
                    <th scope="col">Emp_Id</th>
                    <th scope="col">Emp_Name</th>
                    <th scope="col">Emp_Department</th>
                    <th scope="col">Emp_Service_Department</th>
                    <th scope="col">Emp_Email</th>
                    <th scope="col">Emp_Contact</th>
                    <th scope="col">SOL</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM tableemp";
                $result = mysqli_query($conn, $sql);
                $SN = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $SN = $SN + 1;
                    echo "<tr>
      <th scope='row'>" . $SN . "</th>
      <td>" . $row['Emp_Id'] .  "</td>
      <td>" . $row['Emp_Name'] . "</td>
      <td>" . $row['Emp_Department'] . "</td>
      <td>" . $row['Emp_Service_Department'] . "</td>
      <td>" . $row['Emp_Email'] . "</td>
      <td>" . $row['Emp_Contact'] . "</td>
      <td>" . $row['SOL'] . "</td>
      <td class='action-el'> 
      <button class='edit btn btn-sm btn-primary' data-bs-toggle='modal' data-bs-target='#editModal' id='".$row['SN']."'>Edit</button>
      <button class='delete btn btn-sm btn-primary' id='d".$row['SN']."'>Delete</button> </td>
    </tr>";
                    // echo "<br>";
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

    editbtn = document.getElementsByClassName("edit");

    Array.from(editbtn).forEach((el) => {
        el.addEventListener("click", (e) => {
            tr = e.target.parentNode.parentNode;
            EmpId = tr.getElementsByTagName("td")[0].innerText; 
            EmpName = tr.getElementsByTagName("td")[1].innerText;
            EmpDept = tr.getElementsByTagName("td")[2].innerText;
            EmpServDesc = tr.getElementsByTagName("td")[3].innerText;
            EmpEmail = tr.getElementsByTagName("td")[4].innerText;
            EmpContact = tr.getElementsByTagName("td")[5].innerText;
            EmpSol = tr.getElementsByTagName("td")[6].innerText;
    
            inputEmpId.value = EmpId;
            inputEmpName.value =EmpName;
            inputEmpDept.value =EmpDept;
            inputServDesc.value =EmpServDesc;
            inputEmail.value =EmpEmail;
            inputContact.value =EmpContact;
            inputSol.value = EmpSol;
            snoEdit.value = e.target.id;
            console.log(e.target.id);
            console.log(e.target);

        })
    });

//delete
deletebtn = document.getElementsByClassName("delete");

Array.from(deletebtn).forEach((el) => {
    el.addEventListener("click", (e) => {
        sno = e.target.id.substr(1,);
  

        if(confirm('Are you sure you want to delete this record?')){
            console.log("yes");
            window.location = `./staff.php?delete=${sno}`;
        }else{
            console.log("no");
        }

    })
});

</script>
 
</body>

</html>