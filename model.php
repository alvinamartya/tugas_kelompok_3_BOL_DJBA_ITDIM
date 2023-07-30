<?php 
 
class database{
    var $host = "localhost";
    var $uname = "root";
    var $pass = "";
    var $db = "toko";
    var $connection; // Add a property to hold the database connection

    function __construct(){
        // Create a mysqli connection
        $this->connection = new mysqli($this->host, $this->uname, $this->pass, $this->db);

        // Check for connection errors
        if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
        }
    }

    function tampil_data(){
        $data = $this->connection->query("select * from barang");
        $hasil = array(); // Initialize the result array
        while($d = $data->fetch_assoc()){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function input($NamaBarang, $stok, $harga){
        $query = "INSERT INTO barang (NamaBarang, stok, harga) VALUES ('$NamaBarang', '$stok', '$harga')";
        $this->connection->query($query);
    }

    function hapus($IdBarang){
        $query = "DELETE FROM barang WHERE IdBarang='$IdBarang'";
        $this->connection->query($query);
    }

    function edit($IdBarang){
        $query = "SELECT * FROM barang WHERE IdBarang='$IdBarang'";
        $data = $this->connection->query($query);
        $hasil = array(); // Initialize the result array
        while($d = $data->fetch_assoc()){
            $hasil[] = $d;
        }
        return $hasil;
    }

    function update($IdBarang,$NamaBarang,$stok, $harga){
        $query = "UPDATE barang SET NamaBarang='$NamaBarang', stok='$stok', harga='$harga' WHERE IdBarang='$IdBarang'";
        $this->connection->query($query);
    }
}
?>

