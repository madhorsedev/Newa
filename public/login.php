<?php

    //Header
    require_once("./../templates/header.php");

    //Navbar
    require_once("./../templates/nav/navbar-brand.php");

?>

    <div class="container-fluid primary-gradient session-control-bg">
        <img src="./../assets/img/mac-mockup.png" class="session-control-img"/>
        <div class="container">
            <div class="row session-control-row">
                <div class="col-sm">
                    <div class="card session-control-card">
                        <h3 class="primary-color session-control-card-title">Iniciar Sesión</h3>
                        <form>
                            <div class="form-group">
                                <label for="email" hidden>Correo Electrónico</label>
                                <input type="email" class="form-control session-control-card-input primary-color" id="email" aria-describedby="emailHelp" placeholder="Correo Electrónico">
                            </div>
                            <div class="form-group">
                                <label for="password" hidden>Contraseña</label>
                                <input type="password" class="form-control session-control-card-input primary-color" id="password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary primary-bg session-control-card-btn">Entrar</button>
                            <div class="form-group form-check session-control-card-check">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label" for="exampleCheck1"><small class="form-text text-muted">Mantén mi sesión iniciada</small></label>
                            </div>
                        </form>
                        <a href="/public/sigin.php" class="card-link primary-color center-text">¿Aún no tienes cuenta?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

    //Footer
    require_once("./../templates/footer.php");

?>