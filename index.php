<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "multiselect";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Selección</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/css/bootstrap-select.min.css" integrity="sha512-mR/b5Y7FRsKqrYZou7uysnOdCIJib/7r5QeJMFvLNHNhtye3xJp1TdJVPLtetkukFn227nKpXD9OjUc09lx97Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div class="container mt-5">
        <form action="procesar_formulario.php" method="post">

            <!-- Select para motorizados (solo selección única) -->
            <select class="selectpicker" name="motorizado">
                <?php

                // Consulta para obtener los nombres de los motorizados
                $sql_motorizados = "SELECT id_motorizado, nombre FROM motorizado";
                $result_motorizados = $conn->query($sql_motorizados);

                

                // Mostrar opciones de motorizados
                if ($result_motorizados->num_rows > 0) {
                    while ($row = $result_motorizados->fetch_assoc()) {
                        echo "<option value='" . $row["id_motorizado"] . "'>" . $row["nombre"] . "</option>";
                    }
                } else {
                    echo "<option value=''>No hay motorizados disponibles</option>";
                }
                ?>
            </select>


            <!-- Select para clientes (multiselect) -->
            <select class="selectpicker" name="clientes[]" multiple>
                <?php
                // Consulta para obtener los nombres de los clientes
                $sql_clientes = "SELECT id_cliente, nombre FROM clientes";
                $result_clientes = $conn->query($sql_clientes);

                // Mostrar opciones de clientes
                if ($result_clientes->num_rows > 0) {
                    while ($row = $result_clientes->fetch_assoc()) {
                        echo "<option value='" . $row["id_cliente"] . "'>" . $row["nombre"] . "</option>";
                    }
                } else {
                    echo "<option value=''>No hay clientes disponibles</option>";
                }
                ?>
            </select>
                <button class="btn btn-secondary" type="submit">Pedir</button>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.14.0-beta2/js/bootstrap-select.min.js" integrity="sha512-FHZVRMUW9FsXobt+ONiix6Z0tIkxvQfxtCSirkKc5Sb4TKHmqq1dZa8DphF0XqKb3ldLu/wgMa8mT6uXiLlRlw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>
</html>

<?php
// Cerrar conexión
$conn->close();
?>