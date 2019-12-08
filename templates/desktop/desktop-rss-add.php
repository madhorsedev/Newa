<?php

    $name = "";
    $url = "";
    $country = "";
    $category = "";

    $err = FALSE;

    if(isset($_POST['submit'])){

        $name = trim(htmlspecialchars($_POST['name']));
        $url = trim(htmlspecialchars($_POST['url']));
        $country = trim(htmlspecialchars($_POST['country']));
        $category = trim(htmlspecialchars($_POST['category']));

        if(empty($name)){
            $err = TRUE;
            $nameErr = "Introduce un nombre";
        }

        if(empty($url)){
            $err = TRUE;
            $urlErr = "Introduce una URL";
        }

        if(!$err){

            $res = $db->createRSS($name, $url, $country, $category, $_SESSION['user']->userID);
            if($res) echo $res;

        }

    }

?>
<div class="container-fluid primary-gradient session-control-bg">
    <div class="container session-control-box">
        <div class="row">
            <div class="col-sm">
                <div class="card session-control-card">
                    <h3 class="primary-color session-control-card-title">Añadir RSS</h3>
                    <form method="post">
                        <div class="form-group">
                            <label for="name" hidden>Nombre de RSS</label>
                            <input type="text" class="form-control session-control-card-input primary-color" id="name"  name="name" placeholder="Introduzca el nombre *">
                        </div>
                        <div class="form-group">
                            <label for="url" hidden>URL</label>
                            <input type="text" class="form-control session-control-card-input primary-color" id="url" name="url" placeholder="Introduzca la URL *">
                        </div>
                        <div class="form-group">
                            <label for="country" hidden>País</label>
                            <input type="text" class="form-control session-control-card-input primary-color" id="country" name="country" placeholder="Introduzca el país">
                        </div>
                        <div class="form-group">
                            <label for="category" hidden>Categoría</label>
                            <input type="text" class="form-control session-control-card-input primary-color" id="category" name="category" placeholder="Introduzca la categoría">
                        </div>
                        <button type="submit" class="btn btn-primary primary-bg session-control-card-btn" name="submit">Añadir</button>
                    </form>
                </div>
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
                echo '<div class="alert alert-danger session-control-err" role="alert">';

                echo "<p>".$res."</p>";
                        
                echo '</div>';
            }

        ?>
    </div>
</div>