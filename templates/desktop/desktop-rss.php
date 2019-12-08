<div class="container-fluid primary-gradient session-control-bg">
    <div class="container session-control-box">
        <div class="row desktop-add-title">
            <div class="col">
                <h3 class="desktop-title">MIS RSS</h3>
            </div>
            <div class="col">               
                <a href="http://newa.test/public/desktop.php?nav=3" class="btn btn-primary desktop-add">
                +
                </a>
            </div>
        </div>
        <?php

            @$del = $_GET['del'];
            @$mod = $_GET['mod'];

            if(@$del){
                $db->deleteRSS($del);

            }

            for($i = 0; $i < count($aux); $i++){
                
                ?>

                    <div class="row desktop-add-row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $aux[$i]['name'] ?></h5>
                                    <p><small class="text-muted"><strong>Categoría: </strong><?php echo $aux[$i]['category'] ?></small></p>
                                    <p><small class="text-muted"><strong>País: </strong><?php echo $aux[$i]['country'] ?></small></p>
                                    <a href="http://newa.test/public/desktop.php?nav=2&del=<?php echo $aux[$i]['rssID'] ?>" class="btn btn-primary desktop-delete">ELIMINAR</a>
                                    <a href="http://newa.test/public/desktop.php?nav=4&id=<?php echo $aux[$i]['rssID'] ?>" class="btn btn-primary desktop-update">MODIFICAR</a>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php

            }

        ?>
    </div>
</div>