<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Customer</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.15.0/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1 class="my-4">List Customer</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="row mb-3">
                <div class="col-md-6">
                    <input type="text" name="search" placeholder="Search...">
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>
                <div class="col-md-6 text-end">
                    <a href="home.php" class="btn btn-success">Add Customer</a>
                </div>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Username</th>
                        <th>Company Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Marking</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require 'koneksi.php';
                    $sql = "SELECT * FROM customer";
                    $result = mysqli_query($conn, $sql);
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $count++ . "</td>";
                        echo "<td>" . $row['Username'] . "</td>";
                        echo "<td>" . $row['CompanyName'] . "</td>";
                        echo "<td>" . $row['Email'] . "</td>";
                        echo "<td>" . $row['PhoneNumber'] . "</td>";
                        echo "<td>";
                        if ($row['Marking'] == 1) {
                            echo "<input type='checkbox' name='marking[]' value='" . $row['ID_User'] . "' checked>";
                        } else {
                            echo "<input type='checkbox' name='marking[]' value='" . $row['ID_User'] . "'>";
                        }
                        echo "</td>";
                        echo "<td>
                                <a href='edit.php?id=" . $row['ID_User'] . "' class='btn btn-primary btn-sm'>Edit</a>
                                <a href='delete.php?id=" . $row['ID_User'] . "' class='btn btn-danger btn-sm' onclick=\"return confirm('Are you sure you want to delete this customer?');\">Delete</a>
                              </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <button type="submit" name="submit_marking" class="btn btn-primary">Mark</button>
        </form>
        <?php
        require 'koneksi.php';

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset ($_POST['submit_marking'])) {
                if (isset ($_POST['marking'])) {
                    foreach ($_POST['marking'] as $customerID) {
                        // Update data marking di tabel customer
                        $sql = "UPDATE customer SET Marking = 1 WHERE ID_User = ?";
                        $stmt = mysqli_prepare($conn, $sql);
                        mysqli_stmt_bind_param($stmt, "i", $customerID);
                        mysqli_stmt_execute($stmt);
                    }
                    echo '<script>alert("Marking updated successfully.");</script>';
                    header("location:list.php");
                } else {
                    echo '<script>alert("Please select at least one customer to mark.");</script>';
                }
            }
        }
        ?>

    </div>
</body>

</html>