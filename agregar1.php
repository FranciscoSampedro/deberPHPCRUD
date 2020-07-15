<?php
if(isset($_POST['insert1'])){
    $nombreProducto = $_POST['nombreProducto'];
    $fechaCompra = $_POST['fechaCompra'];
    $precio = $_POST['precio'];
    $insertar = "INSERT INTO Productos(nombreProducto,fechacompra,precio) values ('$nombreProducto','$fechaCompra',$precio)";
    $ejecutar = mysqli_query($conex,$insertar);
    if($ejecutar){
        echo "<script>alert('Datos Ingresados!')</script>";
        echo "<script> window.open('crud.php','_self')</script>";
    }else {
        echo "<script>alert('Datos no ingresados!')</script>";
        echo "<script> window.open('crud.php','_self')</script>";}
    
}


?>
<form  method = "POST" action="">
        <label>Nombre Producto:</label>
        <input type="text" name="nombreProducto" placeholder="Escriba su nombre"><br/>
        <label>Fecha de Compra:</label>
        <input type="date" name="fechaCompra" placeholder="Escriba la fecha de compra"><br/>
        <label>precio:</label>
        <input type="number" name="precio" placeholder="Ingrese el precio del prodcuto"><br/>
        <input type="submit" name="insert1" value="Insertar Datos">
</form>
    
<br/>