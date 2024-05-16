<!DOCTYPE html>
<html>
<head>
    <title>jQuery Form Example</title>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css"/>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

    <style>
        .form-result {
            margin-top: 20px;
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 5px;
        }

        .form-result h3 {
            margin-top: 0;
        }
    </style>
</head>
<body>
<div class="col-sm-6 col-sm-offset-3">
    <h1>Processing an AJAX Form</h1>

    <form action="process_sql.php" method="POST">

        <div id="tableName-group" class="form-group">
            <label for="tableName">Table Name</label>
            <input
                type="text"
                class="form-control"
                id="tableName"
                name="tableName"
                placeholder="Enter Table Name"
            />
        </div>

        <div id="columnNames-group" class="form-group">
            <label for="columnNames">Column Names</label>
            <input
                type="text"
                class="form-control"
                id="columnNames"
                name="columnNames[]"
                placeholder="Column Name 1"
            />
            <input
                type="text"
                class="form-control"
                id="columnNames"
                name="columnNames[]"
                placeholder="Column Name 2"
            />
            <!-- You can add more input fields for additional column names -->
        </div>

        <div id="columnTypes-group" class="form-group">
            <label for="columnTypes">Column Types</label>
            <input
                type="text"
                class="form-control"
                id="columnTypes"
                name="columnTypes[]"
                placeholder="Column Type 1 (e.g., VARCHAR(255))"
            />
            <input
                type="text"
                class="form-control"
                id="columnTypes"
                name="columnTypes[]"
                placeholder="Column Type 2 (e.g., INT)"
            />
            <!-- You can add more input fields for additional column types -->
        </div>
        
        <div id="sentencia-group" class="form-group">
            <label for="sentencia">Selecciona una sentencia SQL:</label>
            <select name="sentencia" id="sentencia" class="form-control">
                <option value="create_table">create table_name</option>
                <option value="read_table_all">read table_name all</option>
                <option value="read_table_id">read table_name id</option>
                <option value="update_table_id">update table_name id</option>
                <option value="delete_table_id">delete table_name id</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">
            Submit
        </button>
    </form>
</div>

<div class="col-sm-6 col-sm-offset-3 form-result">

    <?php
    // Verificar si se ha enviado una sentencia SQL
    if(isset($_POST['sentencia'])) {
        // Recibir la sentencia SQL desde el formulario
        $sentencia = $_POST['sentencia'];
   
        echo "<h3>La sentencia SQL seleccionada es:</h3>";
        echo "<p>" . htmlspecialchars($sentencia) . "</p>";
    }
    ?>
</div>
</body>
</html>



