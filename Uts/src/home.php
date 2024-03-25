<?php include 'login.php' ?>
<!DOCTYPE html>
<html lang="en">
<!--divinectorweb.com-->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add customer</title>

    <!-- All CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.7.2/font/bootstrap-icons.min.css"
        rel="stylesheet">

    <link rel="stylesheet" href="css/home.css">
</head>

<style>
    :root {
        --1: #1B2E3C;
        --2: #0C0C1E;
        --3: #4B0000;
        --4: #F3E3E2;

    }
</style>

<body style="background-color : var(--1); color: var(--4);">

    <?php

    include 'koneksi.php';







    if ($_SESSION['arole'] === 'user' && isset ($_SESSION['alogin'])) {
        $userID = $_SESSION['alogin'];
    } else {
        $userID = $_SESSION['ulogin'];
    }


    function showNavbarBasedOnRole()
    {
        if (isset ($_SESSION['arole'])) {
            $role = $_SESSION['arole'];
            if ($role == 'user') {
                include 'Nav/NavAdmin.php';
            } elseif ($role == 'user') {
                include 'Nav/NavUser.php';
            } else {
                include 'Nav/NavUser.php';
            }
        } else {
            include 'Nav/NavUser.php';
        }
    }


    ?>



    <?php showNavbarBasedOnRole(); ?>
    <div class="container" style="margin-top: 95px; margin-bottom: 95px; ">
        <h1 class="my-4">Add Customer</h1>
        <form action="add_customer.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" required>
            </div>
            <div class="mb-3">
                <label for="companyName" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="companyName" name="companyName" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="phoneNumber" class="form-label">Phone Number</label>
                <input type="tel" class="form-control" id="phoneNumber" name="phoneNumber" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>






    <footer class="text-center text-lg-start " style="background-color: #1c2331">
        <!-- Section: Social media -->
        <section class="d-flex justify-content-between p-4" style="background-color: #6351ce">

        </section>

        <section class="">
            <div class="container text-center text-md-start mt-5">
                <!-- Grid row -->
                <div class="row mt-3">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                        <!-- Content -->
                        <h6 class="text-uppercase fw-bold">PT Damen Sejahtera</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p>
                            Atur kontak anda sesuai kebutuhan anda
                        </p>
                    </div>

                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 ">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">Contact</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color: #7c4dff; height: 2px" />

                        <p><i class="fas fa-envelope mr-3"></i> ase@gmail.com</p>
                        <p><i class="fas fa-phone mr-3"></i> +62 812-2166-6690</p>

                    </div>
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4 ">
                        <!-- Links -->
                        <h6 class="text-uppercase fw-bold">Alamat</h6>
                        <hr class="mb-4 mt-0 d-inline-block mx-auto"
                            style="width: 60px; background-color: #7c4dff; height: 2px" />
                        <p><i class="fas fa-home mr-3"></i> Jalan Scientia Boulevard Gading, Curug Sangereng, Serpong,
                            Kabupaten Tangerang, Banten 15810</p>


                    </div>

                </div>

            </div>
        </section>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
            © 2020 Copyright:
            <a class="" style="">Damen.com</a>
        </div>

    </footer>
    <script>
        function openInstagram(url) {
            window.location.href = url;
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>

</html>




<!--for getting the form download the code from download button-->