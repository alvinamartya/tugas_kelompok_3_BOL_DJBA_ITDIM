<!DOCTYPE html>
<html>
<head>
    <title>CRUD View</title>
</head>
<body>
    <?php
    // Include the controller
    require_once 'controller.php';

    // Instantiate the controller
    $controller = new Controller();

    // Process the form submission for adding a new record
    if (isset($_POST['submit'])) {
        $NamaBarang = $_POST['NamaBarang'];
        $stok = $_POST['stok'];
        $harga = $_POST['harga'];
        $controller->addData($NamaBarang, $stok, $harga);
    }

    // Display data from the database
    $data = $controller->getData();
    if (!empty($data)) {
        echo "<table>
                <tr>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>";
        foreach ($data as $item) {
            echo "<tr>";
            echo "<td>" . $item['IdBarang'] . "</td>";
            echo "<td>" . $item['NamaBarang'] . "</td>";
            echo "<td>" . $item['stok'] . "</td>";
            echo "<td>" . $item['harga'] . "</td>";
            echo "<td><a href='edit.php?IdBarang=" . $item['IdBarang'] . "'>Edit</a></td>";
            echo "<td><a href='delete.php?IdBarang=" . $item['IdBarang'] . "'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No data found.";
    }
    ?>

    <h2>Add New Record</h2>
    <form method="post">
        <label for="NamaBarang">Nama Barang:</label>
        <input type="text" id="NamaBarang" name="NamaBarang" required>
        <br>
        <label for="stok">Stok:</label>
        <input type="number" id="stok" name="stok" required>
        <br>
        <label for="harga">Harga:</label>
        <input type="number" id="harga" name="harga" required>
        <br>
        <input type="submit" name="submit" value="Add">
    </form>
</body>
</html>