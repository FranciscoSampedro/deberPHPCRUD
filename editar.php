<?php
    if(isset($_GET['editar'])){
     $editar_codProducto = $_GET['editar'];
     $consulta = "SELECT * FROM PRODUCTOS WHERE CODPRODUCT='$editar_codProducto'";
     $ejecutar=mysqli_query($conex,$consulta);
     $fila = mysqli_fetch_array($ejecutar);

     $nombreProducto=$fila['nombreProducto'];
     $fechaCompra=$fila['fechacompra'];
     $precio=$fila['precio'];
    }
?>
<br />
<form method="post" action="">
    <label>Nombre Producto:</label>
    <input type="text" name="nombreProducto" value="<?php echo $nombreProducto;?>"><br />
    <label>Fecha de Compra:</label>
    <input type="date" name="fechacompra" value="<?php echo $fechaCompra;?>"><br />
    <label>precio:</label>
    <input type="number" name="precio" value="<?php echo $precio;?>"><br />
    <input type="submit" name="actualizar" value="ACTUALIZAR DATOS">
</form>
<?php
    if(isset($_POST['actualizar'])){
        $actualizar_nombreProducto = $_POST['nombreProducto'];
        $actualizar_fechaCompra = $_POST['fechacompra'];
        $actualizar_precio = $_POST['precio'];
        $actualizar = "UPDATE PRODUCTOS SET NOMBREPRODUCTO='$actualizar_nombreProducto',FECHACOMPRA='$actualizar_fechaCompra',PRECIO=$actualizar_precio WHERE CODPRODUCT=$editar_codProducto";
        $ejecutar=mysqli_query($conex,$actualizar);
        if($ejecutar){
            echo "<script>alert('Datos Actualizados!')</script>";
            echo "<script> window.open('crud.php','_self')</script>";
        }
    }
?>