<?php

function routesURL()
{
    if (isset($_GET["url"])) {
        $url = $_GET["url"] ? $_GET["url"] : "index";
    } else {
        $url = "index";
    }

    switch ($url){
        case 'Home':
            include_once("../index.php");
        break;
        case 'cadastro':
            include_once("../pages/cadastro/cadastro.php");
        break;
    }
}
