<?php

    //Database
    require_once("./../src/database/connection.php");
    require_once("./../src/database/client.php");

    //Functions
    require_once("./../src/controllers/functions.php");

    //Vendors
    require_once("./../vendor/rss_php.php");

    //Header
    require_once("./../templates/header.php");

    //Navbar
    require_once("./../templates/nav/navbar-desktop.php");

    $fn = new Functions;
    $db = new Client($pdo);

    if(!$_SESSION["user"]) header("Location: /../index.php");

    if(@htmlspecialchars($_GET["nav"])){
        $nav = htmlspecialchars($_GET["nav"]);
    }else{
        $nav = 1;
    }

    $aux = $db->readRSS($_SESSION['user']->userID);

    switch($nav){

        case 0:
            require_once("./../templates/desktop/desktop-no-rss.php");
        break;

        case 1:
            require_once("./../templates/desktop/desktop-main.php");
        break;

        case 2:
            require_once("./../templates/desktop/desktop-rss.php");
        break;

        case 3:
            require_once("./../templates/desktop/desktop-rss-add.php");
        break;

        case 4:
            require_once("./../templates/desktop/desktop-rss-update.php");
        break;

        case 5:
            require_once("./../templates/desktop/desktop-profile.php");
        break;

        case 6:
            require_once("./../templates/desktop/desktop-read-more.php");
        break;

        default:
            require_once("./../templates/desktop/desktop-main.php");
        break;

    }

    //Footer
    require_once("./../templates/footer.php");

?>