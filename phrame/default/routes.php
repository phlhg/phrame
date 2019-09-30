<?php

    $_ROUTER->set("/errors/{code}/","Phrame/Error")->where(["code" => '\d{3}']);
    
?>