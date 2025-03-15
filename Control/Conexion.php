<?php
class Conexion {
    
    private static string $host = "localhost";
    private static string $usuario = "root";
    private static string $password = "";
    private static string $bd = "bdfacturas";
    private static int $puerto = 3306;
    
    private static $conexion;

    // 🔹 **Método para establecer la conexión**
    public static function conectar() {
        if (!isset(self::$conexion)) {
            self::$conexion = new mysqli(
                self::$host, 
                self::$usuario, 
                self::$password, 
                self::$bd, 
                self::$puerto
            );

            // Manejo de errores
            if (self::$conexion->connect_error) {
                die("Error en la conexión: " . self::$conexion->connect_error);
            }
        }
        return self::$conexion;
    }

    // 🔹 **Método para cerrar la conexión**
    public static function cerrarConexion() {
        if (isset(self::$conexion)) {
            self::$conexion->close();
            self::$conexion = null;
        }
    }
}
?>
