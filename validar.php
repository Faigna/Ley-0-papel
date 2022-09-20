<?php
include('db.php');
$email=$_POST['email'];
$password=$_POST['password'];
session_start();



$conexion=new mysqli("localhost","root","","bulnes");

if(mysqli_connect_errno()){
  print(mysqli_connect_error());
}

$consulta="SELECT * FROM usuarios where email='$email' and password='$password'";

$resultado=$conexion->query($consulta);

//var_dump($resultado)

$filas=$conexion->affected_rows;


if($filas>0){
  
  while ($row = $resultado-> fetch_object()){
    //$_SESSION['usuario'] = $row;
  }

    header("location:home.php");

}else{
    ?>
    <?php
    include("index.html");

  ?>
  <h1 class="bad">ERROR DE AUTENTIFICACION</h1>
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
