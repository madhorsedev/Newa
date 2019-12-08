<div class="container-fluid primary-gradient session-control-bg">
    <div class="container session-control-box">
        <div class="row desktop-row">
            <div class="col">
                <h3 class="desktop-title">TUS NOTICIAS</h3>
            </div>
            <div class="col">
                <button class="btn btn-secondary dropdown-toggle desktop-btn text-muted" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    FILTROS
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="http://newa.test/public/desktop.php?f=0">NOMBRE</a>
                    <a class="dropdown-item" href="http://newa.test/public/desktop.php?f=1">CATEGORÍA</a>
                    <a class="dropdown-item" href="http://newa.test/public/desktop.php?f=2">PAÍS</a>
                </div>
            </div>
        </div>
        <div class="row rss-row">

            <?php

                $f = 0;

                /* SORTING */

                function compareName($a, $b){
                    return strnatcmp($a['name'], $b['name']);
                }

                function compareCategory($a, $b){
                    return strnatcmp($a['category'], $b['category']);
                }

                function compareCountry($a, $b){
                    return strnatcmp($a['country'], $b['country']);
                }

                @$f = $_GET['f'];

                switch($f){

                    case 0:
                        usort($aux, 'compareName');
                    break;

                    case 1:
                        usort($aux, 'compareCategory');
                    break;

                    case 2:
                        usort($aux, 'compareCountry');
                    break;

                    default:
                        usort($aux, 'compareName');
                    break;

                }

                for($i = 0; $i < count($aux); $i++){

                    $RSS_PHP = new rss_php;
                    $RSS_PHP->load($aux[$i]['url']);

                    $rss = $RSS_PHP->getItems();

            ?>

                <div class="col-4">
                    <div class="card rss-card">
                        <div class="card-body rss-content">
                            <h5 class="card-title"><?php echo $aux[$i]['name'] ?></h5>
                            <p><small class="text-muted"><strong>Categoría: </strong><?php echo $aux[$i]['category'] ?></small></p>
                            <p><small class="text-muted"><strong>País: </strong><?php echo $aux[$i]['country'] ?></small></p>
                            <hr>
                                
                                <?php

                                    for($j = 0; $j <= 4; $j++){
                                                echo '<p><a href="'.$rss[$j]["link"].'" target="_blank">'.$rss[$j]["title"].'</a></p>';                   
                                            }

                                            echo "<p><a href='http://newa.test/public/desktop.php?nav=6&rss=".$aux[$i]['url']."&name=".$aux[$i]['name']."'>+ Leer más</a></p>";

                                ?>
                                
                        </div>
                    </div>
                </div>

            <?php    
            
                }

            ?>
                
        </div>
    </div>
</div>