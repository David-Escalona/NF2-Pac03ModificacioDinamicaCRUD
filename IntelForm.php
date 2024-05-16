<?php

class IntelForm {
    private $name;
    private $email;
    private $superheroAlias;

    public function __construct($name, $email, $superheroAlias) {
        $this->name = $name;
        $this->email = $email;
        $this->superheroAlias = $superheroAlias;
    }

    public function processForm() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Verificar si se han recibido los datos del formulario
            if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["superheroAlias"])) {
                // Asignar valores del formulario a propiedades
                $this->name = $_POST["name"];
                $this->email = $_POST["email"];
                $this->superheroAlias = $_POST["superheroAlias"];

                // Mostrar los datos del formulario
                echo "<p>Name: " . htmlspecialchars($this->name) . "</p>";
                echo "<p>Email: " . htmlspecialchars($this->email) . "</p>";
                echo "<p>Superhero Alias: " . htmlspecialchars($this->superheroAlias) . "</p>";
            } else {
                echo "Error: Los datos del formulario están incompletos.";
            }
        } else {
            echo "Error: El formulario no se ha enviado correctamente.";
        }
    }
}
?>

