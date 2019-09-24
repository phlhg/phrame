<?php

    spl_autoload_register(function($name){
        $parts = explode("\\",strtolower($name));
        if(count($parts) > 1 && $parts[0] == "phrame")
            $parts[0] = "default";
        $path = dirname(__FILE__)."/".join("/",$parts).".php";
        if(!file_exists($path))
            throw new Exception("Can't load Class ".join("\\",$parts));
        require_once($path);
    });

    $_APP = new App();
    $_APP->run();
    $_APP->render();

?>