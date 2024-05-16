<!DOCTYPE html>
<html>
<head>
    <title>Formulario CRUD</title>
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
    <h1>Formulario CRUD</h1>

    <form id="crud-form" action="process_sql.php" method="POST">

        <div id="table-group" class="form-group">
            <label for="tableName">Nombre de la tabla</label>
            <input
                type="text"
                class="form-control"
                id="tableName"
                name="tableName"
                placeholder="Nombre de la tabla"
            />
        </div>

        <div id="column-group" class="form-group">
            <label for="columnName">Nombre de la columna</label>
            <input
                type="text"
                class="form-control"
                id="columnName"
                name="columnName[]"
                placeholder="Nombre de la columna"
            />
        </div>

        <div id="column-group" class="form-group">
            <label for="columnType">Tipo de columna</label>
            <select name="columnType[]" class="form-control">
                <option value="INTEGER">INTEGER</option>
                <option value="VARCHAR">VARCHAR</option>
                <!-- Agrega más opciones según sea necesario -->
            </select>
        </div>

        <button type="button" class="btn btn-success" onclick="addColumn()">Añadir columna</button>
        
        <div id="sentencia-group" class="form-group">
            <label for="sentencia">Selecciona una acción:</label>
            <select name="sentencia" id="sentencia" class="form-control">
                <option value="create_table">Crear tabla</option>
                <!-- Agrega aquí más opciones según sea necesario -->
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>

<script>
    // Función para añadir más campos de columna
    function addColumn() {
        var columnGroup = document.getElementById('column-group');
        var newInput = document.createElement('input');
        newInput.type = 'text';
        newInput.className = 'form-control';
        newInput.name = 'columnNames[]';
        newInput.placeholder = 'Nombre de la columna';
        columnGroup.appendChild(newInput);

        var newInputType = document.createElement('input');
        newInputType.type = 'text';
        newInputType.className = 'form-control';
        newInputType.name = 'columnTypes[]';
        newInputType.placeholder = 'Tipo de columna';
        columnGroup.appendChild(newInputType);
    }
</script>

</body>
</html>


