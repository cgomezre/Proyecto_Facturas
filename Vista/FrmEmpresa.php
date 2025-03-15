<?php
include_once '../Control/CtrEmpresa.php';
include_once '../Modelo/Empresa.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $accion = $_POST["accion"];

    $empresa = new Empresa($codigo, $nombre);
    $ctrEmpresa = new CtrEmpresa($empresa);

    switch ($accion) {
        case "Guardar":
            echo $ctrEmpresa->guardar();
            break;
        case "Consultar":
            print_r($ctrEmpresa->consultar());
            break;
        case "Modificar":
            echo $ctrEmpresa->modificar();
            break;
        case "Eliminar":
            echo $ctrEmpresa->borrar();
            break;
    }
}
?>

<form method="post">
    Código: <input type="text" name="codigo" required>
    Nombre: <input type="text" name="nombre">
    <button type="submit" name="accion" value="Guardar">Guardar</button>
    <button type="submit" name="accion" value="Consultar">Consultar</button>
    <button type="submit" name="accion" value="Modificar">Modificar</button>
    <button type="submit" name="accion" value="Eliminar">Eliminar</button>
</form>
