<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario CSS</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login1.css">

</head>

<body>

    <div class="contenedor-formulario contenedor">
        <div class="imagen-formulario">
        </div>

        <form action="./procesos/proceso_login.php" method="post" class="formulario">
            <div class="texto-formulario">
                <article>
                <img src="./img/logo.png" alt="logo" class="logo">
                </article>
                <p>Inicia sesión con tu cuenta</p>
            </div>


            <div class="user-input-box select">
            <label for="username">Usuario:</label>

            <select id="username" name="username" required>
            <option value="">Seleccionar Usuario</option>
            <?php
            // Conexión local
            include("./procesos/combo_cargo.php");
            ?>
             </select>

            </div>

            <div class="user-input-box">
                <label for="password">Contraseña</label>
                <input placeholder="Ingresa tu contraseña" type="password" id="contraseña" name="password" required>
            </div>


            <div class="password-olvidada">
                <!--<a href="#">¿Olvidaste tu contraseña?</a>-->
            </div>
            <div class="input">
                <input type="submit" value="Login">
            </div>
        </form>
    </div>

</body>

</html>