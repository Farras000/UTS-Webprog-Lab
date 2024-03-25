<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Customer</title>
    <link rel="stylesheet" href="css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background-color: var(--1) ; color: var(--4); ">
    <?php showNavbarBasedOnRole(); ?>
    <div class="container" style="margin-top: 85px ; ">
        <h1 class="my-4">Edit Customer</h1>
        <?php
        require 'koneksi.php';

        // Mendapatkan ID Customer dari URL
        $customerID = $_GET['id'];

        // Query untuk mendapatkan data customer berdasarkan ID
        $sql = "SELECT * FROM customer WHERE ID_User = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "i", $customerID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        // Memeriksa apakah form disubmit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $username = $_POST['username'];
            $companyName = $_POST['companyName'];
            $email = $_POST['email'];
            $phoneNumber = $_POST['phoneNumber'];

            // Query untuk memperbarui data customer
            $sql_update = "UPDATE customer SET Username = ?, CompanyName = ?, Email = ?, PhoneNumber = ? WHERE ID_User = ?";
            $stmt_update = mysqli_prepare($conn, $sql_update);
            mysqli_stmt_bind_param($stmt_update, "ssssi", $username, $companyName, $email, $phoneNumber, $customerID);

            if (mysqli_stmt_execute($stmt_update)) {
                echo '<div class="alert alert-success" role="alert">Customer updated successfully.</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error updating customer.</div>';
            }
        }


        function showNavbarBasedOnRole()
        {
            if (isset ($_SESSION['arole'])) {
                $role = $_SESSION['arole'];
                if ($role == 'user') {
                    include 'Nav/NavAdmin.php';
                } elseif ($role == 'user') {
                    include 'Nav/NavAdmin.php';
                } else {
                    include 'Nav/NavAdmin.php';
                }
            } else {
                include 'Nav/NavAdmin.php';
            }
        }

        ?>

        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username"
                    value="<?php echo $row['Username']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="companyName" class="form-label">Company Name</label>
                <input type="text" class="form-control" id="companyName" name="companyName"
                    value="<?php echo $row['CompanyName']; ?>" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $row['Email']; ?>"
                    required>
            </div>
            <div class="mb-3">
                <label for="phoneNumber" class="form-label">Phone Number</label>
                <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"
                    value="<?php echo $row['PhoneNumber']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="list.php" class="btn btn-secondary">back</a>
        </form>
    </div>
</body>

</html>