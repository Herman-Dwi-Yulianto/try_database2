<?php

    include_once("connection.php");

    // Update
    if (isset($_POST['update'])) {
        $id = $_POST['id'];

        $name = $_POST['name'];
        $address = $_POST['address'];

        // query untuk update data
        $query = mysqli_query($mysqli,
        "UPDATE users SET name='$name', address='$address' WHERE id='$id' ");

        header('Location: index.php');
    }

    // Ambil data user
    $id = $_GET['id'];

    $query = mysqli_query($mysqli, "SELECT * FROM users WHERE id='$id'");

    while($user_data = mysqli_fetch_array($query)) {
        $name = $user_data['name'];
        $address = $user_data['address'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Membuat User</title>
</head>
<body>
    <a href="index.php">Kembali</a>

    <form action="edit.php" method="POST" name="editUser">
        <table border="0">
            <tr>
                <td>Nama</td>
                <td><input type="text" name="name" value="<?= $name ?>"></td>
            </tr>
            <tr>
                <td>Telepon</td>
                <td><input type="text" name="address" value="<?= $address ?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $_GET['id'] ?>"></td>
                <td><input type="submit" name="update" value="Update"></td>
            </tr>
        </table>
    </form>
</body>
</html>