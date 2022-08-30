

<?php

  if(isset($_GET["pag"]) && !empty($_GET["pag"])){//isset valida que la variable exista

      $op=$_GET["pag"];
      if($op==1){
        menu($op);
      }
      else if($op>1){
          if(
            (!isset($_SESSION["user"]) || !isset($_SESSION["pass"]))
          ){
              header('location:?');
          }
          else{
            menu($op);
          }
        }
  }
  else{
    include('vistas/vistSesion.php'); //include nos incluye el script colocando la ruta
  }


 ?>
