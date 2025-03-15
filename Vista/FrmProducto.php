<?php
include_once '../Control/CtrProducto.php';
include_once '../Modelos/Producto.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $codigo = $_POST["codigo"];
    $nombre = $_POST["nombre"];
    $stock = $_POST["stock"];
    $valorUnitario = $_POST["valorUnitario"];
    $accion = $_POST["accion"];

    $producto = new Producto($codigo, $nombre, $stock, $valorUnitario);
    $ctrProducto = new CtrProducto($producto);

    switch ($accion) {
        case "Guardar":
            echo $ctrProducto->guardar();
            break;
        case "Consultar":
            print_r($ctrProducto->consultar());
            break;
        case "Modificar":
            echo $ctrProducto->modificar();
            break;
        case "Eliminar":
            echo $ctrProducto->borrar();
            break;
    }
}
?>

<form method="post">
    Código: <input type="text" name="codigo" required>
    Nombre: <input type="text" name="nombre">
    Stock: <input type="number" name="stock" min="0">
    Valor Unitario: <input type="number" name="valorUnitario" step="0.01">
    <button type="submit" name="accion" value="Guardar">Guardar</button>
    <button type="submit" name="accion" value="Consultar">Consultar</button>
    <button type="submit" name="accion" value="Modificar">Modificar</button>
    <button type="submit" name="accion" value="Eliminar">Eliminar</button>
</form>
