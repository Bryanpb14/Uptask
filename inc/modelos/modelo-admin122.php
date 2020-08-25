<?php 
    
    $accion = $_POST['accion'];
    $password = $_POST['password'];
    $usuario = $_POST['usuario'];

    if($accion === 'crear'){
        //codigo para crear los administradores
        
        //hashear passwords
        $opciones = array(
            'cost' => 12
        );

        $hash_password = password_hash($password, PASSWORD_BCRYPT, $opciones);
        
        var_dump($hash_password);
        
        
        $respuesta = array(
            'pass' => $hash_password
        );
        echo json_encode($respuesta);
    }
/*
        try{
            //realizar la consulta a la base de datos
            $stmt = $conn->prepare("INSERT INTO usuarios (usuario, password) VALUES (?, ?)");
            $stmt->bind->param('ss', $usuario , $hash_password);
            $stmt->execute();
            if($stmt->affected_rows > 0){
                $respuesta = array(
                    'respuesta' =>'correcto',
                    'id_insertado' => $stmt->insert_id,
                    'tipo' => $accion
                );
            }else{
                $respuesta = array (
                    'respuesta' => 'error'
                );
            }
            $stmt->close();
            $conn->close();
        }catch(Exception $e){
            // en caso de un error, tomar la exepcion
            $respuesta = array(
                'pass' => $e->getMessage()
            );
        }
        
        echo json_encode($respuesta);
    
    if($accion === 'login'){
        //escribir codigo que logueen los administradores

        //importar la conexion
        include '../funciones/conexion.php'

        try{
            // seleccionar e administrador de la base de datos
            $stmt = $conn->prepare("SELECT usuario, id, password FROM usuarios WHERE usuario =?");
            $stmt->bind_param('s', $usuario);
            $stmt->execute();
            //loguear el usuario

            $stmt->bind_result($nombre_usuario, $id_usuario, $pass_usuario);
            
            $stmt->close();
            $conn->close();
        }catch(Exception $e){
            // en caso de un error, tomar la exepcion
            $respuesta = array(
                'pass' => $e->getMessage()
            );
        }
        echo json_encode($respuesta);
    }*/
?>