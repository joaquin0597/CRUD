<?php 
    /**Recepción de datos enviados en el formulario */
    $nombre =(isset($_POST['nombre']))?$_POST['nombre']:"";
    $apaterno =(isset($_POST['apaterno']))?$_POST['apaterno']:"";
    $amaterno =(isset($_POST['amaterno']))?$_POST['amaterno']:"";
    $curp =(isset($_POST['curp']))?$_POST['curp']:"";
    $rfc =(isset($_POST['rfc']))?$_POST['rfc']:"";
    $fe_nacimiento =(isset($_POST['fe_nacimiento']))?$_POST['fe_nacimiento']:"";
    $email =(isset($_POST['email']))?$_POST['email']:"";
    $accion = (isset($_POST['accion']))?$_POST['accion']:"";
    $error = array();

    $api = isset($_GET['accion']) ? $_GET['accion'] : '';

    // Inicializar respuesta
    $respuesta = array();
    /**Acciones de botones en el modal*/
    $accionAgregar ="";
    $accionEditar = $accionEliminar=$accionCancelar="disabled";
    $mostrarModal=false;

    /**Incluimos el archivo de la conexión a la BD */
    include ('conexion/conexion.php');
    $con = conexionBD();
    
    /**Aquí se realizan las funciones del CRUD mediante un switch dependiendo el botón que seleccionen */
    switch($accion){
        case "btnAgregar":
            $query = mysqli_query($con,"INSERT INTO usuarios (ID,Nombre, Paterno, Materno, CURP, RFC, Fe_nacimiento, Email) VALUES (NULL,'".$nombre."', '".$apaterno."', '".$amaterno."', '".$curp."', '".$rfc."', '".$fe_nacimiento."', '".$email."')");
            header('Location: index.php');   
        break;
        case "btnEditar":
            $editar = mysqli_query($con, "UPDATE usuarios SET Nombre='$nombre',Paterno='$apaterno',Materno='$amaterno',CURP='$curp',RFC='$rfc',Fe_nacimiento='$fe_nacimiento',Email='$email' WHERE RFC='$rfc'");

            header('Location: index.php');
        break;
        case "btnEliminar":
            $eliminar = mysqli_query($con, "DELETE FROM usuarios WHERE RFC='$rfc'");
            header('Location: index.php');
        break;
        case "btnCancelar":
            header('Location: index.php');
        break;
        case "Info":
            $accionAgregar ="disabled";
            $accionEditar = $accionEliminar=$accionCancelar="";
            $mostrarModal=true;
        break;
        case "listar":
            $users = array();
            $resultado = mysqli_query($con,"SELECT * FROM usuarios");
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                $users[] = $fila;
                }      
            $respuesta['status'] = 'success';
            $respuesta['data'] = $users;
            } else {
            $respuesta['status'] = 'error';
            $respuesta['message'] = 'No hay usuarios disponibles.';
            }
        break;
    }
    $usuarios = mysqli_query($con, "SELECT * FROM usuarios");

    //echo json_encode($respuesta);
?>