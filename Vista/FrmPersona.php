<?php

include_once __DIR__ . '/../Control/conexion.php';
include_once __DIR__ . '/../Modelo/Persona.php';
include_once __DIR__ . '/../Control/CtrPersona.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST["codigo"];
    $email = $_POST["email"];
    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $accion = $_POST["accion"];

    $persona = new Persona($codigo, $email, $nombre, $telefono);
    $ctrPersona = new CtrPersona($persona);

    switch ($accion) {
        case "Guardar":
            echo $ctrPersona->guardar();
            break;
        case "Consultar":
            $personaConsultada = $ctrPersona->consultar();
            print_r($personaConsultada);
            break;
        case "Modificar":
            echo $ctrPersona->modificar();
            break;
        case "Eliminar":
            echo $ctrPersona->borrar();
            break;
    }
}
?>

<form method="post">
    Código: <input type="text" name="codigo" required>
    Email: <input type="email" name="email">
    Nombre: <input type="text" name="nombre">
    Teléfono: <input type="text" name="telefono">
    <button type="submit" name="accion" value="Guardar">Guardar</button>
    <button type="submit" name="accion" value="Consultar">Consultar</button>
    <button type="submit" name="accion" value="Modificar">Modificar</button>
    <button type="submit" name="accion" value="Eliminar">Eliminar</button>
</form>
