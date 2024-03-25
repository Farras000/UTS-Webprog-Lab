<?php
require 'koneksi.php';

// Memastikan sesi dimulai sebelum menggunakan $_SESSION
session_start();

// Memeriksa apakah captcha benar
if ($_POST['captcha'] != $_SESSION['captcha']) {
    die ('CAPTCHA Incorrect! <a href="javascript:history.back()">Back</a>');
}

// Memeriksa apakah data telah disubmit
if (isset ($_POST['submit'])) {
    $fullName = $_POST['fullName'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $role = 'customer';
    $companyName = $_POST['companyName'];
    $phoneNumber = $_POST['phoneNumber'];
    $sql = "INSERT INTO user (FullName, Username, Email, Password, Gender, Birthdate, RegistrationDate, Role, CompanyName, PhoneNumber) 
            VALUES (?, ?, ?, ?, ?, ?, NOW(), ?, ?, ?)";

    // Persiapkan statement
    $stmt = mysqli_prepare($conn, $sql);

    // Bind parameter ke statement
    mysqli_stmt_bind_param($stmt, "sssssssss", $fullName, $username, $email, $password, $gender, $birthdate, $role, $companyName, $phoneNumber);

    // Eksekusi statement
    if (mysqli_stmt_execute($stmt)) {
        header("location:index.php");
        echo '<script>alert("Registrasi berhasil!");</script>';
    } else {
        echo '<script>alert("Registrasi gagal!");</script>';
    }

    // Tutup statement
    mysqli_stmt_close($stmt);
}
?>