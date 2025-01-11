<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alojamientos Naturales</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body class="home">
    <?php include '../src/components/menu.php'; ?>

    <section class="info">
        <section class="homeleft">
            <section class="homeleftSection1">
                <p class="tittleHomeLeft">Alojamientos Naturales</p>
                <p class="subTittleLeftHome1">www.alojamientosnaturales.com</p>
            </section>
            <section class="homeleftSection2">
                <p class="bubTittleLeftHome2">¡Nosotros buscamos tus lugares de ensueño conectandote con la naturaleza!
                </p>
            </section>
        </section>
        <section class="homeright">
            <section class="homerightUp">
                <p class="tittleRightHome">Adentrate en la frescura de la naturaleza</p>
                <p class="subTittleRightHome">¿Sueñas con escapadas inolvidables? ¡Crea tu lista de deseos perfecta!
                    Guarda tus alojamientos favoritos, inspírate con las recomendaciones de otros viajeros y planea tu
                    próxima aventura. Tus escapadas perfectas, siempre a mano.</p>
                <div class="buttons">
                    <button onclick="location.href='../src/views/login.php'">Iniciar Sesión</button>
                    <button onclick="location.href='../src/views/register.php'">Crear Cuenta</button>
                </div>
            </section>
            <section class="homerightDown">
                <div class="card card-hoteles">
                    <p>Hoteles</p>
                </div>
                <div class="card card-casas">
                    <p>Casas</p>
                </div>
                <div class="card card-cabanas">
                    <p>Cabañas</p>
                </div>
            </section>
        </section>
    </section>

</body>

</html>