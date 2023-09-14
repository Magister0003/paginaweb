<?php
      // Llamar a el archivo conexion.php para hacer la conexión a la base de datos
      include("./procesos/conexion.php");

     // Ejecutar una consulta para obtener los datos de los cargos
     $sql = "SELECT * FROM tbl_users";
     $result = mysqli_query($conn, $sql);

     // Recorrer los resultados de la consulta y mostrarlos en el combo
     while ($fila = mysqli_fetch_array($result)) {
     //echo '<option value="' . $fila['nom_cargo'] . '">' . $fila['id_cargo'] . '</option>';
     echo '<option value="' . $fila['username'] . '">' . $fila['username'] . '</option>';
     
     
     }

     // Cerrar conexión
     mysqli_close($conn);
    ?>