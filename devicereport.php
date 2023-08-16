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

  if(!$conn){
    die ("An error occured while establishing connection to db" . mysqli_connect_error()); 
  }

  if(isset($_GET['delete'])){
    $sno = $_GET['delete'];
    $delete = true;
    $sql = "DELETE FROM `tabledevicereport` WHERE `SN` =$sno";

    $result = mysqli_query($conn, $sql);
}


if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    if (isset( $_POST['snoEdit'])){
       
          // Update the record
          $sno = $_POST["snoEdit"];
          $Dev_Rec_Date = $_POST["editDevRecDate"];
          $Items = $_POST["editItems"];
          $Sol = $_POST["editSol"];
          $Item_type = $_POST["editItemType"];
          $Serial_No = $_POST["editSerialNo"];
          $Asset_Tag = $_POST["editAssetTag"];
          $Report_Sent_Date = $_POST["editReportSentDate"];
          $Status_Report = $_POST["editStatusReport"];
         
          $sql = "UPDATE `tabledevicereport` SET `SN` = '$sno' , `Device_Received_Date` = '$Dev_Rec_Date', `Items` = '$Items', `SOL` = '$Sol' , `Item_Type` = '$Item_type', `Serial_No` = '$Serial_No', `Asset_Tag` = '$Asset_Tag' , `Report_Sent_Date` = '$Report_Sent_Date', `Status_Remarks` = '$Status_Report' WHERE `tabledevicereport`.`SN` = $sno";
          $result = mysqli_query($conn, $sql);
          if($result){
            $update = true;
        } 
        else{
            echo "We could not update the record successfully";
        }
        }
        else{
            $sno = $_POST["snoEdit"];
            $Dev_Rec_Date = $_POST["editDevRecDate"];
            $Items = $_POST["editItems"];
            $Sol = $_POST["editSol"];
            $Item_type = $_POST["editItemType"];
            $Serial_No = $_POST["editSerialNo"];
            $Asset_Tag = $_POST["editAssetTag"];
            $Report_Sent_Date = $_POST["editReportSentDate"];
            $Status_Report = $_POST["editStatusReport"];
           
            $sql = "INSERT into `tabledevicereport` SET `SN` = '$sno' , `Device_Received_Date` = '$Dev_Rec_Date', `Items` = '$Items', `SOL` = '$Sol' , `Item_Type` = '$Item_type', `Serial_No` = '$Serial_No', `Asset_Tag` = '$Asset_Tag' , `Report_Sent_Date` = '$Report_Sent_Date', `Status_Remarks` = '$Status_Report' WHERE `tabledevicereport`.`SN` = $sno";
            $result = mysqli_query($conn, $sql);
           
          if($result){ 
              $insert = true;
          }
          else{
              echo "The record was not inserted successfully because of this error ---> ". mysqli_error($conn);
          } 
        }
        }



    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Device Report List</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

</head>

<body>


<!-- Modal -->
<div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel">Edit RPM Status List</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action = './devicereport.php' method='POST'>
                    <input type="hidden" name="snoEdit" id="snoEdit">
                    <div class="col-md-12">
                        <label for="inputDevRecDate" class="form-label">Device Received Date</label>
                        <input type="text" class="form-control" id="inputDevRecDate" name="editDevRecDate">
                    </div>
                    <div class="col-md-12">
                        <label for="inputItems" class="form-label">Items</label>
                        <input type="text" class="form-control" id="inputItems" name="editItems">
                    </div>

                    <!--  -->
                    <div class="col-md-8">
                        <label for="inputSol" class="form-label">SOL</label>
                        <input type="text" class="form-control" id="inputSol" name="editSol">
                    </div>-
                    <div class="col-6">
                        <label for="inputItemType" class="form-label">Input Type</label>
                        <input type="text" class="form-control" id="inputItemType" name="editItemType">
                    </div>
                    <div class="col-6">
                        <label for="inputSerialNo" class="form-label">Serial Number</label>
                        <input type="text" class="form-control" id="inputSerialNo" name="editSerialNo">
                    </div>
                    <div class="col-md-6">
                        <label for="inputAssetTag" class="form-label">Asset Tag</label>
                        <input type="text" class="form-control" id="inputAssetTag" name="editAssetTag">
                    </div>
                   
                    <div class="col-md-6">
                        <label for="inputReportSentDate" class="form-label">Report Sent Date</label>
                        <input type="text" class="form-control" id="inputReportSentDate" name="editReportSentDate">
                    </div>
                    <div class="col-md-12">
                        <label for="inputStatusRemarks" class="form-label">Status Remarks</label>
                        <input type="text" class="form-control" id="inputStatusRemarks" name="editStatusReport">
                    </div>

                    <!--  -->
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

    <main id="deviceReport" class="border-top bg-light ">
        <h1 class="RPM m-5 text-dark">Device Report Status</h1>

        <div class="table-container bg-light mx-5 mb-5">
            <table class="table" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">SN</th>
                        <th scope="col">Device_Received_Date</th>
                        <th scope="col">Items</th>
                        <th scope="col">SOL</th>
                        <th scope="col">Item_Type</th>
                        <th scope="col">Serial_No</th>
                        <th scope="col">Asset_Tag</th>
                        <th scope="col">Report_Sent_Date</th>
                        <th scope="col">Status_Remarks</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM tabledevicereport";
                    $result = mysqli_query($conn, $sql);
                    $SN = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $SN = $SN + 1;
                        echo "<tr>
      <th scope='row'>" . $SN . "</th>
      <td>" . $row['Device_Received_Date'] . "</td>
      <td>" . $row['Items'] . "</td>
      <td>" . $row['SOL'] . "</td>
      <td>" . $row['Item_Type'] . "</td>
      <td>" . $row['Serial_No'] . "</td>
      <td>" . $row['Asset_Tag'] . "</td>
      <td>" . $row['Report_Sent_Date'] . "</td>
      <td>" . $row['Status_Remarks'] . "</td>
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
            Device_Received_Date = tr.getElementsByTagName("td")[0].innerText; 
            Items = tr.getElementsByTagName("td")[1].innerText;
            EmpSOL = tr.getElementsByTagName("td")[2].innerText; 
            Item_Type = tr.getElementsByTagName("td")[3].innerText;
            Serial_No = tr.getElementsByTagName("td")[4].innerText; 
            Asset_Tag = tr.getElementsByTagName("td")[5].innerText;
            Report_Sent_Date = tr.getElementsByTagName("td")[6].innerText; 
            Status_Remarks = tr.getElementsByTagName("td")[7].innerText;
          
            inputDevRecDate.value = Device_Received_Date;
            inputItems.value = Items;
            inputSol.value = EmpSOL;
            inputItemType.value = Item_Type;
            inputSerialNo.value = Serial_No;
            inputAssetTag.value = Asset_Tag;
            inputReportSentDate.value = Report_Sent_Date;
            inputStatusRemarks.value = Status_Remarks;
            snoEdit.value = e.target.id;
            // console.log(e.target.id);
            // console.log(e.target);

        })
    });

    deletebtn = document.getElementsByClassName("delete");

    Array.from(deletebtn).forEach((el) => {
    el.addEventListener("click", (e) => {
        sno = e.target.id.substr(1,);
  

        if(confirm('Are you sure you want to delete this record?')){
            console.log("yes");
            window.location = `./devicereport.php?delete=${sno}`;
        }else{
            console.log("no");
        }

    })
});

    </script>
</body>

</html>