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
            echo "Para: ".$row["Nombre"].", ". $row["Apellidos"].", ". $row["email"]."<br />";
            echo "<hr>";
            echo "<br />";
            echo "<br />";
        }
            //correo enviado
            $showform = false;
            $errormsg = 'Correos enviados sin problema';
            echo " <a href='formMail.php'>Volver</a> ";
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
        <!--<1>Envío de correos</h1>-->
        
<?php 
    if ($showform) {
?>
        <form class="contact_form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="contact_form">
            <ul>
                <li>
                    <label for="asunto" >Asunto: </label><br>
                </li>
                <li>
                    <input type="text" name="asunto" class="asunto" value="<?php if(isset($_POST['asunto'])){echo $_POST['asunto'];}; ?>"/>
                </li>
                <br>
                <li>
                    <label for="mensaje">Mensaje: </label><br>
                </li>
                <li>
                    <textarea name="mensaje" cols="50" rows="5"><?php if(isset($_POST['mensaje'])){echo $_POST['mensaje'];}; ?></textarea>
                </li>
                <li>
                    <button class="enviar" type="submit" name="enviar">Enviar correos</button>
                </li>
            </ul>
        </form>
    </div>
</body>
</html>
<?php
    }
?>