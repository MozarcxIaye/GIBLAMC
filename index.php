<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GAMC | Portal</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

</head>


<body>

    <!-- <div class='navbar'> -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-0 border-bottom fixed-top">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand text-danger" href="#">G<span class='text-primary ms-1'>AMC<span></a>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#aboutme">About Me</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contactme">Contact Me</a>
                    </li>
                </ul>

            </div>
        </div>
    </nav>

    <main id="home" class="d-flex justify-content-center align-items-center">
        <div class="container">
            <h1 class='text-light'>Global IME Bank</h1>
            <h1 class='text-light'>Annual Maintenance Contract</h1>

        </div>
    </main>
    <section id="dashboard" class="bg-light d-flex justify-content-center align-items-center">
        <div class="dash-container">
            <ul class="d-flex flex-column list-unstyled text-decoration-none g-4">
                <li><a class = dash-links href='/Gamc/staff.php'>All Staff List</a></li>
                <li><a class = dash-links href='/Gamc/branch.php'>Branch List</a></li>
                <li><a class = dash-links href='/Gamc/vendor.php'>Vendor List</a></li>
                <li><a class = dash-links href='/Gamc/rpm.php'>RPM Status</a></li>
                <li><a class = dash-links href='/Gamc/devicereport.php'>Technical Report Status</a></li>
            </ul>
        </div>

    </section>
    <section id="aboutme" class="bg-dark">
       
        <div class="about_container">

     
        <div class='name_heading'>Krish Shrestha</div>
        <div class="intro">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quas quis, a, voluptas laboriosam esse maxime, dolores dolorum neque eum ut maiores repudiandae ducimus quisquam dolor doloribus dolore odio? Fugit explicabo minus, voluptate repellat, accusamus facilis culpa, nemo nesciunt beatae nisi odit! Sed illo, sit ratione libero ducimus nulla id officiis odit, natus veritatis quos?</div>
    </div>

    </section>
    <section id="contactme" class="bg-light">
     

        <div class="contact_container">
            <h1>Contact Us</h1>
 <div class="form-floating mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
            <label for="floatingInput">Email address</label>
          </div>
          <div class="form-floating">
            <input type="text" class="form-control" id="floatingText" placeholder="Name">
            <label for="floatingText">Name</label>
          </div>
          <div class="form-floating">
            <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2">Comments</label>
          </div> 
     
            <button type="button" class="btn btn-outline-dark">Submit</button>
        </div>
       
          

    </section>

    <!-- </div> -->





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <!-- <script src="main.js"></script> -->
</body>

</html>