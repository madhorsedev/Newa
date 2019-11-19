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

    $user = "";
    $email = "";
    $pass = "";

    $err = FALSE;

    $userErr = "";
    $emailErr = "";
    $passErr = "";

    $db = new Client($pdo);

    //Validation

    if(isset($_POST['submit'])){

        $user = trim(htmlspecialchars($_POST['username']));
        $email = trim(htmlspecialchars($_POST['email']));
        $pass = trim(htmlspecialchars($_POST['password']));

        if(!isset($user) || empty($user)){
            $err = TRUE;
            $userErr = "Campo obligatorio.";
        }

        if(isset($email) && !empty($email)){
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $err = TRUE;
                $emailErr = "Introduzca un Correo Electrónico válido.";
            };
        }else{
            $err = TRUE;
            $emailErr = "Campo obligatorio.";
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
            $res = $db->createUser($user, $email, $pass);
            print_r($res);
        }else{
            echo "NOT NICE";
        }

    }

?>

    <!-- CONTENT -->

    <div class="container-fluid primary-gradient session-control-bg">
        <img src="./../assets/img/mac-mockup.png" class="session-control-img"/>
        <div class="container">
            <div class="row session-control-row">
                <div class="col-sm">
                    <div class="card session-control-card">
                        <h3 class="primary-color session-control-card-title">Registrarse</h3>
                        <form method="post">
                            <div class="form-group">
                                <label for="username" hidden>Nombre de Usuario</label>
                                <input type="text" class="form-control session-control-card-input primary-color" id="username" name="username" placeholder="Nombre de Usuario">
                            </div>
                            <div class="form-group">
                                <label for="email" hidden>Correo Electrónico</label>
                                <input type="email" class="form-control session-control-card-input primary-color" id="email" name="email" placeholder="Correo Electrónico">
                            </div>
                            <div class="form-group">
                                <label for="password" hidden>Contraseña</label>
                                <input type="password" class="form-control session-control-card-input primary-color" id="password" name="password" placeholder="Password">
                            </div>
                            <button type="submit" class="btn btn-primary primary-bg session-control-card-btn" name="submit">REGISTRARSE</button>
                        </form>
                        <a href="/public/login.php" class="card-link primary-color center-text">¿Ya tienes cuenta?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php

    //Footer
    require_once("./../templates/footer.php");

?>