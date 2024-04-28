<?php
// Verifica si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica si se han seleccionado clientes y motorizado
    if(isset($_POST["clientes"]) && isset($_POST["motorizado"])) {
        // Obtiene los valores seleccionados
        $clientes = $_POST["clientes"];
        $motorizado = $_POST["motorizado"];

        // Conexión a la base de datos
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

        // Insertar datos en la tabla viandas
        foreach($clientes as $cliente) {
            $sql = "INSERT INTO viandas (id_cliente, id_motorizado) VALUES ('$cliente', '$motorizado')";
            if ($conn->query($sql) === TRUE) {
                echo "Registro insertado correctamente";
            } else {
                echo "Error al insertar registro: " . $conn->error;
            }
        }

        // Cerrar conexión
        $conn->close();
    } else {
        echo "Por favor, selecciona al menos un cliente y un motorizado.";
    }
} else {
    echo "El formulario no se ha enviado correctamente.";
}

?>


