<?php
$usuario=$_POST['username'];
$clave=$_POST['password'];
echo "El usuario es : $usuario<br>";
echo "La contraseña es :$clave";

include_once('db.php');
$sql="SELECT * FROM acceso LEFT JOIN permisos ON acceso.rol = permisos.Id_permisos  WHERE usuario='$usuario' AND clave  ='$clave' ";
//Funcion conectar
$conectar=conn();
$resul = mysqli_query($conectar, $sql) or trigger_error("Error:", mysqli_error($conectar));
$fila = mysqli_fetch_assoc($resul);

// Verificar si se encontró un resultado
if ($fila) {
    // Diferenciar entre administrador y usuario
    if ($fila['Rol'] === 'Administrador') {
        echo "Bienvenido admin";
        // Redirigir a una página de administración
        header("Location: admin.php");
        exit();
    } else if ($fila['Rol'] === 'Usuario') {
        echo "Bienvenido usuario";
        // Redirigir a una página de usuario
        header("Location: usuario.php");
        exit();
    }
} else {
    // Si no se encontró el usuario o la contraseña es incorrecta
    echo "Usuario o contraseña incorrectos";
}

// Cerrar la conexión
mysqli_close($conectar);
?>