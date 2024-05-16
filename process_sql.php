<?php
// Establecer la conexión a la base de datos (Asegúrate de cambiar estos valores según tu configuración)
$host = 'localhost'; // Host de la base de datos
$port = '5432'; // Puerto de la base de datos (predeterminado es 5432)
$dbname = 'usuaris'; // Nombre de la base de datos
$user = 'postgres'; // Nombre de usuario de la base de datos
$password = 'root'; // Contraseña de la base de datos

$dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";
try {
    $pdo = new PDO($dsn);
} catch (PDOException $e) {
    die('Error al conectarse a la base de datos: ' . $e->getMessage());
}

// Verificar si se ha enviado la variable 'sentencia' desde el formulario
if(isset($_POST['sentencia'])) {
    // Obtener el valor de la variable 'sentencia'
    $action = $_POST['sentencia'];

    // Ejecutar la acción correspondiente
    switch ($action) {
        case 'create_table':
            // Obtener los datos del formulario para crear la tabla
            if (isset($_POST['tableName']) && isset($_POST['columnName']) && isset($_POST['columnType'])) {
                // Obtener el nombre de la tabla
                $tableName = $_POST['tableName'];

                // Verificar si la tabla ya existe
                $checkSql = "SELECT EXISTS (
                    SELECT 1 
                    FROM information_schema.tables 
                    WHERE table_schema = 'public' 
                    AND table_name = :tableName
                )";
                $stmt = $pdo->prepare($checkSql);
                $stmt->execute(['tableName' => $tableName]);
                $tableExists = $stmt->fetchColumn();

                if (!$tableExists) {
                    // La tabla no existe, proceder con la creación de la tabla
                    // Obtener los nombres de las columnas y sus tipos
                    $columnNames = $_POST['columnName'];
                    $columnTypes = $_POST['columnType'];

                    // Construir la consulta para crear la tabla
                    $sql = "CREATE TABLE $tableName (id SERIAL PRIMARY KEY";
                    foreach ($columnNames as $index => $columnName) {
                        $columnType = $columnTypes[$index];
                        $sql .= ", $columnName $columnType";
                    }
                    $sql .= ")";

                    // Ejecutar la consulta para crear la tabla
                    if ($pdo->query($sql)) {
                        echo "Tabla creada correctamente.";
                    } else {
                        echo "Error al crear la tabla: " . implode(" ", $pdo->errorInfo());
                    }
                } else {
                    // La tabla ya existe, mostrar un mensaje de error
                    echo "Error: La tabla ya existe en la base de datos.";
                }
            } else {
                echo "Error: Datos insuficientes para crear la tabla.";
            }
            break;

        default:
            echo "Opción no válida.";
    }
} else {
    echo "Error: La variable 'sentencia' no está definida.";
}
?>

