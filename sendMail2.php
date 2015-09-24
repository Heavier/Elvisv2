<?php
$dbc = mysqli_connect('localhost','root','root','elvisdb')
    or die ('No se ha podido conectar con la base de datos.');

$asunto = $_POST['asunto'];
$mensaje = $_POST['mensaje'];


if (isset($_POST['enviar'])){
    if (empty($asunto) || empty($mensaje)){
        $showForm = 0;
    }else{
        $showForm = 1;
    }
}
if (1 == 1){
    switch($showForm){
        case 0:
//-----------------------HTML----------------
echo '<html>';
echo '<head></head>';
echo '<body>';
    
echo     '<h1>Env&iacute;o de mensajes.</h1>';
echo     '<h6><font color = "red" >El asunto o el mensaje est&aacute;n vac&iacute;os.</font></h6>';
echo     '<form action="sendMail2.php" method="post">';
echo        '<p>Asunto: <input type="text" name="asunto" maxlength="30"></p>';
echo        '<p>Mensaje: </p><textarea rows="10" cols="20" name="mensaje"></textarea>';
echo        '<br />';
echo        '<input type="submit" name="enviar" value="Enviar">';
echo     '</form>';
    
echo '</body>';
echo '</html>';
//-----------------------HTML----------------
        break;
        case 1:
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
}
        
mysqli_close($dbc);
?>

