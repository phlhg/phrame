<?php

    $_VIEW->contentType(View::XML);

    echo "<?xml version='1.0'?>\n";
    echo "<root>\n";
    echo toXML($_VAR->getAll(),1);
    echo "</root>\n";

?>