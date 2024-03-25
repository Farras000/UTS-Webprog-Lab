<?php
require 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $companyName = $_POST['companyName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];

    $sql = "INSERT INTO customer (Username, CompanyName, Email, PhoneNumber) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "ssss", $username, $companyName, $email, $phoneNumber);

    if (mysqli_stmt_execute($stmt)) {

        header("location:home.php");

    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_stmt_close($stmt);

    mysqli_close($conn);
}
?>