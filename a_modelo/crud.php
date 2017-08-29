<?php
require_once "conexion.php";
  class Datos extends Conexion{
    //REGISTRO DE USUSARIOS
      public function registroUsuarioModel($datosModel,$tabla){
        $stmt= Conexion::conectar()->prepare("INSERT INTO $tabla (usuario,password,email) VALUES(:usuario,:password,:email)");

        $stmt ->bindParam(":usuario",$datosModel['usuario'],PDO::PARAM_STR);
        $stmt ->bindParam(":password",$datosModel['password'],PDO::PARAM_STR);
        $stmt ->bindParam(":email",$datosModel['email'],PDO::PARAM_STR);

            if ($stmt ->execute()){
              return "succes";
            }else{
              return "error";
            }
            $stmt ->close();
      }

      //INGRESO USUARIOS
      public function ingresoUsuarioModel($datosModel,$tabla){
          $stmt= Conexion::conectar()->prepare("SELECT  usuario,password  FROM $tabla  WHERE usuario =:usuario ");
          $stmt ->bindParam(":usuario",$datosModel['usuario'],PDO::PARAM_STR);
          $stmt ->execute();
          return $stmt ->fetch(); //FETCH() =Obtine una fila de un c onjunto de  resultadios asociados al objeto PDOSatatment.
      $stmt ->close();
      }


      #INTENTOS USUARIO
	#-------------------------------------

	public function intentosUsuarioModel($datosModel, $tabla){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET intentos = :intentos WHERE usuario = :usuario");
		$stmt->bindParam(":intentos", $datosModel["actualizarIntentos"], PDO::PARAM_INT);
		$stmt->bindParam(":usuario", $datosModel["usuarioActual"], PDO::PARAM_STR);

		if($stmt->execute()){

			return "success";

		}

		else{

			return "error";

		}

		$stmt->close();
	}




       //VISTA DE USUARIOS
       public function vistaUsuarioModel($tabla){
           $stmt= Conexion::conectar()->prepare("SELECT  id,usuario,password,email  FROM $tabla ");
           $stmt ->execute();
           //FETCH() =Obtine una fila de un c onjunto de  resultadios asociados al objeto PDOSatatment.
           //FETCHALL() =Obtine una TODAS las filas de un c onjunto de  resultadios asociados al objeto PDOSatatment.
           return $stmt ->fetchAll();
          $stmt ->close();
       }

       //EDITAR DE USUARIOS
       public function editarUsuarioModel($datosModel,$tabla){
           $stmt= Conexion::conectar()->prepare("SELECT  id,usuario,password,email  FROM $tabla WHERE id = :id");
           $stmt ->bindParam(":id",$datosModel,PDO::PARAM_INT);
           $stmt ->execute();
           //FETCH() =Obtine una fila de un c onjunto de  resultadios asociados al objeto PDOSatatment.
           //FETCHALL() =Obtine una TODAS las filas de un c onjunto de  resultadios asociados al objeto PDOSatatment.
           return $stmt ->fetch();
          $stmt ->close();
       }
       //ACTUALIZAR USUARIOS
       public function actualizarUsuarioModel($datosModel,$tabla){
           $stmt= Conexion::conectar()->prepare("UPDATE  $tabla SET usuario=:usuario,password=:password,email=:email WHERE id = :id");
           $stmt ->bindParam(":usuario",$datosModel['usuario'],PDO::PARAM_STR);
           $stmt ->bindParam(":password",$datosModel['password'],PDO::PARAM_STR);
           $stmt ->bindParam(":email",$datosModel['email'],PDO::PARAM_STR);
           $stmt ->bindParam(":id",$datosModel['id'],PDO::PARAM_INT);
           $stmt ->execute();


           if ($stmt ->execute()){
             return "succes";
           }else{
             return "error";
           }
          $stmt ->close();
       }

       #BORRAR USUARIO

       public function borrarUsuarioModel($datosModel,$tabla){
         $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
         $stmt ->bindParam(":id",$datosModel,PDO::PARAM_INT);
         if ($stmt ->execute()){
           return "succes";
         }else{
           return "error";
         }
         $stmt ->close();

       }

       //validar datos usuario existente AJAX
       public function validarUsuarioModel($datosModel,$tabla){
          $stmt = Conexion::conectar()->prepare("SELECT usuario FROM $tabla WHERE usuario = :usuario");
          $stmt ->bindParam(":usuario",$datosModel,PDO::PARAM_STR);
          $stmt ->execute();
          return $stmt->fetch();
          $stmt ->close();
       }


        //validar datos email existente AJAX
        public function validarEmailModel($datosModel,$tabla){
           $stmt = Conexion::conectar()->prepare("SELECT email FROM $tabla WHERE email = :email");
           $stmt ->bindParam(":email",$datosModel,PDO::PARAM_STR);
           $stmt ->execute();
           return $stmt->fetch();
           $stmt ->close();
        }

  }

 ?>
