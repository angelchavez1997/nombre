<section>
    <?php 
   if (!isset($_POST["idM"])){
       
   
    ?>
    <form action ="" method="post">	
    Nombre: <input type="text" name="nombre"><br>
    Razon Social: <input type="text" name="rs"><br>
    Correo: <input type="email" name="correo"><br>
    Direccion: <input type="text" name="dir"><br>
    Telefono: <input type="text" name="tel"><br>
    <div>
    <input type="submit" name="altaPro" value="Ingresar">	
    </div>
    
    </form>
	<?php 
	require_once("proveedores.php");
	$obj = new Proveedores();
	if (isset($_POST["idE"])) {
       $id =$_POST["idE"];
       $obj->baja($id);
	 echo "<script>
    alert('Proveedor Eliminado');
    windows.location='home.php?s=prov';
    </script>";
    }
	if(isset($_POST["altaPro"])){
    $n = $_POST["nombre"];
    $rs = $_POST["rs"];
    $c = $_POST["correo"];
    $d = $_POST["dir"];
    $t = $_POST["tel"];
    $obj->alta($n,$rs,$c,$d,$t);
    echo "<script>
    alert('Proveedor Registrado');
    windows.location='home.php?s=prov';
    </script>";
    }
	$resultado = $obj->consulta();
     
 ?>

<table>
	<tr>
		<th>Nombre</th>
		<th>Razon Social</th>
		<th>Correo</th>
	    <th>Direccion</th>	
	    <th>Telefono</th>
	</tr>
	<?php 
		while ($fila =  $resultado->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$fila["nombre"]."</td>";
			echo "<td>".$fila["razonsocial"]."</td>";
			echo "<td>".$fila["correo"]."</td>";
			echo "<td>".$fila["diireccion"]."</td>";
			echo "<td>".$fila["telefono"]."</td>";
			
?>
<td id="celdaEliminar">
    <form action="" method="post" onsubmit="return confirmar()">	
    	<input type="hidden" name="idE" value="<?php echo $fila['id']; ?>">
    	<input type="image" src="img/eliminar.png">

    </form>

</td>

<td id="celdaModificar">
    <form action="" method="post" onsubmit="return confirmarM()">    
        <input type="hidden" name="idM" value="<?php echo $fila['id']; ?>">
        <input type="image" src="img/modificar.png">

    </form>

</td>

<?php
			echo "</tr>";
		}
	 ?>

</table>
</section>
<script type="text/javascript">
	function confirmar(){
	var algo = confirm("Esta seguro de eliminar?");
	return algo;
	}
</script>