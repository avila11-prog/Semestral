<?php
class Conecta {
    private $host = "localhost";
    private $user = "root"; // Usuario de MySQL
    private $pass = "";     // Contraseña de MySQL
    private $dbname = "zen_interior";

    public function conectarDB() {
        $cnn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

        if ($cnn->connect_error) {
            die("Error de conexión: " . $cnn->connect_error);
        }

        return $cnn;
    }
}
?>