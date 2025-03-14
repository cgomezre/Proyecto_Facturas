<?php
include_once '../Control/CtrVendedor.php';
include_once '../Modelo/Vendedor.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST["codigo"];
    $carnet = $_POST["carnet"];
    $direccion = $_POST["direccion"];
    $persona_codigo = $_POST["persona_codigo"];
    $accion = $_POST["accion"];

    $vendedor = new Vendedor($codigo, $carnet, $direccion, $persona_codigo);
    $ctrVendedor = new CtrVendedor($vendedor);

    switch ($accion) {
        case "Guardar":
            echo $ctrVendedor->guardar();
            break;
        case "Consultar":
            print_r($ctrVendedor->consultar());
            break;
        case "Modificar":
            echo $ctrVendedor->modificar();
            break;
        case "Eliminar":
            echo $ctrVendedor->borrar();
            break;
    }
}
?>

<form method="post">
    Código: <input type="text" name="codigo" required>
    Carnet: <input type="number" name="carnet">
    Dirección: <input type="text" name="direccion">
    Código persona: <input type="text" name="persona_codigo" required>
    <button type="submit" name="accion" value="Guardar">Guardar</button>
    <button type="submit" name="accion" value="Consultar">Consultar</button>
    <button type="submit" name="accion" value="Modificar">Modificar</button>
    <button type="submit" name="accion" value="Eliminar">Eliminar</button>
</form>
