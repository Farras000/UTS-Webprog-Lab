<?php
require 'koneksi.php';

// Memeriksa apakah ID customer telah diterima dari URL
if (isset ($_GET['id'])) {
    // Mendapatkan ID customer dari URL
    $customerID = $_GET['id'];

    // Query SQL untuk menghapus data customer berdasarkan ID
    $sql = "DELETE FROM customer WHERE ID_User = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $customerID);

    // Eksekusi query
    if (mysqli_stmt_execute($stmt)) {
        // Jika penghapusan berhasil, arahkan kembali ke halaman list customer dengan pesan sukses
        header("location: list.php?success=Customer deleted successfully.");
        exit();
    } else {
        // Jika terjadi kesalahan, arahkan kembali ke halaman list customer dengan pesan error
        header("location: list.php?error=Error deleting customer.");
        exit();
    }
} else {
    // Jika tidak ada ID customer yang diterima dari URL, arahkan kembali ke halaman list customer
    header("location: list.php");
    exit();
}
?>