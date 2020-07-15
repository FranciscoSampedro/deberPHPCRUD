<!DOCTYPE html>
<?php
    $conex = mysqli_connect("127.0.0.1","root","12345678","testphp") or die("Error");
       
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD PHP y MYSQL</title>
    <!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="./css/util.css">
    <link rel="stylesheet" type="text/css" href="./css/main.css">
    <link href="./css/all.css" rel="stylesheet"> <!--load all styles -->
    <script src="https://kit.fontawesome.com/a3c8e6637e.js" crossorigin="anonymous"></script>
</head>
<body>

    

    
    <br/>
    <div class="cabezera">
    <a class="cab" href="crud.php?insert1">Agregar<i class="far fa-plus-square" ></i></a>
    </div>
    <div class="limiter">
        <div class="container-table100">
            <div class="wrap-table100">
                <div class="table100 ver1 m-b-110">
                    <div class="table100-head">
                    <table>
                        <thead>
                            <tr class="row100 head">
                                <th class="cell100 column1">Código</th>
                                <th class="cell100 column2">Nombre Producto</th>
                                <th class="cell100 column3">Fecha Compra</th>
                                <th class="cell100 column4">Precio</th>
                                <th class="cell100 column5">Editar</th>
                                <th class="cell100 column6">Borrar</th>
                            </tr>
                        </thead>
                    </table>
                    </div>
                    <?php
                    $consulta = "SELECT * FROM productos";
                    $ejecutar = mysqli_query($conex,$consulta);
                    $i=0;
                    while($fila = mysqli_fetch_array($ejecutar)){
                        $codProduct=$fila['codProduct'];
                        $nombreProducto=$fila['nombreProducto'];
                        $fechaCompra=$fila['fechacompra'];
                        $precio=$fila['precio'];
                        $i++;

                    ?>
                    <div class="table100-body js-pscroll">
                        <table>
                        <tbody>
                            <tr class="row100 body">
                                <td class="cell100 column1"><?php echo $codProduct;?> </td>
                                <td class="cell100 column2"><?php echo $nombreProducto;?></td>
                                <td class="cell100 column3"><?php echo $fechaCompra;?></td>
                                <td class="cell100 column4"><?php echo $precio;?></td>
                                <td class="cell100 column5"><a href="crud.php?editar=<?php echo $codProduct; ?>"><i class="fas fa-edit"></i></a></td>
                                <td class="cell100 column6"><a href="crud.php?borrar=<?php echo $codProduct; ?>"><i class="fas fa-minus-circle"></i></a></td>
                            </tr>
                        </tbody>
                        <?php  } ?>
                        </table>
                    </div>
                </div>   
            </div>    
        </div>
    </div>
    
    <div class="formularios" style="display: run-in">
    <?php
        if(isset($_GET['insert1'])){
            include("agregar1.php");
        }    
    ?>
    <?php
        if(isset($_GET['editar'])){
            include("editar.php");
        }    
    ?>
    </div>
    <?php
    if(isset($_GET['borrar'])){
        $borrar_codProduct = $_GET['borrar'];
        $borrar = "DELETE FROM PRODUCTOS WHERE CODPRODUCT= $borrar_codProduct";
        $ejecutar=mysqli_query($conex,$borrar);
        if($ejecutar){
            echo "<script>alert('El Producto ha sido Eliminado!')</script>";
            echo "<script> window.open('crud.php','_self')</script>";
        }
    }
    ?>
</body>
</html>