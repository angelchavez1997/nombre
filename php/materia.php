<?php 

require_once("conexion.php");
		class Materia_Compra extends Conexion{

			public function alta($id_Materia,$Cantidad){

				$this->sentencia ="INSERT INTO proveedores VALUES (NULL,'$id_Materia','$Cantidad')";
				$this->ejecutar_sentencia();
				echo $this->sentencia;


    }
}

 ?>