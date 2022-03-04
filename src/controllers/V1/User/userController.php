<?php
include_once '../../../../config/connection.php';
$objeto = new Conexion();
$connection = $objeto->Conectar();

$_POST = json_decode(file_get_contents("php://input"), true);

function permisos() {  
  if (isset($_SERVER['HTTP_ORIGIN'])){
      header("Access-Control-Allow-Origin: *");
      header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
      header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
      header('Access-Control-Allow-Credentials: true');      
  }  
  if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))          
        header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
    if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
        header("Access-Control-Allow-Headers: Origin, Authorization, X-Requested-With, Content-Type, Accept");
    exit(0);
  }
}
permisos();


$method = (isset($_POST['method'])) ? $_POST['method'] : '';
$id = (isset($_POST['id'])) ? $_POST['id'] : '';
$email = (isset($_POST['email'])) ? $_POST['email'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
$isActive = (isset($_POST['isActive'])) ? $_POST['isActive'] : '';

switch($method){
	case 1:
        $search = "SELECT * FROM users WHERE email='$email' AND isActive='$isActive'";
        $result = $connection->prepare($search);
        $result->execute();
        $data=$result->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 2:
       /*  $consulta = "INSERT INTO articulos (descripcion, precio, stock) VALUES('$descripcion', '$precio', '$stock') ";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); */                
        break;
    case 3:
        /* $consulta = "UPDATE articulos SET descripcion='$descripcion', precio='$precio', stock='$stock' WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC); */
        break;        
    case 4:
        /* $consulta = "DELETE FROM articulos WHERE id='$id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); */                           
        break;         
    
}
print json_encode($data, JSON_UNESCAPED_UNICODE);
$conexion = NULL;