<?php
// Include the model (database) class
require_once 'model.php';

class Controller
{
    private $dbObject;

    function __construct()
    {
        // Instantiate the database class
        $this->dbObject = new database();
    }

    function getData()
    {
        // Get data from the database
        return $this->dbObject->tampil_data();
    }

    function addData($NamaBarang, $stok, $harga)
    {
        // Add new data to the database
        $this->dbObject->input($NamaBarang, $stok, $harga);
    }

    function deleteData($IdBarang)
    {
        // Delete data from the database
        $this->dbObject->hapus($IdBarang);
    }

    function getSingleData($IdBarang)
    {
        // Get single data from the database for editing
        return $this->dbObject->edit($IdBarang);
    }

    function updateData($IdBarang, $NamaBarang, $stok, $harga)
    {
        // Update data in the database
        $this->dbObject->update($IdBarang, $NamaBarang, $stok, $harga);
    }
}
?>
