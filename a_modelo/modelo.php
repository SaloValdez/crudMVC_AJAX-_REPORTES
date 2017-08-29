<?php
  class EnlacesPaginas{
    public function enlacesPaginasModel($enlacesModel){
      if ($enlacesModel =='registro'||
          $enlacesModel =='ingreso'||
          $enlacesModel =='usuario'||
          $enlacesModel =='editar'|
          $enlacesModel =='salir') {
            $module = "c_vista/secciones/".$enlacesModel.".php";
      }else if($enlacesModel == "index"){
        $module = "c_vista/secciones/registro.php";
      }else if($enlacesModel == "ok"){
        $module = "c_vista/secciones/registro.php";
      }else if($enlacesModel == "fallo"){
        $module = "c_vista/secciones/ingreso.php";
      }else if($enlaces == "fallo3intentos"){

			$module =  "c_vista/secciones/ingreso.php";

		  }else if($enlacesModel == "cambio"){
        $module = "c_vista/secciones/usuario.php";
      }else{
        $module = "c_vista/secciones/registro.php";
      }
      return $module;
    }
  }


 ?>
