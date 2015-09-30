<?php
$showform = true;
//258 poner el showform
    $dbc = mysqli_connect('localhost','root','root','elvisdb')
    or die ('No se ha podido conectar con la base de datos.');

        $consulta = "SELECT `email`,`codigo` FROM lista_email";
        $resultado = mysqli_query($dbc,$consulta);
    
        if ( isset($_POST['eliminar']) ) {
        echo "<h1>Dar de baja a un cliente.</h1>";
            
        foreach($_POST['id'] as $iden){
            echo "<p>$iden</p>";
            $consulta = "DELETE FROM lista_email WHERE codigo = $iden";
            $resultado = mysqli_query($dbc,$consulta);
            echo " <a href='formEliminar.php'>Volver</a> ";
        }
            $showform = false;
    }
     
    
?>


<html>
<head><title>Eliminar correo</title></head>
<body>
    <?php if ($showform){ ?>
    <h1>Dar de baja a un cliente.</h1>
    
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    
    <?php
        while ($row = mysqli_fetch_array($resultado)){
            echo '<label>'.$row['email'].'</label><input type="checkbox" name="id[]" value="'.$row['codigo'].'"> <br>';
        }
    ?>
    
    <input type="submit" name="eliminar" value="Eliminar">
    </form>    
</body>
</html>
<?php
                        }
?>