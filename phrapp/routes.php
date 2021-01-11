<?php

    $_ROUTER->GET("/","Index");
    $_ROUTER->GET("/article/{id}/{name}/","Articles/Show")->where(["id" => '\d+', "name" => "[\w-]+"]);
    $_ROUTER->GET("/article/","Articles/Index");

    $_ROUTER->GET("/ajax/{type}/","Ajax")->where(["type" => "\w+"]);

?>