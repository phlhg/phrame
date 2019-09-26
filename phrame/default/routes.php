<?php

    $_ROUTER->set("/error/{code}/","Phrame/Error")->where(["code" => '\d{3}']);
    
?>