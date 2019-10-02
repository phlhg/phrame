<?php $_VIEW->header->content("application/json"); ?>
<?=json_encode($_VAR->getAll())?>