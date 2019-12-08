<?php

    session_start();

    //Header
    require_once("./../templates/header.php");

    //Navbar
    require_once("./../templates/nav/navbar.php");

    if($_SESSION['user']) header("Location: http://newa.test/public/desktop.php");

?>

    <div class="container-fluid primary-gradient hero-text-shape">
        <div class="container session-control-box">
            <div class="row hero-text-row">
                <div class="col-sm">
                    <img src="./../assets/img/mac-mockup.png" class="hero-text-img"/>
                </div>
                <div class="col-sm hero-text-info">
                    <h2 class="hero-text-h2">Todas tus noticias.</h2>
                    <h3 class="hero-text-h3">Un solo lugar.</h3>
                    <a href="/public/sigin.php" class="hero-text-btn">PRUÉBALO YA</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container main-content">
        <div class="row justify-content-center index-row">
            <h2 class="primary-color">¿CÓMO FUNCIONA NEWA?</h2>
        </div>
        <div class="row index-row">
            <div class="col-4">
                <img src="./../assets/img/login.png" class="index-img"/>
                <p><h5 class="primary-color center-text">INICIAR SESIÓN</h5></p>
                <p>
                    Inicia sesión o crea tu cuenta para empezar a usar <strong>NEWA</strong>
                </p>
            </div>
            <div class="col-4">
                <img src="./../assets/img/add-rss.png" class="index-img"/>
                <p><h5 class="primary-color center-text">AÑADE TUS RSS</h5></p>
                <p>
                    Copia el enlace de tus <strong>RSS</strong> favoritas.
                </p>
            </div>
            <div class="col-4">
                <img src="./../assets/img/rss.png" class="index-img"/>
                <p><h5 class="primary-color center-text">COMIENZA A DESCUBRIR</h5></p>
                <p>
                    Comienza a descubrir todo lo que tienen que ofrecerte las <strong>RSS</strong>
                </p>
            </div>
        </div>
        <div class="row justify-content-center index-row">
            <h2 class="primary-color">¿QUIÉNES SOMOS?</h2>
        </div>
        <div class="row index-row">
            <div class="col-4">
                <p class="center-text primary-color"><i class="far fa-user index-icon"></i></p>
                <p><h5 class="primary-color center-text">JULIO M. BERNA SÁNCHEZ</h5></p>
            </div>
            <div class="col-4">
                <p class="center-text primary-color"><i class="far fa-user index-icon"></i></p>
                <p><h5 class="primary-color center-text">DANIEL IGLESIAS SÁNCHEZ</h5></p>
            </div>
            <div class="col-4">
                <p class="center-text primary-color"><i class="far fa-user index-icon"></i></p>
                <p><h5 class="primary-color center-text">MANUEL BONDAD ALONSO</h5></p>
            </div>
        </div>
    </div>

<?php

    //Footer
    require_once("./../templates/footer.php");

?>