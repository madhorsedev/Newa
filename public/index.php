<?php

    //Header
    require_once("./../templates/header.php");

    //Navbar
    require_once("./../templates/nav/navbar.php");

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

<?php

    //Footer
    require_once("./../templates/footer.php");

?>