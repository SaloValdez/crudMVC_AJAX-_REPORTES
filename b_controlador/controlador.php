<?php
  class MvcController{
    //lamando a la plantilla
    public function plantilla(){
      include "c_vista\plantilla.php";
    }

    //interaccion con el menu con las paginas
    public function enlacesPaginasController(){
      if (isset($_GET['action'])) {
        $enlacesController = $_GET['action'];
      }else {
        $enlacesController ="index";
      }

      $respuesta = EnlacesPaginas::enlacesPaginasModel($enlacesController);
      include $respuesta;
    }

    public function registroUsuarioController(){
		if(isset($_POST["usu"])){
			#preg_match = Realiza una comparación con una expresión regular
			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usu"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["contra"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["email"])){
				#crypt() devolverá el hash de un string utilizando el algoritmo estándar basado en DES de Unix o algoritmos alternativos que puedan estar disponibles en el sistema.
          // criptar = crypt($_POST["contra"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
				$datosController = array( "usuario"=>$_POST["usu"],
									      "password"=>$_POST["contra"],
									      "email"=>$_POST["email"]);
				$respuesta = Datos::registroUsuarioModel($datosController, "usuario");
				if($respuesta == "success"){
					header("location:ok");
				}
				else{
					header("location:index.php");
				}
			}
		}
	}

       #INGRESO DE USUARIOS
	#------------------------------------
	public function ingresoUsuarioController(){

		if(isset($_POST["usuIngreso"])){

			if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["usuIngreso"]) &&
			   preg_match('/^[a-zA-Z0-9]+$/', $_POST["contraIngreso"])){

          // criptar = crypt($_POST["contraIngreso"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

				$datosController = array( "usuario"=>$_POST["usuIngreso"],
									      "password"=>$_POST["contraIngreso"]);

				$respuesta = Datos::ingresoUsuarioModel($datosController, "usuario");

				$intentos = $respuesta["intentos"];
				$usuario = $_POST["usuarioIngreso"];
				$maximoIntentos = 2;

				if($intentos < $maximoIntentos){

					if($respuesta["usuario"] ==$_POST["usuIngreso"] && $respuesta["password"] == $_POST["contraIngreso"]){

						session_start();

						$_SESSION["validar"] = true;

						$intentos = 0;

						$datosController = array("usuarioActual"=>$usuario, "actualizarIntentos"=>$intentos);

						$respuestaActualizarIntentos = Datos::intentosUsuarioModel($datosController, "usuario");

						header("location:usuario");

					}

					else{

						++$intentos;

						$datosController = array("usuarioActual"=>$usuario, "actualizarIntentos"=>$intentos);

						$respuestaActualizarIntentos = Datos::intentosUsuarioModel($datosController, "usuario");

						header("location:fallo");

					}

				}

				else{

					$intentos = 0;

					$datosController = array("usuarioActual"=>$usuario, "actualizarIntentos"=>$intentos);

					$respuestaActualizarIntentos = Datos::intentosUsuarioModel($datosController, "usuario");

					header("location:fallo3intentos");
				}

			}

		}

	}



       //VISTA DE USUARIOS
       public function vistaUsuarioController(){
            $respueta = Datos::vistaUsuarioModel("usuario");
            //  var_dump($respueta);
            foreach ($respueta as $row => $item) {
              echo '
                    <tr>
                        <td>'.$item["usuario"].'</td>
                        <td>'.$item["password"].'</td>
                        <td>'.$item["email"].'</td>
                        <td><a href="index.php?action=editar&id='.$item["id"].'"><input type="button" name="" value="Editar"></a></td>
                        <td> <a href="index.php?action=usuario&idBorrar='.$item["id"].'"><input type="button" name="" value="Borrar"></a></td>
                   </tr>
              ';
            }
       }
       //EDITAR USUARIOS
       public function  editarUsuarioController(){
             $datosController = $_GET['id'];
             $respueta  =Datos::editarUsuarioModel($datosController,"usuario");
             echo '
             <form class=""  method="post">
                 <div class="in">
                 <input type="hidden" name="idEditar" value="'.$respueta["id"].'" >
                   <input type="text" name="usuEditar" value="'.$respueta["usuario"].'" >
                 </div>
                 <div class="in">
                   <input type="text" name="contraEditar" value="'.$respueta["password"].'" >
                 </div>
                 <div class="in">
                   <input type="text" name="emailEditar" value="'.$respueta["email"].'" >
                 </div>
                 <div class="in">
                   <input type="submit" value="Actualizar" >
                 </div>
             </form>
             ';
       }

       //ACTUALIZAR USUARIOS
       public function actualizarUsuarioController(){
            if(isset($_POST["usuEditar"])){

                  if (preg_match('/^[a-zA-Z0-9]+$/',$_POST["usuEditar"]) &&
                      preg_match('/^[a-zA-Z0-9]+$/',$_POST["contraEditar"]) &&
                      preg_match('/^(([A-Za-z0-9]+_+)|([A-Za-z0-9]+\-+)|([A-Za-z0-9]+\.+)|([A-Za-z0-9]+\++))*[A-Za-z0-9]+@((\w+\-+)|(\w+\.))*\w{1,63}\.[a-zA-Z]{2,6}$/',$_POST["emailEditar"])){

                       	$encriptar = crypt($_POST["contra"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
                          $datosController =array("id" =>$_POST["idEditar"],
                                         "usuario" =>$_POST["usuEditar"],
                                         "password" =>$encriptar,
                                         "email" =>$_POST["emailEditar"]);
                          $respueta  =Datos::actualizarUsuarioModel($datosController,"usuario");
                          if($respueta =="succes"){
                            header("location:index.php?action=cambio");
                          }else{
                            echo "error";
                          }
                  }
            }
       }

       //BORRAR USUARIOS
       public function borrarUsuarioController(){
             if (isset($_GET['idBorrar'])) {
                $datosController = $_GET['idBorrar'];
                $respuesta = Datos::borrarUsuarioModel($datosController,"usuario");
                if ($respuesta == "succes") {
                    header("location: index.php?action=usuario");
                }
             }
       }

        //VALIDAR USUARIO EXISTENTE AJAX

        public function validarUsuarioController($validarUsuario){
          $datosController = $validarUsuario;
          $respuesta = Datos::validarUsuarioModel($datosController,"usuario");

          #si existe al menos un  registro (cuenta caracteres) si existe caracteres?)
          if (count($respuesta["usuario"]) > 0) {
              echo 0;
          }else{
            echo 1;
          }
        }

        //VALIDAR EMAIL EXISTENTE AJAX

        public function validarEmailController($validarEmail){
          $datosController = $validarEmail;
          $respuesta = Datos::validarEmailModel($datosController,"usuario");

          #si existe al menos un  registro (cuenta caracteres) si existe caracteres?)
          if (count($respuesta["email"]) > 0) {
              echo 0;
          }else{
            echo 1;
          }
        }



  }



 ?>
