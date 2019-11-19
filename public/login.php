<?php

    //Database
    require_once("./../src/database/connection.php");
    require_once("./../src/database/client.php");

    //Header
    require_once("./../templates/header.php");

    //Navbar
    require_once("./../templates/nav/navbar-brand.php");


    //CODE


    //Variables

    $var = "";
    $pass = "";

    $err = FALSE;

    $varErr = "";
    $passErr = "";

    $db = new Client($pdo);

    //Validation

    if(isset($_POST['submit'])){

        $var = trim(htmlspecialchars($_POST['var']));
        $pass = trim(htmlspecialchars($_POST['password']));

        if(!isset($var) || empty($var)){
            $err = TRUE;
            $varErr = "Campo obligatorio.";
        }

        if(isset($pass) && !empty($pass)){
            if(strlen($pass) < 8){
                $err = TRUE;
                $passErr = "Introduzca una contraseña de al menos 8 caracteres";
            }
        }else{
            $err = TRUE;
            $passErr = "Campo obligatorio.";
        }

        if(!$err){
            $res = $db->logInUser($var, $pass);
            print_r($res);
        }

    }

?>

    <div class="container-fluid primary-gradient session-control-bg">
        <img src="./../assets/img/mac-mockup.png" class="session-control-img"/>
        <div class="container">
            <div class="row session-control-row">
                <div class="col-sm">
                    <div class="card session-control-card">
                        <h3 class="primary-color session-control-card-title">Iniciar Sesión</h3>
                        <form method="post">
                            <div class="form-group">
                                <label for="var" hidden>Nombre de Usuario / Correo Electrónico</label>
                                <input type="text" class="form-control session-control-card-input primary-color" id="var"  name="var" placeholder="Nombre de Usuario / Correo Electrónico">
                            </div>
                            <div class="form-group">
                                <label for="password" hidden>Contraseña</label>
                                <input type="password" class="form-control session-control-card-input primary-color" id="password" name="password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary primary-bg session-control-card-btn" name="submit">Entrar</button>
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