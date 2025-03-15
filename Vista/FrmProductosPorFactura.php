<?php
include_once '../Control/CtrProductosPorFactura.php';
include_once '../Modelo/ProductosPorFactura.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $facturaCodigo = $_POST["facturaCodigo"];
    $productoCodigo = $_POST["productoCodigo"];
    $cantidad = $_POST["cantidad"];
    $subtotal = $_POST["subtotal"];
    $accion = $_POST["accion"];

    $productosPorFactura = new ProductosPorFactura($facturaCodigo, $productoCodigo, $cantidad, $subtotal);
    $ctrProductosPorFactura = new CtrProductosPorFactura($productosPorFactura);

    switch ($accion) {
        case "Guardar":
            echo $ctrProductosPorFactura->guardar();
            break;
        case "Consultar":
            print_r($ctrProductosPorFactura->obtenerPorFactura($facturaCodigo));
            break;
        case "Modificar":
            echo $ctrProductosPorFactura->actualizarCantidad($facturaCodigo, $productoCodigo, $cantidad, $subtotal);
            break;
        case "Eliminar":
            echo $ctrProductosPorFactura->borrar($facturaCodigo, $productoCodigo);
            break;
    }
}
?>

<form method="post">
    Número de Factura asociada: <input type="number" name="facturaCodigo" required>
    Código del Producto: <input type="text" name="productoCodigo" required>
    Cantidad: <input type="number" name="cantidad" min="1" required>
    Subtotal: <input type="number" name="subtotal" step="0.01" required>
    <button type="submit" name="accion" value="Guardar">Guardar</button>
    <button type="submit" name="accion" value="Consultar">Consultar</button>
    <button type="submit" name="accion" value="Modificar">Modificar</button>
    <button type="submit" name="accion" value="Eliminar">Eliminar</button>
</form>
