<?php

    $_ROUTER->set("/","Index");
    $_ROUTER->set("/args/{id}/{name}/","Args/Index")->where(["id" => '\d+', "name" => "[\w_]+"]);
    
?>