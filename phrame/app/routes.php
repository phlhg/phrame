<?php

    $_ROUTER->set("/","Index");
    $_ROUTER->set("/args/{id}/{name}/","Args/Index")->where(["id" => '\d+', "name" => "[\w_]+"]);

    $_ROUTER->set("/error/{code}/","Phrame/Error")->where(["code" => '\d{3}']);
    
?>