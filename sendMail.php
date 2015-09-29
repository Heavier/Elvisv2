<?php
$dbc = mysqli_connect('localhost','root','root','elvisdb')
    or die ('No se ha podido conectar con la base de datos.');

$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];

if (empty($asunto) || empty($mensaje)){
    echo "Revise el formulario, el asunto o el mensaje están vacíos.";
}else{
    
    $consulta = "SELECT * FROM lista_email";
    $resultado = mysqli_query($dbc,$consulta);

    while ($row = mysqli_fetch_array($resultado)){
        echo "<hr>";
        echo "Asunto: ".$asunto;
        echo "<br />";
        echo "Mensaje: ".$mensaje;
        echo "<br />";
        echo "Para: ".$row["Nombre"].", ". $row["Apellidos"].", ". $row["Email"]."<br />";
        echo "<hr>";
        echo "<br />";
        echo "<br />";
        }
}
mysqli_close($dbc);
?>