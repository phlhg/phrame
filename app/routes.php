<?php

    $_ROUTER->set("/","Index");
    $_ROUTER->set("/article/{id}/{name}/","Articles/Show")->where(["id" => '\d+', "name" => "[\w-]+"]);
    $_ROUTER->set("/article/","Articles/Index");

    $_ROUTER->set("/ajax/","Ajax");

?>