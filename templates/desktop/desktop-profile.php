<?php

    $err = FALSE;

    if($_GET['del']){
        $db->deleteUser($_GET['del']);
    }

    if($_GET['close']){
        session_destroy();
        header("Location: http://newa.test/public/index.php");
    }

    if(isset($_POST['submit'])){

        $user = trim(htmlspecialchars($_POST['name']));
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
            $res = $db->updateUser($_SESSION['user']->userID, $user, $email, $pass);
        }

    }

?>
<div class="container-fluid primary-gradient session-control-bg">
    <div class="container session-control-box">
        <div class="row">
            <div class="col-sm">
                <div class="card session-control-card">
                    <h3 class="primary-color session-control-card-title">MODIFICAR PERFIL</h3>
                    <form method="post">
                        <div class="form-group">
                            <label for="name" hidden>Nombre de usuario</label>
                            <input type="text" class="form-control session-control-card-input primary-color" id="name"  name="name" value="<?php echo $_SESSION['user']->username ?>">
                        </div>
                        <div class="form-group">
                            <label for="email" hidden>Correo electrónico</label>
                            <input type="email" class="form-control session-control-card-input primary-color" id="email" name="email" value="<?php echo $_SESSION['user']->email ?>">
                        </div>
                        <div class="form-group">
                            <label for="country" hidden>Contraseña</label>
                            <input type="password" class="form-control session-control-card-input primary-color" id="password" name="password" value="<?php echo $_SESSION['user']->pass ?>">
                        </div>
                        <button type="submit" class="btn btn-primary primary-bg session-control-card-btn" name="submit">MODIFICAR</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col desktop-profile-col">
                <a href="http://newa.test/public/desktop.php?nav=5&del=<?php echo $_SESSION['user']->userID ?>" class="btn btn-primary desktop-profile-delete">ELIMINAR CUENTA</a>
            </div>
        </div>
        <div class="row">
            <div class="col desktop-profile-col">
                <a href="http://newa.test/public/desktop.php?nav=5&close=1" class="btn btn-primary desktop-profile-close">CERRAR SESIÓN</a>
            </div>
        </div>
        <?php

            if(@$err){
                echo '<div class="alert alert-danger session-control-err" role="alert">';

                if($nameErr) echo "<p>".$nameErr."</p>";
                if($urlErr) echo "<p>".$urlErr."</p>";
                        
                echo '</div>';
            }

            if(@$res){
                echo '<div class="alert alert-success session-control-err" role="alert">';

                echo "<p>".$res."</p>";
                        
                echo '</div>';
            }

        ?>
    </div>
</div>