<?php

    $showform = true;
    if ( isset($_POST['enviar']) ) {
        if ( !empty($_POST['asunto']) && !empty($_POST['mensaje']) ) {
            $error=0;
            // ENVIAR CORREO
            
            $dbc = mysqli_connect('localhost','root','root','elvisdb')
    or die ('No se ha podido conectar con la base de datos.');

        $asunto = $_POST['asunto'];
        $mensaje = $_POST['mensaje'];

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
            //correo enviado
            $showform = false;
            echo " <a href='formMail.html'>Volver</a> ";
        } else {
            if ( empty($_POST['asunto']) && empty($_POST['mensaje'])  ) {
                $error = 1;
                $errormsg = 'Asunto y mensaje del correo vacíos.';
            } elseif ( empty($_POST['asunto']) ) {
                $errormsg = 'Asunto del correo vacío.';
                $error = 2;
            } else {
                $errormsg = 'Mensaje del correo vacío.';
                $error = 3;
            }
        }
        
    }
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Formulario de contacto</title>
    <link rel="stylesheet" media="screen" href="estilo.css" >
    </head>
<body>
    <div class="contenedor">
    <div class="error <?php echo 'tperror'.$error; ?>">
        <?php
            if (isset($error)){echo $errormsg; }; ?>
    </div>
        <h1>Envío de correos</h1>
        
<?php 
    if ($showform) {
?>
        <form action="<?php echo $_POST['PHP_SELF']; ?>" method="post">
            <label for="asunto" >Asunto: </label><br>
            <input type="text" name="asunto" class="asunto" value="<?php if(isset($_POST['asunto'])){echo $_POST['asunto'];}; ?>"/>
            
            <label for="mensaje">Mensaje: </label><br>
            <textarea name="mensaje" cols="50" rows="5"><?php if(isset($_POST['mensaje'])){echo $_POST['mensaje'];}; ?></textarea>
            
            <button class="enviar" type="submit" name="enviar">Enviar correos</button>
        </form>
    </div>
</body>
</html>
<?php
    }
?>