<?php
if(isset($_POST['sentencia'])) {
    $sentencia = $_POST['sentencia'];
    echo "La sentencia SQL ingresada es: " . htmlspecialchars($sentencia);
} else {
    header("Location: formulario.php");
    exit;
}
?>
