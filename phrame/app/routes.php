<?php

    $_ROUTER->set("/","Index");
    $_ROUTER->set("/article/{id}/{name}/","Articles/Show")->where(["id" => '\d+', "name" => "[\w_]+"]);
    $_ROUTER->set("/article/","Articles/Index")

?>