<?php
$dbc = mysqli_connect('localhost','root','root','elvisdb')
    or die ('No se ha podido conectar con la base de datos.');

$email = $_POST['email'];

$borrado="SELECT email FROM lista_email WHERE email = '$email' ";

if ($res=mysqli_query($dbc,$borrado))
  {
  $rowcount=mysqli_num_rows($res);
    if ($rowcount >= 1){
        
        $miConsulta = "DELETE FROM lista_email WHERE email = '$email' ";

        $resultSet = mysqli_query($dbc,$miConsulta) or die ('Error al eliminar la fila');
    
        echo "Consulta generada:"."<br />";
        echo $miConsulta."<br />";
        echo "<br />";
        
    }else{
        echo "El usuario no existe.";
        echo "<br />";
        echo "<br />";
    }
  mysqli_free_result($res);
  }

mysqli_close($dbc);
?>