<?php

    $RSS_PHP = new rss_php;
    $RSS_PHP->load($_GET['rss']);

    $rss = $RSS_PHP->getItems();

?>
<div class="container-fluid primary-gradient session-control-bg">
    <div class="container session-control-box">
        <div class="row desktop-row">
            <div class="col">
                <div class="card rss-card">
                    <div class="card-body rss-content">
                        <h5 class="card-title  primary-color center-text"><?php echo $_GET['name'] ?></h5>
                        <hr>
                            
                            <?php

                                for($i = 0; $i < count($rss); $i++){
                                            echo '<p><a href="'.$rss[$i]["link"].'" target="_blank">'.$rss[$i]["title"].'</a></p>';                   
                                        }

                            ?>
                            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>