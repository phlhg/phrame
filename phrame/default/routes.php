<?php

    $_ROUTER->GET("/errors/{code}/","Phrame/Error")->where(["code" => '\d{3}']);
    
?>