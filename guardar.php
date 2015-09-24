<?php 
$dbc = mysqli_connect('localhost','root','root','elvisdb')
    or die ('No se ha podido conectar a la base de datos');

    // Asignación de valores.
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $email = $_POST['email'];
  
// Se comprueba que el usuario (su correo) es nuevo y lo inscribe, en caso contrario le advierte de ello.
$login="SELECT email FROM lista_email WHERE email = '$email' ";

if ($res=mysqli_query($dbc,$login))
  {
  $rowcount=mysqli_num_rows($res);
    if ($rowcount < 1){
        
        $miConsulta = "INSERT INTO lista_email (nombre, apellidos, email)
               VALUES ('$nombre','$apellidos','$email')";

        $resultSet = mysqli_query($dbc,$miConsulta) or die ('Error al insertar las filas');
    
        echo "Consulta generada:"."<br />";
        echo $miConsulta."<br />";
        echo "<br />";
        
    }else{
        echo "Correo ya registrado, compruebe los datos introducidos.";
        echo "<br />";
        echo "<br />";
    }
  mysqli_free_result($res);
  }


$sql="SELECT email FROM lista_email";

if ($result=mysqli_query($dbc,$sql))
  {
  // Devuelve el número de filas
  $rowcount=mysqli_num_rows($result);
    // La variable %d contiene el número de filas
  printf("Se han registrado %d participantes.\n",$rowcount);
  // Libera el resultado
  mysqli_free_result($result);
  }    


$msg='Buenas, me llamo '.$nombre;
$msg.=' '.$apellidos;
$msg.=', deseo recibir el aviso de mi compra en "'.$email.'".';
    
echo "<br />";
echo "<br />";

echo $msg;

echo "<br />";
echo "<br />";

mysqli_close($dbc);
?>