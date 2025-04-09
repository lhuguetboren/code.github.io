<?php
include_once 'load.php';

use BaseXClient\BaseXException;
use BaseXClient\Session;

try {
    $session = new Session("localhost", 1984, "admin", "admin");

    // Abre la base de datos
    $session->execute("OPEN prueba");

    // Consulta XQuery
    $input = '//libros/libro';
    $query = $session->query($input);
    $result = $query->execute();

    echo "<h1>Contenido de la Base de Datos</h1>";
    echo "<pre>" . htmlentities($result) . "</pre>";

    // Cierra la consulta
    $query->close();

} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $session->close();
}
?>
