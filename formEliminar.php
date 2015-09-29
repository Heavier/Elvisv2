<html>
<head><title>Eliminar correo</title></head>
<body>
    <h1>Dar de baja a un cliente.</h1>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">


<?php
//258
    $dbc = mysqli_connect('localhost','root','root','elvisdb')
    or die ('No se ha podido conectar con la base de datos.');

        $email = $_POST['email'];

        $consulta = "SELECT email FROM lista_email";
        $resultado = mysqli_query($dbc,$consulta);

        while ($row = mysqli_fetch_array($resultado)){
            echo '<input type="checkbox" name="borrar" value="'.$row['email'].'"> <br>';
        }
    mysql_close($dbc);
?>
    <input type="submit" name="eliminar" value="Eliminar">
    </form>    
</body>
</html>